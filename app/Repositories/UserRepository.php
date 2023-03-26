<?php

namespace App\Repositories;

use App\DTOs\UserDTO;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function getAll(int $perPage = 10): LengthAwarePaginator
    {
        $users = User::with('organisations')->paginate($perPage);

        return $users;
    }

    public function create(StoreUserRequest $userDTO): UserDTO
    {
        $user = new User();

        $validatedData = $userDTO->validated();
        $validatedData['password'] = Hash::make($validatedData['password']);

        $user->fill($validatedData);
        $user->save();

        return new UserDTO($user);
    }

    public function getById(int $id): ?UserDTO
    {
        $user = User::with('organisations')->find($id);

        if ($user === null) {
            return null;
        }

        return new UserDTO($user);
    }

    public function update(int $id, UpdateUserRequest $userDTO): ?UserDTO
    {
        $user = User::with('organisations')->find($id);

        if ($user === null) {
            return null;
        }

        $validatedData = $userDTO->validated();
        $validatedData['password'] = Hash::make($validatedData['password']);

        $user->fill($validatedData);
        $user->save();

        return new UserDTO($user);
    }

    public function delete(int $id): bool
    {
        $user = User::find($id);

        if ($user === null) {
            return false;
        }

        $user->delete();

        return true;
    }
}
