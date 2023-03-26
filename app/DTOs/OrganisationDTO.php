<?php

namespace App\DTOs;

class OrganisationDTO
{
    public $id;
    public $name;

    public function __construct($data = [])
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
