<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UltrasoundScanRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelvis',
        'thyroid',
        'breasts',
        'prostate',
        'obstetric',
        'abdominal',
    ];

    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class);
    }
}
