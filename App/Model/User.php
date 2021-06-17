<?php

namespace App\Model;


class User
{
    private $name;

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}