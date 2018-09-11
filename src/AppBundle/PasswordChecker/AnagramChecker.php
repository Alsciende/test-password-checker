<?php

namespace AppBundle\PasswordChecker;


class AnagramChecker implements PasswordCheckerInterface
{
    /**
     * @param string $password
     * @return bool
     * 
     * Check if the given password is an anagram of 'password'
     */
    public function check(string $password): bool
    {
        $anagramResult = true;

        if (count_chars($password, 1) == count_chars("password", 1)){
            $anagramResult = false;
        }

        return $anagramResult;
    }

    /**
     * @return string
     * 
     * Return a message if the function check() return false
     */
    public function message(): string
    {
        return sprintf('Password can\'t be an anagram of the word "password".');
    }

}