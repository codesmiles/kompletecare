<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecordDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        "description",
        'medical_record_type_id',
    ];

    public function medicalRecordTypes()
    {
        return $this->belongsTo(MedicalRecordType::class);
    }

}
