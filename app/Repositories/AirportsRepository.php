<?php

namespace App\Repositories;

use App\Interfaces\AirportsInterface;
use App\Models\Airports;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class AirportsRepository implements AirportsInterface
{
    protected $airports;
    public function __construct(Airports $airports)
    {
        $this->airports = $airports;
    }

    public function all(): Collection
    {
        return $this->airports->all();
    }

    public function find(int $id): ?Airports
    {
        return $this->airports->find($id);
    }

    public function get(int $id = 0): JsonResponse
    {
        if ($id != 0) {
            $airports = $this->find($id);
        } else {
            $airports = $this->all();
        }

        if (!$airports) {
            return response()->json([
                'status' => false,
                'message' => 'Airports not found'
            ], 400);
        }

        return response()->json([
            'status' => true,
            'message' => 'Airports listed successfully',
            'data' => $airports
        ]);
    }

    public function create(array $data): JsonResponse
    {
        $airports = $this->airports;
        $airports->countries_id = $data['countries_id'];
        $airports->name = $data['name'];
        $airports->code = $data['code'];
        $airports->latitude = $data['latitude'];
        $airports->longitude = $data['longitude'];
        $airports->save();

        return response()->json([
            'status' => true,
            'message' => 'Airports created successfully',
            'data' => $airports
        ]);
    }

    public function update(array $data, int $id): JsonResponse
    {
        $airports = $this->find($id);
        $airports->countries_id = $data['countries_id'] ?? $airports->countries_id;
        $airports->name = $data['name'] ?? $airports->name;
        $airports->code = $data['code'] ?? $airports->code;
        $airports->latitude = $data['latitude'] ?? $airports->latitude;
        $airports->longitude = $data['longitude'] ?? $airports->longitude;
        $airports->save();

        return response()->json([
            'status' => true,
            'message' => 'Airports updated successfully',
            'data' => $airports
        ]);
    }

    public function delete(int $id): JsonResponse
    {
        $airports = $this->find($id);

        if (!$airports) {
            return response()->json([
                'status' => false,
                'message' => 'Airports not found'
            ], 400);
        }

        $airports->delete();

        return response()->json([
            'status' => true,
            'message' => 'Airports deleted successfully'
        ]);
    }
}
