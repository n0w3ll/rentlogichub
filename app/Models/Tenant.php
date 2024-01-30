<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tenant extends Model
{
    use HasFactory;

    protected $casts = [
        'registered_at' => 'date',
    ];
    protected $fillable = [
        'name',
        'identity_no',
        'phone',
        'email',
        'registered_at',
        'agreement',
        'status'
    ];

    public function rents(): HasMany 
    {
        return $this->hasMany(Rent::class);
    }
}
