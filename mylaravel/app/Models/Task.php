<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = [
        'title',
        'description',
        'is_completed',
    ];

    // Cast is_completed to boolean automatically
    protected $casts = [
        'is_completed' => 'boolean',
    ];
}