<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAirportsRequest;
use App\Http\Requests\UpdateAirportsRequest;
use App\Repositories\AirportsRepository;

class AirportsController extends Controller
{
    protected $airportsRepository;
    public function __construct(AirportsRepository $airportsRepository)
    {
        $this->airportsRepository = $airportsRepository;
    }

    public function get(int $id = 0)
    {
        return $this->airportsRepository->get($id);
    }

    public function create(CreateAirportsRequest $request)
    {
        return $this->airportsRepository->create($request->all());
    }

    public function update(UpdateAirportsRequest $request, int $id)
    {
        $data = $request->all();
        return $this->airportsRepository->update($data, $id);
    }

    public function delete(int $id)
    {
        return $this->airportsRepository->delete($id);
    }
}
