<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'member_id',
        'template_id',
        'member_name',
        'certificate_type',
        'issue_date',
        'expiry_date',
        'certificate_number',
        'status'
    ];

    protected $casts = [
        'issue_date' => 'date',
        'expiry_date' => 'date'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function template()
    {
        return $this->belongsTo(CertificateTemplate::class);
    }
}
