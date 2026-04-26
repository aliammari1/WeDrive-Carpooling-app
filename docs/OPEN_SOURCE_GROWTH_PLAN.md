# Open Source Growth Plan

This plan turns the repository review into a practical backlog for WeDrive.

## Quick wins

- Add screenshots or a short demo video for ride search, booking, payment, ratings, and the admin dashboard.
- Add PHPUnit coverage for ride creation, booking, payment callbacks, and user profile flows.
- Add Cypress or Playwright smoke tests for the main user journey.
- Add API documentation for mobile or third-party consumers.
- Add `.env.example` and document local setup clearly.
- Add `good first issue` tasks for translations, UI polish, and tests.

## Bugs and bad practices to watch

- Mixing HTML, controller logic, and database queries in the same files.
- SQL injection risks if any query is not parameterized.
- Inconsistent validation across forms and API endpoints.
- Payment or booking state transitions that are not idempotent.
- Missing rate limits on authentication, search, and booking endpoints.

## Star growth strategy

1. Add a hosted demo with synthetic users and rides.
2. Show the booking flow above the fold in the README.
3. Add GitHub topics such as `carpool`, `php`, `mysql`, `mvc`, and `ridesharing`.
4. Invite localization contributions for Arabic, French, and English.
5. Publish a case study about building a carpooling platform.

## Trending-library opportunities

- Use Polars in an optional analytics script for rides, bookings, and revenue.
- Use Data-Formulator-style dashboards for admin insights.
- Use AI-assisted route recommendations as a separate, experimental service.

## Suggested next PRs

- Add PHPUnit tests around booking and payment state transitions.
- Add `docs/ARCHITECTURE.md` with MVC boundaries and data flow.
- Add a security hardening checklist.
