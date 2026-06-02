<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'student_id',
        'university',
        'category',
        'status',
        'joined_at'
    ];
    protected $casts = [
        'joined_at' => 'datetime'
    ];
}
