<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carmodel extends Model
{
    use HasFactory;

    public function modelvehicles()
     {
    	return $this->hasMany(Automobile::class);
     }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
}
