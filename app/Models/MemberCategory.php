<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberCategory extends Model
{
    protected $fillable = [
        'name', 'color', 'description'
    ];
    
    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
