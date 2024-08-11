<?php

namespace Database\Seeders;

use App\Enums\Mocks;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*
        |--------------------------------------------------------------------------
        | Seed the medical test and medical test type
        |--------------------------------------------------------------------------
        */
        $this->call([
            MedicalTestSeeder::class,
            MedicalTestTypeSeeder::class,
        ]);

        /*
        |--------------------------------------------------------------------------
        | seed user
        |--------------------------------------------------------------------------
        */
        $user = User::factory()->create([
            "name" => Mocks::USER_NAME->value,
            'email' =>  Mocks::USER_EMAIL->value,
            'password' => Hash::make(Mocks::USER_PASSWORD->value),
        ]);

        /*
        |--------------------------------------------------------------------------
        | Create a Medical Record
        |--------------------------------------------------------------------------
        */
        $medicalRecord = $user->medicalRecord()->create([
            'name' => 'x-ray',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Create Medical Record Types and Details
        |--------------------------------------------------------------------------
        */
        $headType = $medicalRecord->medicalRecordTypes()->create(['name' => 'Head']);
        $brainType = $medicalRecord->medicalRecordTypes()->create(['name' => 'Brain']);

        $headType->medicalRecordDetail()->create([
            'description' => 'Head MRI details here'
        ]);

        $brainType->medicalRecordDetail()->create([
            'description' => 'Brain MRI details here'
        ]);
    }
}
