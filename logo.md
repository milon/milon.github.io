# milon.im logo

Brand mark and wordmark for [milon.im](https://milon.im) under the **Signal** identity (grayscale UI).

## Wordmark

**Text:** `n://m`

| Property | Value |
| --- | --- |
| Meaning | Compact signature — **n**uruzzaman / **m**ilon, written as a URI-like handle |
| Font | **[Unbounded](https://fonts.google.com/specimen/Unbounded)** (SIL Open Font License 1.1) |
| File | `/assets/fonts/Unbounded-Latin.woff2` |
| Weight | `600` |
| Tracking | `0.02em` |
| Letter case | lowercase only |
| `n` / `m` color | `--ink` (`#111111` light · `#f0f0f0` dark) |
| `://` color | `--logo-sep` — **C4** `#bcbcbc` light · `#555555` dark |
| CSS variables | `--logo-font`, `--logo-sep` in `source/_assets/sass/main.scss` |
| Site usage | Topbar home link (`.wordmark` in `source/_layouts/master.blade.php`) |
| Desktop companion | Mono uppercase **Nuruzzaman Milon** (`.wm-title`) beside the logo; hidden below `md` |
| Outline | Laser-thin halo on `://` only (`.wm-sep`): `0.6px` dark `#111111` in light / white in dark; `n` / `m` stay flat |

### Structure

```
n + :// + m
 │    │    │
 │    │    └─ host letter (ink)
 │    └────── protocol (muted sep)
 └─────────── scheme letter (ink)
```

The muted `://` is intentional: letters carry identity; the protocol is secondary chrome (selection code **B20** Unbounded open + **C4** sep grey).

### HTML pattern

```html
<a class="wordmark" href="/" aria-label="Nuruzzaman Milon — home">
  n<span class="wm-sep" aria-hidden="true">://</span>m
</a>
```

### SVG exports

| File | Use |
| --- | --- |
| `/assets/images/logo-wordmark.svg` | Light wordmark (Unbounded via `@font-face`) |
| `/assets/images/logo-wordmark-dark.svg` | Dark wordmark |

These SVGs are brand exports. The live header uses CSS + the self-hosted font, not the SVG files.

## Favicon / mark

**Glyph:** `://` only — the wordmark with `n` / `m` removed.

At 16–32px a full `n://m` is illegible, so the mark is the protocol alone. Glyphs are **outlined from Unbounded** (same font as the wordmark); paths are baked in so favicons do not need to load the webfont.

| Property | Value |
| --- | --- |
| Concept | Protocol mark from `n://m` |
| Font | **Unbounded** (outlined paths) |
| Background | Transparent (SVG + PNG favicons) |
| Light | Fill `#111111`, ink outline (`stroke` `#111111`, `paint-order: stroke fill`) |
| Dark | Fill `#f0f0f0`, white outline (`#ffffff`) |
| Adaptive SVG | `/assets/images/logo-mark.svg` (`prefers-color-scheme`) |
| Fixed light SVG | `/assets/images/logo-mark-light.svg` |
| Fixed dark SVG | `/assets/images/logo-mark-dark.svg` |

### Raster fallbacks

| File | Size | Notes |
| --- | --- | --- |
| `/assets/images/favicon.png` | 32×32 | Transparent; from light mark |
| `/assets/images/favicon-dark.png` | 32×32 | Transparent; dark mark; `prefers-color-scheme: dark` |
| `/assets/images/apple-touch-icon.png` | 180×180 | Opaque paper `#f0f0f0` (Apple requires non-transparent) |

Linked from `master.blade.php`, `redirect.blade.php`, and `redirect_stub.blade.php`.

## Site type stack (context)

| Role | Family | Where |
| --- | --- | --- |
| Logo | **Unbounded** | Wordmark only |
| Display | **Syne** | Headlines |
| Body | **Work Sans** | Prose / UI |
| Mono | **0xProto** | Nav labels, meta, code |
| Bengali | **Noto Sans Bengali** | Fallback for Bengali text |

Code syntax highlighting still uses Catppuccin token colors; UI chrome is Signal grayscale.

## Design history (short)

1. Direction **B** — display wordmark structure (muted `://`).
2. Locked **B20** — Unbounded, open tracking (`0.02em`).
3. Locked **C4** — `://` at `#bcbcbc` (dark pair `#555555`).
4. Favicon — protocol-only `://` geometric mark.

## Do / don’t

- **Do** keep `n` / `m` in `--ink` and `://` in `--logo-sep`.
- **Do** use Unbounded 600 for the wordmark; do not substitute Syne or the mono stack for the logo.
- **Don’t** set the wordmark in all caps or widen tracking past ~`0.04em` without revisiting the lock.
- **Don’t** put the full wordmark in the favicon; use the `://` mark.
- **Don’t** reintroduce the old geometric **M** mark (removed).

## License

Unbounded is under the [SIL Open Font License 1.1](https://scripts.sil.org/OFL); see `/assets/fonts/Unbounded-OFL.txt`. The `n://m` lockup as used on milon.im follows the site’s [CC BY 2.0](https://creativecommons.org/licenses/by/2.0/) content license.
