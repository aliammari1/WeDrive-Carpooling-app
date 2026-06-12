# GROWTH — discoverability & launch kit for WeDrive

A ready-to-fire kit to turn WeDrive into a *findable, shareable* open-source
project. Nothing here changes the app — it's the GitHub metadata, the launch
copy, and the directory submissions that drive stars. Owner action items are
marked **👤**.

---

## 1. Repository metadata (👤 set on GitHub → repo Settings + "About")

### About (short description)

> Open-source carpooling / ride-sharing platform — a self-hostable **BlaBlaCar
> alternative** (PHP MVC + MySQL + AI ride-matching). One-command
> `docker compose up`. MIT.

### Topics (8–12 exact-match, GitHub allows up to 20)

```
php
mvc
carpooling
ride-sharing
mysql
self-hosted
open-source-alternative
bootstrap
docker-compose
ai
mobility
blablacar-alternative
```

These are the literal phrases people search (`carpooling`, `ride-sharing`,
`self-hosted`, `open-source-alternative`, `blablacar-alternative`). Stars
correlate strongly with search ranking, so keep commits flowing and the topics
exact-match. Mirror them into `.github/repository-info.json` and `composer.json`
`keywords`.

### Social preview

Upload the rendered banner (see [`BANNER.md`](BANNER.md)) under
Settings → Social preview so shared links show a card, not a grey box.

---

## 2. The Show HN / launch post (👤 post Tue–Thu, 13:00–16:00 UTC)

Personal-story headlines get ~3× the upvotes. Lead with the security war-story —
it's concrete, a little scary, and shows the project is real.

**Title:**

> Show HN: I fixed an auth bypass that accepted ANY password — and added AI
> ride-matching (open-source BlaBlaCar alternative)

**First comment (seed it yourself, reply within the hour):**

> I inherited a student PHP carpooling app and found the login literally
> accepted any password: it hashed the *submitted* password and "verified" it
> against that same fresh hash — always true. So I rebuilt it into something
> self-hostable: real `password_verify()` auth, one env-driven PDO instead of
> 15+ hardcoded `root@localhost` connections, a CSP + rate-limiter on the login
> and the public JSON endpoint, Sentry + JSON logging, and PHPUnit + Infection
> mutation testing + Psalm taint analysis in CI.
>
> The fun part: an **AI ride-matching** engine that ranks drivers for a
> passenger by how little detour each ride adds and estimates the CO₂ saved by
> sharing the trip (OpenRouteService, with an offline haversine fallback so it
> works with no API key).
>
> It's MIT and runs in ~60 seconds: `docker compose up` boots the app + a
> seeded MySQL. It's a self-hostable BlaBlaCar alternative for communities,
> campuses and employers who don't want to hand riders' data (or a cut of every
> trip) to a third party. Repo + Railway deploy button in the README. Would
> love feedback on the matching heuristic and the CSP.

---

## 3. Reddit posts (👤 build karma first; one subreddit at a time)

### r/selfhosted

**Title:** `WeDrive — a self-hostable, MIT carpooling app (BlaBlaCar alternative) you run with one docker compose up`

> I wanted a carpooling service a community could run itself instead of pushing
> everyone onto a SaaS. WeDrive is PHP MVC + MySQL, MIT-licensed, and boots in
> ~60s via `docker compose up` (seeded schema, demo users included). It has AI
> ride-matching that ranks drivers by detour + estimates CO₂ saved, with an
> offline fallback so it works with no API key. Hardened with CSP, rate
> limiting, JSON logging and mutation-tested CI. Feedback welcome — especially
> on the deploy story (Compose → Railway today, looking at others).

### r/PHP

**Title:** `Rebuilt a hand-rolled PHP MVC carpooling app: env-driven PDO, password_verify auth, CSP + rate-limiter, Infection in CI`

> A teardown for the PHP folks: replaced 15+ hardcoded `new PDO('mysql:...','root','')`
> with a single env-driven `WeDrive\Database` factory (also made the models
> unit-testable via injected in-memory SQLite); fixed an auth bypass that
> accepted any password; added small dependency-free CSP/security-header and
> file-backed rate-limiter helpers (no HTTP kernel in hand-rolled MVC); Monolog
> JSON logging + optional Sentry; and an Infection mutation-testing gate
> (`--min-msi`) on the ride-matching + middleware logic on top of PHPUnit. PSR-4
> `src/` lives alongside the legacy MVC so it's an incremental migration. Code +
> rationale in the README/docs.

---

## 4. Awesome-list & directory submissions (👤 open the PRs)

Now that WeDrive is **MIT-licensed it qualifies for awesome-selfhosted.**

### awesome-selfhosted — category: Software → Communication → … *(Mobility / Maps)*

Submission line (alphabetical insertion, must pass `awesome-lint`):

```markdown
- [WeDrive](https://github.com/aliammari1/WeDrive-Carpooling-app) - Self-hostable carpooling / ride-sharing platform (BlaBlaCar alternative) with AI ride-matching and CO₂-savings scoring. ([Demo](https://github.com/aliammari1/WeDrive-Carpooling-app#-runs-in-60-seconds)) `MIT` `PHP/Docker`
```

> Note: awesome-selfhosted requires a demo/screenshots and a license tag, and
> prefers an active project. Make sure the banner + demo GIF land first.

### Other directories (open-source-alternative SEO)

- **OpenAlternative** (openalternative.co) — submit as "open-source BlaBlaCar
  alternative".
- **opensource.builders** — alternative-to listing.
- **LibHunt** / **SaaSHub** — PHP + self-hosted categories.

---

## 5. Cross-linking (✅ done in this repo, 👤 mirror on the profile)

- README footer links to rakcha / Hotline-Topup / JobPrep / github-traffic-analytics
  and back to the profile (✅).
- Add WeDrive to the `aliammari1` profile README hub with a star badge + the
  "runs in 60s" line (👤).

---

## 6. Checklist

- [ ] Set About + 12 topics + upload social preview (👤)
- [ ] Render banner + capture `assets/demo.gif` (👤, see BANNER.md)
- [ ] Post Show HN with the seeded first comment (👤)
- [ ] r/selfhosted + r/PHP posts (👤)
- [ ] awesome-selfhosted PR (Mobility) + OpenAlternative / opensource.builders (👤)
- [ ] Add to profile README hub (👤)
