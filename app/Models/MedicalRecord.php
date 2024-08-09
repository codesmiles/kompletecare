<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function xrayRecord()
    {
        return $this->hasOne(XrayRecord::class);
    }

    public function ultrasoundRecord()
    {
        return $this->hasOne(UltrasoundScanRecord::class);
    }


}
