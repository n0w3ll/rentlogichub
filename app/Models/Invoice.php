<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'rent_id',
        'amount',
        'fully_paid'
    ];

    public function property(): HasOneThrough
    {
        return $this->hasOneThrough(Property::class, Rent::class);
    }

    public function tenant(): HasOneThrough
    {
        return $this->hasOneThrough(Tenant::class, Rent::class);
    }

    public function rent(): BelongsTo
    {
        return $this->belongsTo(Rent::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
