<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalTest extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
    ];

    public function medicalTestTypes(){
        return $this->hasMany(MedicalTestType::class);
    }
}
