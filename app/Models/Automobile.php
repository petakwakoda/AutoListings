<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Automobile extends Model
{
    use HasFactory;

  
    public function automobilemodel()
    {
        return $this->belongsTo(Carmodel::class, 'carmodel_id');
    }
}
