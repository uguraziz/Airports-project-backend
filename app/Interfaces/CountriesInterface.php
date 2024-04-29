<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;
use Illuminate\Http\JsonResponse;
use App\Models\Countries;

interface CountriesInterface
{
    public function all(): Collection;

    public function find(int $id): ?Countries;

    public function get(int $id = 0): JsonResponse;

    public function create(array $data): JsonResponse;

    public function update(array $data, int $id): JsonResponse;

    public function delete(int $id): JsonResponse;
}
