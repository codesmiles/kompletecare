<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalTestType extends Model
{
    use HasFactory;

    protected $fillable = [
        'medical_record_id',
        'type',
    ];

    public function medicalTest(){
        return $this->belongsTo(MedicalTest::class);
    }
}
