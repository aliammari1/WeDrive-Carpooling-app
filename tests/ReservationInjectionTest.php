<?php

declare(strict_types=1);

namespace WeDrive\Tests;

use PDO;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../Model/Reservations/reservations.php';

/**
 * Pins the SQL-injection fix in reservations: searchReservation() and
 * sortReservation() must be injection-safe (bound parameters / whitelisted
 * ORDER BY direction).
 */
final class ReservationInjectionTest extends TestCase
{
    private PDO $pdo;
    private \reservations $reservations;

    protected function setUp(): void
    {
        $this->pdo = TestDatabase::create();
        TestDatabase::seedReservation($this->pdo, 'chien');
        TestDatabase::seedReservation($this->pdo, 'chat');
        $this->reservations = new \reservations($this->pdo);
    }

    public function testSearchTreatsInjectionAttemptAsLiteral(): void
    {
        // A classic injection payload. If interpolated, this could alter the
        // query; with bound params it is just a (non-matching) search string.
        $payload = "' OR '1'='1";
        $rows = $this->reservations->searchReservation($payload);

        self::assertSame([], $rows, 'Injection payload must not return all rows.');
    }

    public function testSearchMatchesLegitimateTerm(): void
    {
        $rows = $this->reservations->searchReservation('chien');
        self::assertCount(1, $rows);
        self::assertSame('chien', $rows[0]['animal']);
    }

    public function testSearchDoesNotCorruptTable(): void
    {
        // A drop-table style payload must be harmless.
        $this->reservations->searchReservation("x'; DROP TABLE reservation; --");

        $rows = $this->reservations->showReservations();
        self::assertCount(2, $rows, 'Table must still exist with its rows intact.');
    }

    public function testSortOnlyAcceptsWhitelistedDirection(): void
    {
        // An injection in the sort direction must not break the query and must
        // still return the rows (direction whitelisted to ASC/DESC).
        $rows = $this->reservations->sortReservation("DESC; DROP TABLE reservation");
        self::assertCount(2, $rows);

        $rowsAsc = $this->reservations->sortReservation('ASC');
        self::assertCount(2, $rowsAsc);
    }
}
