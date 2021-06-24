<?php

namespace Tests\Unit;

use Illuminate\Support\Str;
use PenguinPass\Password;
use PenguinPass\WordLists;
use PHPUnit\Framework\TestCase;

class PasswordTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicCreate()
    {
        $password = Password::generate();

        echo 'Got password: '.$password;

        $this->assertNotEmpty($password);
        $this->assertTrue(Str::length($password) >= 8);
    }

    public function testCombinationCount()
    {
        $wordList = new WordLists();

        $wordPossibilies = $wordList->adjectiveList->count() ** $wordList->nounList->count();

        $this->assertGreaterThan(10 ^ 10, $wordPossibilies);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBulkCreate()
    {
        $passwords = [];
        for ($i = 0; $i < 100; $i++) {
            $password = Password::generate();

            echo $i.' Got password: '.$password.' '.(array_flip($passwords)[$password] ?? '-')."\n";

            $this->assertNotEmpty($password);
            $this->assertTrue(Str::length($password) >= 8);
            $this->assertFalse(in_array($password, $passwords));

            $passwords[] = $password;
        }
    }
}
