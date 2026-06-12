# Security Policy

## Reporting a vulnerability

Please report security issues **privately** to **ammari.ali.0001@gmail.com**
rather than opening a public issue. Include steps to reproduce and the affected
version/commit. You can expect an acknowledgement within a few days.

## Supported versions

The `main` branch receives security fixes.

## Known issues fixed

| Issue | Where | Fix |
|---|---|---|
| Auth bypass — login accepted any password | `Controller/Users/sanitize.php` / `ControlSignin.php` | `password_verify()` against the stored bcrypt hash; pinned by `tests/AuthTest.php` |
| SQL injection | `Model/Reservations/reservations.php`, `View/pages/back/avis/test.php` | bound params + whitelisted `ORDER BY`; pinned by `tests/ReservationInjectionTest.php` |
| Hardcoded DB credentials (15+) | `Model/`, `View/` | env-driven `WeDrive\Database::pdo()` + `.env` |

## Automated controls

- **Psalm taint analysis** (`security_analysis: true`) in CI — the PHP SAST
  (CodeQL has no PHP support).
- **gitleaks** secret scanning in CI and pre-commit.
- **Trivy** image scan (SHA-pinned) of the `php:8.2-apache` image.
- **PHPUnit** regression tests pinning the auth + injection fixes.
