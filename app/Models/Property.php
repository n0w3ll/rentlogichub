<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'type',
        'address',
        'number',
        'rent',
        'features',
        'status',
        'images'
    ];

    protected $casts = [
        'images' => 'array'
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class);
    }

    public function rent(): HasOne
    {
        return $this->hasOne(Rent::class);
    }

    public function tenants(): BelongsToMany
    {
        return $this->belongsToMany(Tenant::class, 'rents')
            ->withPivot('rent_start', 'rent_end');
    }
    public function removeItem($itemId)
    {
        $this->update([
            'images' => array_values(array_diff($this->images, [$itemId])),
        ]);
    }
}
