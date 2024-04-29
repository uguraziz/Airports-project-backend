<?php

namespace App\Repositories;

use App\Interfaces\CountriesInterface;
use Illuminate\Support\Collection;
use Illuminate\Http\JsonResponse;
use App\Models\Countries;

class CountriesRepository implements CountriesInterface
{
    private $countries;
    public function __construct(Countries $countries)
    {
        $this->countries = $countries;
    }

    public function all(): Collection
    {
        return $this->countries->all();
    }

    public function find(int $id): ?Countries
    {
        return $this->countries->find($id);
    }

    public function get(int $id = 0): JsonResponse
    {
        if($id != 0) {
            $countries = $this->find($id);
        } else {
            $countries = $this->all();
        }

        if(!$countries) {
            return response()->json([
                'status' => false,
                'message' => 'Countries not found'
            ], 400);
        }

        return response()->json([
            'status' => true,
            'message' => 'Countries listed successfully',
            'data' => $countries
        ]);
    }

    public function create(array $data): JsonResponse
    {
        $countries = $this->countries;
        $countries->name = $data['name'];
        $countries->save();

        return response()->json([
            'status' => true,
            'message' => 'Countries created successfully',
            'data' => $countries
        ]);
    }

    public function update(array $data, int $id): JsonResponse
    {
        $countries = $this->find($id);

        $countries->name = $data['name'] ?? $countries->name;
        $countries->save();

        return response()->json([
            'status' => true,
            'message' => 'Countries updated successfully',
            'data' => $countries
        ]);
    }

    public function delete(int $id): JsonResponse
    {
        $countries = $this->find($id);

        $countries->delete();

        return response()->json([
            'status' => true,
            'message' => 'Countries deleted successfully'
        ]);
    }
}
