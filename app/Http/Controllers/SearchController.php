<?php

namespace App\Http\Controllers;

use App\Models\Airports;
use Illuminate\Http\Request;
use MeiliSearch\Endpoints\Indexes;

class SearchController extends Controller
{
    protected $airports;
    public function __construct(Airports $airports)
    {
        $this->airports = $airports;
    }

    public function search(Request $request)
    {
        $query = $request->input('name');
        $results = $this->airports->search($query)->raw();
        return response()->json([
            'status' => true,
            'message' => 'Search results',
            'data' => $results['hits']
        ]);
    }

    public function nearestAirports(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $results = $this->airports->search('', function (Indexes $meiliSearch) use ($latitude, $longitude) {
            return $meiliSearch->search('', [
                'filter' => "_geoRadius($latitude, $longitude, 2000000)",
                'limit' => 5
            ]);
        })->raw();

        return response()->json([
            'status' => true,
            'message' => 'Search results',
            'data' => $results['hits']
        ]);
    }
}
