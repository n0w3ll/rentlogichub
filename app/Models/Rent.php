<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'property_id',
        'rent_start',
        'rent_end',
        'deposit'
    ];
    
}
