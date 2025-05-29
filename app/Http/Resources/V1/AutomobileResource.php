<?php

namespace App\Http\Resources\V1;

use App\Models\Automobile;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AutomobileResource extends JsonResource
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
         'year'=>$this->year,
         'model'=>$this->automobilemodel->model_name,
         'carmodelId'=>$this->carmodel_id
        ];
    }
}
