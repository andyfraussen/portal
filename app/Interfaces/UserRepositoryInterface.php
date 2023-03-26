<?php

namespace App\Interfaces;

use App\DTOs\UserDTO;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface {
    public function getAll(): LengthAwarePaginator;

    public function create(StoreUserRequest $userDTO): UserDTO;

    public function getById(int $id): ?UserDTO;

    public function update(int $id, UpdateUserRequest $userDTO): ?UserDTO;

    public function delete(int $id): bool;
}
