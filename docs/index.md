# WeDrive Carpooling

**WeDrive** is a self-hostable carpooling platform built as a hand-rolled PHP
MVC application (PDO + MySQL, Bootstrap/Argon UI). It lets drivers publish
trajets (rides), passengers reserve seats, and adds an **AI ride-matching +
CO₂-savings** layer on top.

## Why WeDrive

- **Self-hostable** — one command (`docker compose up`) brings up the app plus a
  seeded MySQL 8.4 database.
- **AI ride-matching** — scores how well a passenger's trip fits a driver's route
  by the detour involved and estimates the CO₂ saved versus driving separately,
  using the free OpenRouteService API (with an offline fallback).
- **Security-reviewed** — a login auth-bypass and two SQL-injection sinks were
  found and fixed; PHPUnit tests pin those fixes and Psalm taint analysis guards
  against regressions in CI.

## Quick links

- [Getting started](getting-started.md) — run it locally
- [Architecture](architecture.md) — the MVC layout
- [Database schema](schema.md) — tables and relationships
- [AI ride matching](ai-matching.md) — how the scoring works
- [Security](security.md) — the bugs found and fixed

!!! note "Hosting"
    The PHP application needs a PHP-capable host (e.g. Cloudflare Containers beta
    or any free PHP host). **Cloudflare Pages hosts this documentation site** —
    Workers/Pages cannot run PHP directly.
