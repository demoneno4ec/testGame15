<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resolved extends Model
{
    use HasFactory;

    protected $table = 'resolved';

    protected $fillable = [
        'steps',
    ];

    protected $casts = [
        'steps' => 'json',
    ];
}
