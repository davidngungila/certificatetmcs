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
        'member_category_id',
        'status',
        'joined_at'
    ];
    protected $casts = [
        'joined_at' => 'datetime'
    ];

    public function category()
    {
        return $this->belongsTo(MemberCategory::class, 'member_category_id');
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
}
