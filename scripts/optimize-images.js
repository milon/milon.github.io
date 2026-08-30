import { readdir, readFile, stat, unlink, writeFile } from 'node:fs/promises';
import path from 'node:path';
import { pathToFileURL } from 'node:url';
import sharp from 'sharp';

const MAX_WIDTH = 1600;
const QUALITY = 80;
const RASTER = new Set(['.png', '.jpg', '.jpeg']);
const SKIP_NAMES = new Set(['favicon.png']);

async function walk(dir) {
    const entries = await readdir(dir, { withFileTypes: true });
    const files = [];

    for (const entry of entries) {
        const full = path.join(dir, entry.name);

        if (entry.isDirectory()) {
            files.push(...await walk(full));
            continue;
        }

        if (entry.isFile()) {
            files.push(full);
        }
    }

    return files;
}

function shouldSkip(file, destRoot) {
    const rel = path.relative(destRoot, file).split(path.sep).join('/');
    const ext = path.extname(file).toLowerCase();
    const base = path.basename(file);

    if (! RASTER.has(ext)) {
        return true;
    }

    if (SKIP_NAMES.has(base)) {
        return true;
    }

    if (rel.startsWith('assets/images/og/')) {
        return true;
    }

    return false;
}

async function hasDisplaySizedWebp(file) {
    const ext = path.extname(file);
    const sized = file.slice(0, -ext.length) + '-400.webp';

    try {
        await stat(sized);

        return true;
    } catch {
        return false;
    }
}

async function convert(file) {
    const ext = path.extname(file);
    const dest = file.slice(0, -ext.length) + '.webp';
    const image = sharp(file).rotate();
    const meta = await image.metadata();
    const width = meta.width ?? MAX_WIDTH;

    await image
        .resize({
            width: Math.min(width, MAX_WIDTH),
            withoutEnlargement: true,
        })
        .webp({ quality: QUALITY })
        .toFile(dest);

    return dest;
}

async function rewriteHtml(destRoot, replacements) {
    if (replacements.size === 0) {
        return 0;
    }

    const files = (await walk(destRoot)).filter((file) => file.endsWith('.html'));
    let updated = 0;

    for (const file of files) {
        let html = await readFile(file, 'utf8');
        const original = html;

        for (const [from, to] of replacements) {
            html = html.split(from).join(to);
        }

        if (html !== original) {
            await writeFile(file, html);
            updated++;
        }
    }

    return updated;
}

export async function optimizeImages(destRoot) {
    const imageRoot = path.join(destRoot, 'assets', 'images');
    const files = await walk(imageRoot);
    const replacements = new Map();
    let converted = 0;

    for (const file of files) {
        if (shouldSkip(file, destRoot)) {
            continue;
        }

        if (await hasDisplaySizedWebp(file)) {
            await unlink(file);
            continue;
        }

        const webp = await convert(file);
        const from = '/' + path.relative(destRoot, file).split(path.sep).join('/');
        const to = '/' + path.relative(destRoot, webp).split(path.sep).join('/');

        replacements.set(from, to);
        await unlink(file);
        converted++;
    }

    const rewritten = await rewriteHtml(destRoot, replacements);

    console.log(`Optimized ${converted} images, updated ${rewritten} HTML files.`);
}

const invoked = process.argv[1] && pathToFileURL(path.resolve(process.argv[1])).href === import.meta.url;

if (invoked) {
    const dest = process.argv[2];

    if (! dest) {
        console.error('Usage: bun scripts/optimize-images.js <destination>');
        process.exit(1);
    }

    await optimizeImages(path.resolve(dest));
}
