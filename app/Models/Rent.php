<?php

namespace App\Models;

use App\Events\RunUpdatePropertyStatusCommand;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Rent extends Model
{
    use HasFactory;

    protected $casts = [
        'rent_start' => 'date',
        'rent_end' => 'date'
    ];
    protected $fillable = [
        'tenant_id',
        'property_id',
        'rent_start',
        'rent_end',
        'deposit',
        'status',
        'paid'
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($rent) {
            // Check if the 'status' attribute is being updated
            if ($rent->isDirty('status')) {
                if ($rent->paid) {
                    $rent->property->update(['status' => 'occupied']);
                    $rent->tenant->update(['status' => 'renting']);
                }
            }
        });
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function invoice(): HasOne
    {
        return $this->hasOne(Invoice::class);
    }
    
}
