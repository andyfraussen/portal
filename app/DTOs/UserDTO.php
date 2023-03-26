<?php

namespace App\DTOs;

class UserDTO
{
    public $id;
    public $name;
    public $email;

    public function __construct($data = [])
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->email = $data['email'];
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
