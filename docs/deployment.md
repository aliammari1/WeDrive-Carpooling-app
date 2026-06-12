# Deployment & hosting

WeDrive is a PHP 8.2+ app backed by MySQL. The docs you are reading are static
and deploy to **Cloudflare Pages** (the `docs.yml` workflow), but **the app
itself cannot run on Cloudflare** — Workers/Pages execute JS/WASM, not PHP. The
app needs a PHP runtime, and the repo ships a `docker-compose.yml` that most
container hosts accept directly.

## Recommended: Railway (free trial, Docker-Compose aware)

[Railway](https://railway.com) is the lowest-friction free option in 2026: a
one-time **$5 trial credit** (no long-lived free compute tier, but enough to
stand up a demo) and it understands Compose files. Railway does not *run*
`docker-compose.yml` as-is; it imports each service in the file as a separate
Railway service.

1. Push this repo to GitHub.
2. On Railway: **New Project → Deploy from GitHub repo**, or drag
   `docker-compose.yml` onto the project canvas to auto-import the `app` service
   (and any volumes) as staged changes.
3. Add a managed database instead of running MySQL in a container:
   **+ New → Database → MySQL**. Railway provisions it with automatic backups and
   exposes `MYSQL_HOST`, `MYSQL_PORT`, `MYSQL_DATABASE`, `MYSQL_USER`,
   `MYSQL_PASSWORD` connection variables.
4. On the `app` service, set WeDrive's env from those:
   `DB_HOST`, `DB_PORT`, `DB_NAME`, `DB_USER`, `DB_PASSWORD`, and an optional
   `ORS_API_KEY` (blank uses the offline ride-matching fallback).
5. Load the schema once:
   `railway run mysql -h $MYSQL_HOST -u $MYSQL_USER -p$MYSQL_PASSWORD $MYSQL_DATABASE < database/schema.sql`,
   then optionally `railway shell` → `php database/seed.php` for demo data.

Docs: [Railway Docker Compose guide](https://docs.railway.com/guides/docker-compose),
[Railway MySQL](https://docs.railway.com/databases/mysql),
[Railway free trial](https://docs.railway.com/reference/pricing/free-trial).

## Other free-tier options (2026) and trade-offs

| Host | PHP path | DB | Notes |
|---|---|---|---|
| **Railway** | Compose / Dockerfile | Managed MySQL | $5 trial credit; best Compose DX; **chosen default**. |
| **Render** | Web Service from Dockerfile | Managed Postgres (no free MySQL) | No credit card; free web service **spins down** after inactivity (~1 min cold start); you'd point WeDrive at Postgres or run MySQL yourself. |
| **fly.io** | `fly launch` (Dockerfile) | Managed MySQL/Postgres add-ons | The open free tier ended for new accounts — now a short trial; credit card required. |
| **Koyeb** | Dockerfile | external DB | Removed its free compute tier in 2026. |
| **InfinityFree** | classic shared cPanel PHP+MySQL | MySQL included | Genuinely free and PHP-native, but **no Docker** — upload via FTP/Git, set DB creds in the panel; good for a permanent low-traffic demo. |

For a guaranteed-free, no-card, permanent demo without Docker, **InfinityFree**
(shared PHP + MySQL) is the fallback; for the cleanest Docker-Compose experience,
**Railway** is the pick.

## Local / self-host

The canonical path stays one command:

```bash
cp .env.example .env
docker compose up --build                       # app on http://localhost:8080
docker compose exec app php database/seed.php   # demo users
```

This builds `php:8.2-apache` and a seeded MySQL 8.4 service — see the project
`docker-compose.yml` and `Dockerfile`.
