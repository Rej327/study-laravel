<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dummy extends Model
{
    use HasFactory;

// In app/Models/Dummy.php
    protected $fillable = ['user_id', 'name', 'title', 'description'];

    // Relationship: Dummy belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
