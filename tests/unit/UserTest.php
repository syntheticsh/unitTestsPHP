<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /** @var \App\Models\User */
    private $user;

    public function setUp(): void
    {
        $this->user = new \App\Models\User();
        parent::setUp();
    }

    /** @test */
    public function thatWeCanGetFirstName()
    {
        $this->user->serFirstName('Billy');

        $this->assertEquals('Billy', $this->user->getFirstName());
    }

    /** @test */
    public function thatWeCanGetLastName()
    {
        $this->user->serLastName('Garrett');

        $this->assertEquals('Garrett', $this->user->getLastName());
    }

    /** @test */
    public function thatFullNameIsReturned()
    {
        $this->user->serFirstName('Billy');
        $this->user->serLastName('Garrett');

        $this->assertEquals('Billy Garrett', $this->user->getFullName());
    }

    /** @test */
    public function firstAndLastNameAreTrimmed()
    {
        $this->user->serFirstName('    Billy');
        $this->user->serLastName('Garrett       ');

        $this->assertEquals('Billy', $this->user->getFirstName());
        $this->assertEquals('Garrett', $this->user->getLastName());
    }

    /** @test */
    public function emailCanBeSet()
    {
        $this->user->serEmail('billy@example.com');

        $this->assertEquals('billy@example.com', $this->user->getEmail());
    }

    /** @test */
    public function emailVariablesContainsCorrectValue()
    {
        $this->user->serFirstName('Billy');
        $this->user->serLastName('Garrett');
        $this->user->serEmail('billy@example.com');

        $emailVariables = $this->user->getEmailVariables();

        $this->assertArrayHasKey('fullname', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals('billy@example.com', $emailVariables['email']);
        $this->assertEquals('Billy Garrett', $emailVariables['fullname']);
    }
}
