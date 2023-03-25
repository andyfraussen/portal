<?php

namespace App\Interfaces;

use App\DTOs\UserDTO;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

interface UserServiceInterface
{
    public function getUsers(): array;

    public function getUserById(int $id): ?UserDTO;

    public function createUser(StoreUserRequest $userDTO): UserDTO;

    public function updateUser(int $id, UpdateUserRequest $userDTO): ?UserDTO;

    public function deleteUser(int $id): bool;
}
