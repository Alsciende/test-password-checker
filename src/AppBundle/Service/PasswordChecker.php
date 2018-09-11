<?php

declare(strict_types=1);

namespace AppBundle\Service;

use \AppBundle\PasswordChecker\PasswordCheckerInterface;

class PasswordChecker
{
    private $minSizeChecker;
    private $asciiChecker;
    private $anagramChecker;

    public function _construct(PasswordCheckerInterface $passwordCheckerInterface)
    {
        $this->minSizeChecker = $passwordCheckerInterface;
        $this->asciiChecker = $passwordCheckerInterface;
        $this->anagramChecker = $passwordCheckerInterface;
    }

    public function check(string $password): ?string
    {
        $messages = array();

        if (false === $this->minSizeChecker->check($password)) {
            $messages[] = $this->minSizeChecker->message();
        }

        if (false === $this->asciiChecker->check($password)) {
            $messages[] = $this->asciiChecker->message();
        }

        if (false === $this->anagramChecker->check($password)) {
            $messages[] = $this->anagramChecker->message();
        }

        return $messages;
    }
}