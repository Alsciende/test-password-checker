<?php

declare(strict_types=1);

namespace AppBundle\PasswordChecker;

class MinSizeChecker implements PasswordCheckerInterface
{
    const MIN_SIZE = 6;

    /**
     * @param string $password
     * @return bool
     *
     * Check if the size of the given password is greater than 6 or equal 6
     */
    public function check(string $password): bool
    {
        return strlen($password) >= self::MIN_SIZE;
    }

    /**
     * @return string
     *
     * Return a message if the function check() return false
     */
    public function message(): string
    {
        return sprintf('Password length must be at least %d', self::MIN_SIZE);
    }
}
