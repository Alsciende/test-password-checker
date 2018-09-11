<?php

namespace Tests\AppBundle\PasswordChecker;

use AppBundle\PasswordChecker\AsciiChecker;
use PHPUnit\Framework\TestCase;

class AsciiCheckerTest extends TestCase
{

    /**
     * @var AsciiChecker
     */
    private $checker;

    protected function setUp()
    {
        $this->checker = new AsciiChecker();
    }

    public function testCheckTrue()
    {
        $this->assertTrue($this->checker->check('abcd56!'));
    }

    public function testCheckFalse()
    {
        $this->assertFalse($this->checker->check('fgj5235éaaa'));
    }

    public function testCheckEmpty()
    {
        $this->assertTrue($this->checker->check(''));
    }

}