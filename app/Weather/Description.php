<?php

namespace App\Weather;

class Description
{
    private string $main;
    private string $description;

    public function __construct(string $main, string $description)
    {

        $this->main = $main;
        $this->description = $description;
    }

    public function __toString()
    {
        return (
            "main: $this->main, " .
            "description: $this->description"
        );
    }

    public function getMain(): string
    {
        return $this->main;
    }


    public function getDescription(): string
    {
        return $this->description;
    }
}