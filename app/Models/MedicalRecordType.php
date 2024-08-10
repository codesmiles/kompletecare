<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecordType extends Model
{
    use HasFactory;
    protected $fillable = [
           'name',
           'medical_record_id',
       ];
       public function medicalRecord()
       {
           return $this->belongsTo(MedicalRecord::class);
       }
       public function medicalRecordDetail()
       {
           return $this->hasMany(MedicalRecordDetail::class);
       }
}
