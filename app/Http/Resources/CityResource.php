<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
/**
 * It returns the parent's toArray() function.
 *
 * @param request The incoming request.
 *
 * @return The parent::toArray() is returning the data from the parent class.
 */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
