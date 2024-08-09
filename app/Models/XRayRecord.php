<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XRayRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'toes',
        'foot',
        'chest',
        'ankle',
        'humerus',
        'fingers',
        'femoral',
        'hip_joint',
        'knee_joint',
        'wrist_joint',
        'elbow_joint',
        'pelvic_joint',
        'radius/ulner',
        'tibia/fibula',
        'thoratic_inlet',
        'shoulder_joint',
        'sacro_iliac_joint',
        'lumbvar_vertibrae',
        'cervical_vertebrae',
        'thoratic_vertebrae',
        'lumbo_sacral_vertebrae',
        'thoraco_lumbar_vertebrae',
    ];


    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class);
    }
}
