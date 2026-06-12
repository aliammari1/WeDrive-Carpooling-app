# Contributing to WeDrive

Thanks for your interest in improving WeDrive. This is a PHP (8.2+) MVC
carpooling app with a Composer/PSR-4 `src/` layer, a MySQL database, and a
Docker-based dev environment.

## Getting set up

The fastest path is the Docker stack — it boots the app plus a seeded MySQL 8.4:

```bash
git clone https://github.com/aliammari1/WeDrive-Carpooling-app.git
cd WeDrive-Carpooling-app
cp .env.example .env
docker compose up --build                       # app on http://localhost:8080
docker compose exec app php database/seed.php   # demo users
```

For a local PHP toolchain instead (PHP 8.2+, Composer, a MySQL/MariaDB you run
yourself):

```bash
composer install
# point .env at your database, then load the schema:
mysql -u root wedrive < database/schema.sql
php -S localhost:8080 -t View
```

## Before you open a pull request

Run the same checks CI runs. They must all pass:

```bash
composer lint     # php -l over Controller/ Model/ src/
composer stan     # PHPStan (level 3)
composer cs       # PHP_CodeSniffer (PSR-12)  — composer cs-fix to autofix
composer test     # PHPUnit
vendor/bin/psalm  # Psalm taint analysis (security)
```

CI runs these on a PHP 8.2 / 8.3 matrix against a MySQL 8.4 service, plus
Psalm security analysis, gitleaks secret scanning, and a Trivy image scan.

If you have [`pre-commit`](https://pre-commit.com) installed, run
`pre-commit install` once and these run automatically on each commit.

## Conventions

- **New code goes in `src/`** under the `WeDrive\` PSR-4 namespace — type-hinted,
  unit-testable, no hardcoded credentials. The legacy hand-rolled MVC in
  `Controller/`, `Model/`, and `View/` still works; prefer extracting logic into
  `src/` over growing it.
- **Never hardcode credentials or DB connections.** Use
  `WeDrive\Database::pdo()`, which reads from `.env`. PRs that add `new PDO(...)`
  with inline credentials will be asked to refactor.
- **Always parameterize SQL.** Bind user input; whitelist `ORDER BY` / column
  names. This repo had two SQL-injection sinks and an auth bypass — they are
  pinned by tests, please keep them pinned.
- **Add a regression test** for any bug fix and a unit test for new `src/` logic.
- **Conventional Commits** for commit and PR titles (`feat:`, `fix:`, `docs:`,
  `chore:` …). `release-please` builds the changelog from these.

## Security

Do **not** open a public issue for vulnerabilities — see
[`SECURITY.md`](SECURITY.md) and email `ammari.ali.0001@gmail.com` privately.

## License

By contributing you agree your contributions are licensed under the
[MIT License](LICENSE). Bundled third-party assets (the Argon/Bootstrap theme,
FPDF, PHPMailer) keep their own licenses.
