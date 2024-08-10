<?php

namespace Database\Seeders;

use App\Models\MedicalRecord;
use Illuminate\Database\Seeder;
use App\Models\MedicalRecordType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MedicalTestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testTypes = [
            'x-ray' => [
                "toes",
                "foot",
                "chest",
                "ankle",
                "femoral",
                "humerus",
                "fingers",
                "hip_joint",
                "knee_joint",
                "elbow_joint",
                "wrist_joint",
                "pelvic_joint",
                "tibia/fibula",
                "radius/vulner",
                "thoratic_inlet",
                "shoulder_joint",
                "sacro_iliac_joint",
                "lumbvar_vertibrae",
                "thoratic_vertebrae",
                "cervical_vertebrae",
                "lumbo_sacral_vertebrae",
                "thoraco_lumbar_vertebrae",
            ],
            'ultrasound_scan' => [
                'pelvis',
                'thyroid',
                'breasts',
                'prostate',
                'obstetric',
                "abdominal",
            ],
        ];

        foreach ($testTypes as $testName => $types) {
            $medicalTest = MedicalRecord::where('name', $testName)->first();

            if ($medicalTest) {
                foreach ($types as $type) {
                    MedicalRecordType::create([
                        'medical_record_id' => $medicalTest->id,
                        'type' => $type,
                    ]);
                }
            }
        }

    }
}
