<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'address',
        'number',
        'rent',
        'features',
        'status',
        'image'
    ];

    // public function owner(): BelongsTo
    // {
    //     return $this->belongsTo(Owner::class, 'owner_id');
    // }
}
