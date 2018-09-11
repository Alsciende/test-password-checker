<?php

namespace AppBundle\PasswordChecker;

interface PasswordCheckerInterface{

    /**
     * @param string $password
     * @return bool
     * 
     * Return true if the given password match the restriction
     */
    public function check(string $password): bool;

    /**
     * @return string
     * 
     * Return an error message
     */
    public function message(): string;
    
}