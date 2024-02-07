<?php

namespace App\Models;

use App\Events\RentStatusChanged;
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

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($invoice) {
            // Check if the 'fully_paid' attribute is being updated
            if ($invoice->isDirty('fully_paid')) {
                // Perform some action when the 'fully_paid' attribute is updated
                if ($invoice->fully_paid)
                {
                    $invoice->rent->update(['paid' => true]);
                    $invoice->rent->update(['status' => 'ongoing']);
                }
            }
        });
    }

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
