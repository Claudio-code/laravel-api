<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        return $this->responseJson([
            'event' => 'index'
        ]);
    }

    public function create(): JsonResponse
    {
        return $this->responseJson([
            'event' => 'create'
        ]);
    }

    public function update(): JsonResponse
    {
        return $this->responseJson([
            'event' => 'update'
        ]);
    }

    public function delete(): JsonResponse
    {
        return $this->responseJson([
            'event' => 'delete'
        ]);
    }
}
