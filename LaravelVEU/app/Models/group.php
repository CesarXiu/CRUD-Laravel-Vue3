<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Traits\apiTraits;
class group extends Model
{
    use HasFactory, apiTraits;
    public $allowInclude = [
        'postit'
    ];
    public $allowSort = [
        'name'
    ];
    protected $allowFilter = [
        'name',
        'postit_id',
    ];
    protected $fillable = [
        'name',
        'postit_id',
    ];
    
    public function postit(): BelongsTo
    {
        return $this->belongsTo(postit::class);
    }
}
