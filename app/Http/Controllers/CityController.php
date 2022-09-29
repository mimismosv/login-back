<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\City;

class CityController extends Controller
{
/**
 * It returns a collection of cities ordered by name in ascending order.
 *
 * @return A collection of cities.
 */
    public function index()
    {
        /*
        return CityResource::collection(
            City::query()
                ->orderBy('name', 'asc')
                ->get()
        );*/

        $cities = City::query()->paginate();

        return CityResource::collection($cities);
    }
}
