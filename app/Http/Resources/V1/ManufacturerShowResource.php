<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Automobile;

class ManufacturerShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
        	'id'=>$this->id,
           'name'=>$this->name,
           'headquarters'=>$this->headquarters,
           'established'=>$this->established,
           'VehicleCount'=>Automobile::where('make', $this->id)->count(),
           'VehicleList'=> route('vehicles', $this->name),                 
           ];
    }
}
