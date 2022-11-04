<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Http\Requests\City\CityRequest;
use App\Models\City;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware(['can:cities.index'])->only('index');
        $this->middleware(['can:cities.store'])->only('store');
        $this->middleware(['can:cities.show'])->only('show');
        $this->middleware(['can:cities.update'])->only('update');
        $this->middleware(['can:cities.destroy'])->only('destroy');
    }

    public function index()
    {
/* Returning a collection of cities ordered by name in ascending order. */
        $cities = City::query()->paginate(5);
        return CityResource::collection($cities);
    }

    public function store(CityRequest $request)
    {
        $cities = City::create($request->all());
        return CityResource::make($cities);
    }

    public function show($id)
    {
        $cities = City::find($id);
        if (is_null($cities)) {
            return response()->json([
                "data" => 'City Not found'
            ]);
        } else {
            return response()->json([
                "data" => $cities
            ]);
        }
    }

    public function update(CityRequest $request, city $city)
    {
        $input = $request->all();
        $city->name  = $input['name'];
        $city->latitude = $input['latitude'];
        $city->longitude = $input['longitude'];
        $city->state_name = $input['state_name'];
        $city->state_code = $input['state_code'];
        $city->country_code = $input['country_code'];
        $city->timezone = $input['timezone'];
        $city->save();
        return response()->json([
            "data" => $city
        ]);

    }

    public function destroy(city $city)
    {
        $city->delete();
        return response()->json([
            "success" => true,
            "message" => "City deleted successfully.",
            "data" => $city
]);
}

}
