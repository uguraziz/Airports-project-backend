<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Repositories\AuthRepository;

class AuthController extends Controller
{
    protected $userRepository;
    public function __construct(AuthRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function get($id = 0)
    {
        return $this->userRepository->get($id);
    }

    public function register(AuthRegisterRequest $request)
    {
        return $this->userRepository->register($request->all());
    }

    public function login(AuthLoginRequest $request)
    {
        return $this->userRepository->login($request->all());
    }

    public function logout($id)
    {
        return $this->userRepository->logout($id);
    }
}
