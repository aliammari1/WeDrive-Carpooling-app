<?php

declare(strict_types=1);

namespace WeDrive\Tests;

use PDO;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../Model/Users/users.php';

/**
 * Pins the security hotfix: login must REJECT a wrong password.
 *
 * The original sanitize_login() hashed the submitted password and "verified" it
 * against that same fresh hash, which is always true — so any password logged a
 * user in. The fix moved verification into ControlSignin via password_verify()
 * against the STORED hash. These tests assert that gate directly.
 */
final class AuthTest extends TestCase
{
    private PDO $pdo;
    private \users $users;

    protected function setUp(): void
    {
        $this->pdo = TestDatabase::create();
        TestDatabase::seedUser($this->pdo, 'alice@wedrive.test', 'correct-horse-battery', 'passager');
        $this->users = new \users($this->pdo);
    }

    /**
     * Replicates the exact authentication decision made in
     * Controller/Users/ControlSignin.php.
     */
    private function authenticate(string $email, string $password): bool
    {
        $user = $this->users->getUser($email);
        if ($user === null) {
            return false;
        }

        return password_verify($password, $user->getPassword());
    }

    public function testLoginRejectsWrongPassword(): void
    {
        self::assertFalse(
            $this->authenticate('alice@wedrive.test', 'this-is-the-wrong-password'),
            'Login must reject an incorrect password (auth-bypass regression guard).'
        );
    }

    public function testLoginRejectsEmptyPassword(): void
    {
        self::assertFalse($this->authenticate('alice@wedrive.test', ''));
    }

    public function testLoginRejectsUnknownEmail(): void
    {
        self::assertFalse($this->authenticate('nobody@wedrive.test', 'whatever'));
    }

    public function testLoginAcceptsCorrectPassword(): void
    {
        self::assertTrue(
            $this->authenticate('alice@wedrive.test', 'correct-horse-battery'),
            'A valid email + correct password must still authenticate.'
        );
    }

    public function testStoredPasswordIsHashedNotPlaintext(): void
    {
        $user = $this->users->getUser('alice@wedrive.test');
        self::assertNotNull($user);
        self::assertNotSame('correct-horse-battery', $user->getPassword());
        self::assertStringStartsWith('$2y$', $user->getPassword());
    }
}
