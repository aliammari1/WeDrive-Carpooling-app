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
- **No error/DSN leakage.** `Database` re-throws connection failures without
  echoing the DSN/message that the legacy code exposed.

## Reporting

Please report vulnerabilities privately to `ammari.ali.0001@gmail.com` rather
than opening a public issue.
