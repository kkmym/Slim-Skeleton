<?php

namespace MyApp\Domain\ValueObjects;

class UserName
{
    protected $lastName;
    protected $firstName;

    public function __construct(string $lastName, string $firstName)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
    }

    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        }
    }
}
