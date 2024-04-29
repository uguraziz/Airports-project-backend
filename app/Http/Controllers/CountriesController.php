<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCountryRequest;
use App\Repositories\CountriesRepository;

class CountriesController extends Controller
{
    protected $countriesRepository;
    public function __construct(CountriesRepository $countriesRepository)
    {
        $this->countriesRepository = $countriesRepository;
    }

    public function get(int $id = 0)
    {
        return $this->countriesRepository->get($id);
    }

    public function create(CreateCountryRequest $request)
    {
        return $this->countriesRepository->create($request->all());
    }

    public function update(CreateCountryRequest $request, int $id)
    {
        return $this->countriesRepository->update($request->all(), $id);
    }

    public function delete(int $id)
    {
        return $this->countriesRepository->delete($id);
    }
}
