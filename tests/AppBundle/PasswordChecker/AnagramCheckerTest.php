<?php

namespace Tests\AppBundle\PasswordChecker;

use AppBundle\PasswordChecker\AnagramChecker;
use PHPUnit\Framework\TestCase;

class AnagramCheckerTest extends TestCase
{
    /**
     * @var AnagramChecker
     */
    private $checker;

    protected function setUp()
    {
        $this->checker = new AnagramChecker();
    }

    public function testCheckTrue()
    {
        $this->assertTrue($this->checker->check('abcdhgtr'));
    }

    public function testCheckFalse()
    {
        $this->assertFalse($this->checker->check('wordpass'));
    }
}