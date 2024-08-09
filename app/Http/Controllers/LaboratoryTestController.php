<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaboratoryTest;
use App\Mail\LaboratoryTestMail;
use Illuminate\Support\Facades\Mail;

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LaboratoryTest $laboratoryTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LaboratoryTest $laboratoryTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaboratoryTest $laboratoryTest)
    {
        //
    }

    public function sendEmail()
    {
        $data = [
            'name' => 'John Doe',
            'test_results' => 'Positive',
            // Add any other data you want to pass to the email
        ];

        Mail::to('peopleoperations@kompletecare.com')->send(new LaboratoryTestMail($data));
    }

}
