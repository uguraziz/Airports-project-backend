<?php

namespace App\Interfaces;

use App\Models\Airports;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

interface AirportsInterface
{
    public function all(): Collection;

    public function find(int $id): ?Airports;

    public function get(int $id = 0): JsonResponse;

    public function create(array $data): JsonResponse;

    public function update(array $data, int $id): JsonResponse;

    public function delete(int $id): JsonResponse;
}
