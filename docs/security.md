# Security

WeDrive underwent a security review. The issues below were found and fixed, and
regression tests + Psalm taint analysis now guard against them.

## Fixed: authentication bypass (any password accepted)

`Controller/Users/sanitize.php` used to hash the **submitted** password and then
"verify" it against that same fresh hash — which is always true. Any password for
an existing email logged in successfully.

**Fix:** verification now happens in `Controller/Users/ControlSignin.php` using
`password_verify($submitted, $storedHash)` against the bcrypt hash stored in the
database. `sanitize_login()` only validates that fields are present.

Pinned by `tests/AuthTest.php`:

- login **rejects** a wrong password
- login **rejects** an empty password
- login **rejects** an unknown email
- login **accepts** the correct password
- stored secret is a bcrypt hash, never plaintext

## Fixed: SQL injection

- `Model/Reservations/reservations.php` — `searchReservation()` now uses bound
  parameters; `sortReservation()` whitelists the `ORDER BY` direction to
  `ASC`/`DESC` (a direction cannot be a bound parameter).
- `View/pages/back/avis/test.php` — the `avis` lookup and `reponse` insert were
  parameterized (previously interpolated `$_GET`/`$_POST`).

Pinned by `tests/ReservationInjectionTest.php`.

## Hardening

- **No hardcoded credentials.** 15+ `new PDO('mysql:...','root','')` calls and
  several `mysqli_connect("localhost","root","")` calls were replaced with the
  env-driven `WeDrive\Database::pdo()` / `getenv()`. `.env` is git-ignored; a
  documented `.env.example` ships instead.
- **Secret scanning.** gitleaks runs in CI (and pre-commit) because the git
  history contains the old hardcoded credentials.
- **PHP SAST.** Psalm taint analysis runs in CI with `security_analysis: true`
  and uploads SARIF (CodeQL has no PHP support).
- **Mutation testing.** Infection runs in CI with a minimum mutation score
  (`--min-msi 70`, `--min-covered-msi 80`) over the AI matching + HTTP
  middleware, so the unit tests must actually kill injected bugs.
- **No error/DSN leakage.** `Database` re-throws connection failures without
  echoing the DSN/message that the legacy code exposed.

## HTTP middleware (`src/Http/`, `src/Observability/`)

The hand-rolled MVC has no HTTP kernel, so cross-cutting protections are small,
dependency-free helpers invoked from the front-controller bootstrap
(`WeDrive\Bootstrap::init()`):

### Security headers + CSP — `WeDrive\Http\SecurityHeaders`

`SecurityHeaders::send()` emits a Content-Security-Policy plus
`X-Content-Type-Options: nosniff`, `X-Frame-Options: DENY`, `Referrer-Policy`,
`Permissions-Policy`, `Cross-Origin-Opener-Policy` and HSTS, and strips
`X-Powered-By`. A strict `apiJson: true` variant (`default-src 'none'`) is used
on the JSON `matchRides` endpoint. The page CSP still allows `'unsafe-inline'`
styles for the legacy Argon/Bootstrap theme; moving to a nonce-based CSP is on
the roadmap.

### Rate limiting — `WeDrive\Http\RateLimiter`

A fixed-window, file-backed limiter (atomic `flock` counters under the system
temp dir) applied to the two sensitive surfaces:

- **login POST** — 5 attempts / 5 min / IP (credential-stuffing / brute-force).
- **`matchRides` JSON** — 30 requests / min / IP (it fans out to a paid routing
  API).

It emits `X-RateLimit-Limit` / `-Remaining` / `-Reset` and, on a breach, a `429`
with `Retry-After`. The client IP honours a single trusted proxy hop via
`X-Forwarded-For`; behind an untrusted edge, configure the proxy to set a
trusted header. For multi-node deploys swap the temp-file store for Redis.

### Logging + error tracking — `WeDrive\Observability\{Logger,Sentry}`

`Logger` writes one JSON record per line to stderr (Monolog) with a per-request
correlation id (also returned as `X-Request-Id`). `Sentry` initialises the
Sentry PHP SDK when `SENTRY_DSN` is set. Both degrade to no-ops when their
optional dependency or config is absent, so the app runs unchanged out of the
box. Failed logins, rate-limit breaches and endpoint errors are logged.

## Reporting

Please report vulnerabilities privately to `ammari.ali.0001@gmail.com` rather
than opening a public issue.
