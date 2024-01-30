<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\apiTraits;
class postit extends Model
{
    use HasFactory, apiTraits;
    /*protected $casts = [
        'id' => 'string'
    ];*/
    protected $fillable = [
        'tarea',
        'descripcion',
    ];
    
}
