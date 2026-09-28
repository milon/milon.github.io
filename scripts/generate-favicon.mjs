import opentype from "opentype.js";
import { readFileSync, writeFileSync } from "fs";
import sharp from "sharp";
import { dirname, join } from "path";
import { fileURLToPath } from "url";

const root = join(dirname(fileURLToPath(import.meta.url)), "..");
const fontPath = join(root, "source/assets/fonts/Unbounded-Latin.woff2");
const img = join(root, "source/assets/images");

// opentype.js wants a non-woff2 buffer sometimes — use cached ttf if present
let fontBin;
try {
  fontBin = readFileSync("/tmp/ub-fav/Unbounded.ttf");
} catch {
  // fallback: try woff2 directly
  fontBin = readFileSync(fontPath);
}
const font = opentype.parse(fontBin.buffer.slice(fontBin.byteOffset, fontBin.byteOffset + fontBin.byteLength));

const size = 17;
// Extra tracking so favicon strokes do not crowd / clip the second slash.
const tracking = 0.06 * size;

function toD(commands, dig = 2) {
  const r = (n) => Number(n.toFixed(dig));
  let d = "";
  for (const c of commands) {
    if (c.type === "M") d += `M${r(c.x)} ${r(c.y)}`;
    else if (c.type === "L") d += `L${r(c.x)} ${r(c.y)}`;
    else if (c.type === "Q") d += `Q${r(c.x1)} ${r(c.y1)} ${r(c.x)} ${r(c.y)}`;
    else if (c.type === "C")
      d += `C${r(c.x1)} ${r(c.y1)} ${r(c.x2)} ${r(c.y2)} ${r(c.x)} ${r(c.y)}`;
    else if (c.type === "Z") d += "Z";
  }
  return d;
}

function closeContours(cmds) {
  const out = [];
  for (const c of cmds) {
    if (c.type === "M" && out.length && out[out.length - 1].type !== "Z") {
      out.push({ type: "Z" });
    }
    out.push({ ...c });
  }
  if (out.length && out[out.length - 1].type !== "Z") out.push({ type: "Z" });
  return out;
}

const colonG = font.charToGlyph(":");
const slashG = font.charToGlyph("/");
const colonAdv = (colonG.advanceWidth / font.unitsPerEm) * size + tracking;
const slashAdv = (slashG.advanceWidth / font.unitsPerEm) * size + tracking;

const colonD = toD(closeContours(colonG.getPath(0, 0, size).commands));
const slashD = toD(closeContours(slashG.getPath(0, 0, size).commands));

const tmpCmds = [
  ...closeContours(colonG.getPath(0, 0, size).commands),
  ...closeContours(slashG.getPath(colonAdv, 0, size).commands),
  ...closeContours(slashG.getPath(colonAdv + slashAdv, 0, size).commands),
];
let minX = Infinity,
  minY = Infinity,
  maxX = -Infinity,
  maxY = -Infinity;
for (const c of tmpCmds) {
  for (const k of ["x", "y", "x1", "y1", "x2", "y2"]) {
    if (typeof c[k] !== "number") continue;
    if (k.startsWith("x")) {
      minX = Math.min(minX, c[k]);
      maxX = Math.max(maxX, c[k]);
    } else {
      minY = Math.min(minY, c[k]);
      maxY = Math.max(maxY, c[k]);
    }
  }
}

const pad = 5;
const view = 32;
const cw = maxX - minX;
const ch = maxY - minY;
const scale = Math.min((view - pad * 2) / cw, (view - pad * 2) / ch);
const tx = (view - cw * scale) / 2 - minX * scale;
const ty = (view - ch * scale) / 2 - minY * scale;
const stroke = (0.65 / scale).toFixed(3);

function glyphs(haloAttrs, fillAttrs) {
  const slash1 = `transform="translate(${colonAdv.toFixed(3)} 0)"`;
  const slash2 = `transform="translate(${(colonAdv + slashAdv).toFixed(3)} 0)"`;
  return `<g transform="translate(${tx.toFixed(3)} ${ty.toFixed(3)}) scale(${scale.toFixed(5)})">
    <g ${haloAttrs}>
      <path d="${colonD}"/>
      <path d="${slashD}" ${slash1}/>
      <path d="${slashD}" ${slash2}/>
    </g>
    <g ${fillAttrs}>
      <path d="${colonD}"/>
      <path d="${slashD}" ${slash1}/>
      <path d="${slashD}" ${slash2}/>
    </g>
  </g>`;
}

const adaptive = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 ${view} ${view}" role="img" aria-label="://">
  <!-- Unbounded :// — wordmark without n/m; transparent; identical slash paths -->
  <style>
    .fill { fill: #111111; }
    .halo { fill: none; stroke: #111111; stroke-width: ${stroke}; stroke-linejoin: round; stroke-linecap: round; }
    @media (prefers-color-scheme: dark) {
      .fill { fill: #f0f0f0; }
      .halo { stroke: #ffffff; }
    }
  </style>
  ${glyphs('class="halo"', 'class="fill"')}
</svg>
`;

const light = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 ${view} ${view}" role="img" aria-label="://">
  ${glyphs(
    `fill="none" stroke="#111111" stroke-width="${stroke}" stroke-linejoin="round" stroke-linecap="round"`,
    `fill="#111111"`,
  )}
</svg>
`;

const dark = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 ${view} ${view}" role="img" aria-label="://">
  ${glyphs(
    `fill="none" stroke="#ffffff" stroke-width="${stroke}" stroke-linejoin="round" stroke-linecap="round"`,
    `fill="#f0f0f0"`,
  )}
</svg>
`;

writeFileSync(join(img, "logo-mark.svg"), adaptive);
writeFileSync(join(img, "logo-mark-light.svg"), light);
writeFileSync(join(img, "logo-mark-dark.svg"), dark);

await sharp(join(img, "logo-mark-light.svg")).ensureAlpha().png().resize(32, 32).toFile(join(img, "favicon.png"));
await sharp(join(img, "logo-mark-dark.svg")).ensureAlpha().png().resize(32, 32).toFile(join(img, "favicon-dark.png"));
await sharp(join(img, "logo-mark-light.svg"))
  .resize(180, 180)
  .flatten({ background: { r: 240, g: 240, b: 240 } })
  .png()
  .toFile(join(img, "apple-touch-icon.png"));

console.log("ok — both slashes share the same path data");
console.log(slashD);
