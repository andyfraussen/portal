<?php

namespace App\Services;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Interfaces\UserServiceInterface;
use App\Repositories\UserRepository;
use App\DTOs\UserDTO;

class UserService implements UserServiceInterface
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUsers(): array
    {
        return $this->userRepository->getAll();
    }

    public function createUser(StoreUserRequest $userDTO): UserDTO
    {
        return $this->userRepository->create($userDTO);
    }

    public function getUserById(int $id): ?UserDTO
    {
        return $this->userRepository->getById($id);
    }

    public function updateUser(int $id, UpdateUserRequest $userDTO): ?UserDTO
    {
        return $this->userRepository->update($id, $userDTO);
    }

    public function deleteUser(int $id): bool
    {
        return $this->userRepository->delete($id);
    }
}
