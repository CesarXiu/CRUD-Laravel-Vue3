<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postit extends Model
{
    use HasFactory;
    protected $fillable = [
        'tarea',
        'descripcion',
    ];
}
