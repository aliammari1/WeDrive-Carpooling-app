<?php

declare(strict_types=1);

/**
 * Seed demo users with VALID bcrypt password hashes.
 *
 * Run after loading database/schema.sql (and optionally database/seeds.sql):
 *     php database/seed.php
 *
 * Reads DB credentials from the environment / .env via WeDrive\Database.
 * Idempotent: uses INSERT ... ON DUPLICATE KEY UPDATE on the unique email.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use WeDrive\Database;

$pdo = Database::pdo();

$demoUsers = [
    ['nom' => 'Admin',  'prenom' => 'WeDrive', 'email' => 'admin@wedrive.test',  'role' => 'admin'],
    ['nom' => 'Driver', 'prenom' => 'Demo',    'email' => 'driver@wedrive.test', 'role' => 'conducteur'],
    ['nom' => 'Rider',  'prenom' => 'Demo',    'email' => 'rider@wedrive.test',  'role' => 'passager'],
];

$plainPassword = 'password123';
$hash = password_hash($plainPassword, PASSWORD_DEFAULT, ['cost' => 12]);

$sql = 'INSERT INTO users (nom, prenom, email, password, adresse, numTel, role)
        VALUES (:nom, :prenom, :email, :password, :adresse, :numTel, :role)
        ON DUPLICATE KEY UPDATE password = VALUES(password), role = VALUES(role)';
$stmt = $pdo->prepare($sql);

foreach ($demoUsers as $u) {
    $stmt->execute([
        ':nom'      => $u['nom'],
        ':prenom'   => $u['prenom'],
        ':email'    => $u['email'],
        ':password' => $hash,
        ':adresse'  => 'Tunis',
        ':numTel'   => '20000000',
        ':role'     => $u['role'],
    ]);
    echo "seeded {$u['email']} ({$u['role']})\n";
}

echo "Done. Demo password for all users: {$plainPassword}\n";
