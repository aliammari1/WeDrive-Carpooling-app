# Banner & Social Preview

WeDrive's visual identity. The README hero references
[`assets/banner.svg`](assets/banner.svg) (a placeholder); swap in the final
render below at the same path so the README needs no edit.

## Direction

Automotive route-line **"W"** — a dashed highway lane traces the letter W, map
pins at each vertex, dark slate background with an electric-teal accent. Mobility
meets sustainability.

## The prompt (paste into the image generator)

> A wide 1280x640 GitHub social-preview banner for an open-source carpooling app
> called "WeDrive". Dark slate (#0F172A to #1E293B) background. A single dashed
> highway lane-marking line, glowing electric teal (#2DD4BF), drawn as a stylized
> uppercase letter "W" spanning the center — like a route on a navigation map.
> Small rounded map pins sit at each of the W's four turning points; a tiny car
> silhouette travels along the line near one vertex. Below the mark, the wordmark
> "WeDrive" in a clean modern geometric sans-serif (white), with the tagline
> "Carpooling, matched by AI" in muted slate-grey beneath it. Subtle faint
> contour-map grid lines in the far background at low opacity. Flat vector style,
> generous negative space, no photos, no clutter, crisp edges. Aspect ratio 2:1.

## Variants to export

- **Social preview** — render the prompt at **1280x640 PNG**, set it in GitHub
  **Settings -> Social preview**, and commit the PNG to `assets/banner.png`
  (update the README hero `![WeDrive banner]` to the PNG once it exists).
- **README hero** — optionally a wider variant via `imagegen-frontend-web`.
- **Screenshots** — add dashboard / ride-matching captures or GIFs to `assets/`
  and reference them in the README "Screenshots" section.

Tooling: use the `brandkit` Claude skill for the identity board + the 1280x640
social card; `imagegen-frontend-web` for the wide hero. (Deferred — needs the
brand tooling / a designer; the SVG placeholder ships in the meantime.)
