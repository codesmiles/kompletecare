<?php

namespace App\Http\Controllers;

use App\Enums\Mocks;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Mail\LaboratoryTestMail;
use App\Http\Resources\LaboratoryTestResource;

class LaboratoryTestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | validate incoming request
        |--------------------------------------------------------------------------
        */
        // $request->validate([
        //     'pelvis' => 'nullable|string',
        //     'thyroid' => 'nullable|string',
        //     'breasts' => 'nullable|string',
        //     'prostate' => 'nullable|string',
        //     'obstetric' => 'nullable|string',
        // ]);

        /*
        |--------------------------------------------------------------------------
        | create patients, and their medical records with their associated xray information and ultrasounding information
        |--------------------------------------------------------------------------
        */
        $patient_created = [];

        /*
        |--------------------------------------------------------------------------
        | send mail of their associated xray information after creation
        |--------------------------------------------------------------------------
        */
        $format_mail = new LaboratoryTestMail($patient_created);
        sendEmail(Mocks::KOMPLETECARE_EMAIL_ADDRESS->value, $format_mail);

        /*
        |--------------------------------------------------------------------------
        | return newly created laboratory test
        |--------------------------------------------------------------------------
        */
        // return LaboratoryTestResource::make($laboratoryTest);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

}
