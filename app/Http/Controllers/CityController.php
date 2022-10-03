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

    /*
    public function store(TreatmentPlanCategoryRequest $request)
    {
        $treatmentPlanCategory = TreatmentPlanCategory::create($request->all());

        return TreatmentPlanCategoryResource::make($treatmentPlanCategory);
    }
    */

}
