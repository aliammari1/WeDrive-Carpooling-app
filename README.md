<div align="center">

![WeDrive banner](assets/banner.svg)

# WeDrive — Carpooling, matched by AI

A self-hostable PHP carpooling platform. Drivers publish rides, passengers
reserve seats, and an **AI ride-matching engine** scores compatibility by detour
and estimates the **CO₂ saved** by sharing the trip.

[![CI](https://github.com/aliammari1/WeDrive-Carpooling-app/actions/workflows/ci.yml/badge.svg)](https://github.com/aliammari1/WeDrive-Carpooling-app/actions/workflows/ci.yml)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
![PHP](https://img.shields.io/badge/PHP-8.2%2B-777bb4)

</div>

> **TODO (banner):** `assets/banner.svg` is a placeholder. See
> [`BANNER.md`](BANNER.md) for the planned brandkit render + GitHub social preview.

## Why WeDrive

- **One-command setup** — `docker compose up` runs the app + a seeded MySQL 8.4
  database. No manual schema steps.
- **AI ride-matching + CO₂ score** — ranks drivers for a passenger by how little
  detour each ride adds, and estimates emissions avoided. Uses the free
  OpenRouteService API, with an **offline fallback** so it works with no key.
- **Security-reviewed** — a login auth-bypass and two SQL-injection sinks were
  found and **fixed**; tests + Psalm taint analysis keep them fixed.
- **Self-hostable & MIT-licensed** — fork it, run it, extend it.

## Quick start (Docker)

```bash
git clone https://github.com/aliammari1/WeDrive-Carpooling-app.git
cd WeDrive-Carpooling-app
cp .env.example .env          # optional: tweak DB / ORS_API_KEY
docker compose up --build     # app on http://localhost:8080
docker compose exec app php database/seed.php   # demo users
```

Demo credentials (all password `password123`): `admin@wedrive.test`,
`driver@wedrive.test`, `rider@wedrive.test`.

See the [full getting-started guide](docs/getting-started.md) for the local-PHP
path.

## Configuration (`.env.example`)

| Variable | Default | Purpose |
|---|---|---|
| `DB_HOST` / `DB_PORT` | `127.0.0.1` / `3306` | MySQL connection |
| `DB_NAME` | `wedrive` | single consolidated schema |
| `DB_USER` / `DB_PASSWORD` | `root` / _(empty)_ | credentials |
| `ORS_API_KEY` | _(empty)_ | OpenRouteService; blank => offline fallback |

No credentials live in source — everything reads from `.env` (git-ignored) via
the single `WeDrive\Database::pdo()` factory.

## Architecture

```
Controller/   request handlers (Users, Reservations, Reclamations, trajets, avis, Ai)
Model/        PDO data-access classes
View/         HTML pages + Argon/Bootstrap assets
src/          PSR-4 WeDrive\ namespace: Database factory + Ai\ ride-matching
database/     schema.sql, seeds.sql, seed.php
tests/        PHPUnit (auth, SQL-injection, AI matching)
```

The legacy hand-rolled MVC keeps working; new, type-safe, testable code lives in
`src/` (PSR-4, `composer dump-autoload`). Full diagram + ERD in the
[docs](docs/architecture.md).

## AI ride matching

```php
use WeDrive\Ai\GeoPoint;
use WeDrive\Ai\RideMatcher;

$matcher = RideMatcher::fromEnv();          // ORS if key set, else offline
$result  = $matcher->score($driverOrigin, $driverDest, $pickup, $dropoff);
// $result->score (0..100), ->detourKm, ->co2SavedKg, ->usedLiveRouting
```

HTTP: `Controller/Ai/matchRides.php?pickup=lat,lng&dropoff=lat,lng` returns a
JSON list of trajets ranked best-first. Details: [docs/ai-matching.md](docs/ai-matching.md).

## Screenshots

_TODO — add dashboard / ride-matching screenshots to `assets/` (see BANNER.md)._

## Security

A review found and fixed:

- **Auth bypass** — login accepted *any* password (the submitted password was
  hashed and "verified" against its own fresh hash). Now uses `password_verify()`
  against the stored bcrypt hash.
- **SQL injection** — `searchReservation` / `sortReservation` and an `avis` page
  were parameterized / whitelisted.

These are pinned by `tests/AuthTest.php` and `tests/ReservationInjectionTest.php`,
and guarded by Psalm taint analysis + gitleaks in CI. More:
[docs/security.md](docs/security.md). Report issues privately to
`ammari.ali.0001@gmail.com`.

## Testing & CI

```bash
composer install
vendor/bin/phpunit          # unit tests
vendor/bin/phpstan analyse  # static analysis (level 3)
vendor/bin/phpcs            # PSR-12
```

CI runs a PHP 8.2/8.3 matrix: `php -l` lint → PHPStan → PHP_CodeSniffer →
PHPUnit (against a MySQL 8.4 service) → Codecov, plus Psalm security analysis,
gitleaks, and a SHA-pinned Trivy image scan. All actions are SHA-pinned.

## Engineering decisions

- **Single env-driven PDO** (`WeDrive\Database`) replaced 15+ hardcoded
  connections — this both removed secrets and made the models unit-testable
  (in-memory SQLite injected in tests).
- **One database name** (`wedrive`) replaced the inconsistent
  `covoiturage`/`projet` split; a reconstructed `schema.sql` makes it reproducible.
- **Psalm taint, not CodeQL** — CodeQL has no PHP support.
- **MySQL 8.4, not MariaDB 10.4** — the old devcontainer DB was EOL.
- **Cloudflare for docs only** — Workers/Pages can't run PHP; the app needs a PHP
  host (CF Containers beta or a free PHP host), while CF Pages hosts these docs.

## License

[MIT](LICENSE) © 2023–2025 Ali Ammari. Bundled third-party assets
(Argon/Bootstrap theme, FPDF, PHPMailer) retain their own licenses.
