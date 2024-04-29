<?php

namespace App\Repositories;

use App\Interfaces\AuthInterface;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;


class AuthRepository implements AuthInterface
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all(): Collection
    {
        return $this->user->all();
    }

    public function find(int $id): ?User
    {
        return $this->user->find($id);
    }

    public function get(int $id = 0): JsonResponse
    {
        if ($id == 0) {
            $users = $this->all();
            return response()->json([
                'status' => true,
                'message' => 'All users',
                'data' => $users
            ]);
        }

        $user = $this->find($id);
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'User found',
            'data' => $user
        ]);
    }

    public function register(array $data): JsonResponse
    {
        $data['password'] = Hash::make($data['password']);
        $user = $this->user->create($data);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'User registered successfully',
            'data' => $user,
            'token' => $token
        ]);
    }

    public function login(array $data): JsonResponse
    {
        $user = $this->user->where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid login details'
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'User logged in successfully',
            'data' => $user,
            'token' => $token
        ]);
    }

    public function logout(int $id): JsonResponse
    {
        $user = $this->find($id);
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ]);
        }

        $user->tokens()->delete();

        return response()->json([
            'status' => true,
            'message' => 'User logged out successfully'
        ]);
    }
}
