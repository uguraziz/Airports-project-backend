<?php

namespace App\Interfaces;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;


interface AuthInterface
{
    public function all(): Collection;

    public function find(int $id): ?User;

    public function get(int $id = 0): JsonResponse;

    public function register(array $data): JsonResponse;

    public function login(array $data): JsonResponse;

    public function logout(int $id): JsonResponse;
}
