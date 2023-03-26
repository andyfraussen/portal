<?php

namespace App\DTOs;

class UserDTO
{
    public $id;
    public $name;
    public $email;
    public $organisations;

    public function __construct($data = [])
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->email = $data['email'];

        // Load OrganisationDTO for each organization
        $this->organisations = [];
        foreach ($data['organisations'] as $organisation) {
            $this->organisations[] = new OrganisationDTO($organisation);
        }
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'organisations' => $this->organisations,
        ];
    }
}
