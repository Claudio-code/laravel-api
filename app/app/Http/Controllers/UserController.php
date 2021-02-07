<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected Repository $userRepository;

    public function __construct(User $user)
    {
        $this->userRepository = new Repository($user);
    }

    public function login(Request $request): JsonResponse
    {
        return $this->responseJson($request->user());
    }

    public function index(Request $request): JsonResponse
    {
        $id = intval($request->all()['id']);

        return $this->responseJson($this->userRepository->show($id));
    }

    public function create(Request $request): JsonResponse
    {
        $user = $this->userRepository->create($request->all());
        $user->token = $user->createToken($user->email)->accessToken;

        return $this->responseJson($user, 201);
    }

    public function update(Request $request): JsonResponse
    {
        $user = $this->userRepository->update($request->all());

        return $this->responseJson($user, 201);
    }

    public function delete(Request $request): JsonResponse
    {
        $id = intval($request->all()['id']);
        $this->userRepository->delete($id);

        return $this->responseJson([
            'status' => true
        ], 201);
    }
}
