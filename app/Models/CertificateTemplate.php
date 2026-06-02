<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CertificateTemplate extends Model
{
    protected $fillable = [
        'name', 'description', 'design_data', 'status'
    ];

    protected $casts = [
        'design_data' => 'array'
    ];

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
}
