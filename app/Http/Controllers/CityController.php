<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\City;

class CityController extends Controller
{
    public function index()
    {
        return CityResource::collection(
            City::query()
                ->orderBy('name', 'asc')
                ->get()
        );
    }
}
