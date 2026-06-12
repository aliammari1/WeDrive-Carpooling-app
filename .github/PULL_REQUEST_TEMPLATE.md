<!-- Use a Conventional Commit title, e.g. "fix: parameterize avis search" -->

## What does this PR do?

<!-- A short description. Link any issue: Closes #123 -->

## Type of change

- [ ] `fix` — bug fix
- [ ] `feat` — new feature
- [ ] `docs` — documentation only
- [ ] `chore` / `ci` / `refactor` / `test`

## Checklist

- [ ] `composer lint` passes (`php -l` over `Controller/ Model/ src/`)
- [ ] `composer stan` passes (PHPStan level 3)
- [ ] `composer cs` passes (PSR-12) — ran `composer cs-fix` if needed
- [ ] `composer test` passes (PHPUnit)
- [ ] `vendor/bin/psalm` passes (taint analysis) for security-relevant changes
- [ ] New code lives in `src/` under `WeDrive\` where practical
- [ ] No hardcoded DB credentials — used `WeDrive\Database::pdo()`
- [ ] All SQL is parameterized / `ORDER BY` is whitelisted
- [ ] Added or updated tests for the change

## Notes for reviewers

<!-- Anything that needs context: schema changes, env vars, migration steps. -->
