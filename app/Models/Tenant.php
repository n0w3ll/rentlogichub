<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
