<?php

namespace Database\Seeders;

use App\Models\MedicalTest;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MedicalTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $medicalTests = [
            'X-Ray',
            'Ultrasound Scan',
        ];

        foreach ($medicalTests as $test) {
            MedicalTest::create(['name' => $test]);
        }
    }
}

