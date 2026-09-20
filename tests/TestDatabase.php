<?php

declare(strict_types=1);

namespace WeDrive\Tests;

use PDO;

/**
 * Builds a disposable in-memory SQLite database with just enough of the WeDrive
 * schema (and seed rows) for the security/model tests. This is what makes the
 * legacy models testable now that they accept an injected PDO.
 */
final class TestDatabase
{
    public static function create(): PDO
    {
        $pdo = new PDO('sqlite::memory:');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $pdo->exec(
            'CREATE TABLE users (
                id_user INTEGER PRIMARY KEY AUTOINCREMENT,
                nom TEXT, prenom TEXT, email TEXT UNIQUE, password TEXT,
                adresse TEXT, numTel TEXT, role TEXT, profileImage BLOB
            )'
        );

        $pdo->exec(
            'CREATE TABLE reservation (
                id_reserv INTEGER PRIMARY KEY AUTOINCREMENT,
                animal TEXT, nb_valize INTEGER, nb_place_vide INTEGER,
                mode_paiement TEXT, date_meet TEXT
            )'
        );

        return $pdo;
    }

    /**
     * Insert a user with a real bcrypt hash of $plainPassword.
     */
    public static function seedUser(
        PDO $pdo,
        string $email,
        string $plainPassword,
        string $role = 'passager'
    ): void {
        $hash = password_hash($plainPassword, PASSWORD_DEFAULT, ['cost' => 10]);
        $stmt = $pdo->prepare(
            'INSERT INTO users (nom, prenom, email, password, adresse, numTel, role, profileImage)
             VALUES (:nom, :prenom, :email, :password, :adresse, :numTel, :role, :img)'
        );
        $stmt->execute([
            ':nom'      => 'Test',
            ':prenom'   => 'User',
            ':email'    => $email,
            ':password' => $hash,
            ':adresse'  => 'Tunis',
            ':numTel'   => '20000000',
            ':role'     => $role,
            ':img'      => 'x',
        ]);
    }

    public static function seedReservation(PDO $pdo, string $animal): void
    {
        $stmt = $pdo->prepare(
            'INSERT INTO reservation (animal, nb_valize, nb_place_vide, mode_paiement, date_meet)
             VALUES (:animal, 0, 3, :mode, :date)'
        );
        $stmt->execute([
            ':animal' => $animal,
            ':mode'   => 'especes',
            ':date'   => '2025-07-01 08:30:00',
        ]);
    }
}
