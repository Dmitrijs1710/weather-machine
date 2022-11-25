<?php

namespace App\Models\Weather;

class Description
{
    private string $main;
    private string $description;
    private string $id;
    private string $icon;

    public function __construct(string $main, string $description, string $id, string $icon)
    {

        $this->main = $main;
        $this->description = $description;
        $this->id = $id;
        $this->icon = $icon;
    }

    public function __toString()
    {
        return (
            "main: $this->main, " .
            "description: $this->description, " .
            "id: $this->id, " .
            "icon: $this->icon"
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

    public function getId(): string
    {
        return $this->id;
    }

    function getIcon(): string
    {
        return $this->icon;
    }
}