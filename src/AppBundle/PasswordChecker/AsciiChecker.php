<?php

namespace AppBundle\PasswordChecker;


class AsciiChecker implements PasswordCheckerInterface
{
    /**
     * @param string $password
     * @return bool
     * 
     * Check if the given password contains only ascii characters
     */
    public function check(string $password): bool
    {
        return !preg_match('/[\\x80-\\xff]+/' ,$password);
    }

    /**
     * @return string
     * 
     * Return a message if the function check() return false
     */
    public function message(): string
    {
        return sprintf('Password must contains only ASCII characters.');
    }

}