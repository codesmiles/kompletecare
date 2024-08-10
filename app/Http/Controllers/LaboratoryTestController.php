<?php

namespace App\Http\Controllers;

use App\Enums\Mocks;
use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use App\Mail\LaboratoryTestMail;
use App\Models\MedicalRecordType;
use Illuminate\Support\Facades\Validator;

class LaboratoryTestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | set payload
        |--------------------------------------------------------------------------
        */
        $response = request()->user()->medicalRecord()->with('medicalRecordTypes.medicalRecordDetail')->get();

        /*
        |--------------------------------------------------------------------------
        | return medical records and their tests
        |--------------------------------------------------------------------------
        */
        return response()->json([
            "success" => true,
            "response" => $response
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | validate request
        |--------------------------------------------------------------------------
        */
        $validator = Validator::make($request->all(), [
            'record_name' => 'required|string',
            'types' => 'required|array',
            'types.*.name' => 'required|string',
            'types.*.details' => 'required|array',
            'types.*.details.*.description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "response" => $validator->errors()
            ], 400);
        }

        /*
        |--------------------------------------------------------------------------
        | create array of medical record and their relationship
        |--------------------------------------------------------------------------
        */
        $medicalRecord = $request->user()->medicalRecord()->create([
            'name' => $request->record_name,
        ]);

        /*
        |--------------------------------------------------------------------------
        | set payload
        |--------------------------------------------------------------------------
        */
        $response_payload = [
            'user_name' => $request->user()->name,
            'medical_record' => [
                'name' => $medicalRecord->name,
                'types' => []
                ]
            ];

        /*
        |--------------------------------------------------------------------------
        | Create Medical Record Types and Details
        |--------------------------------------------------------------------------
        */
        foreach ($request->types as $typeData) {
            $medicalRecordType = $medicalRecord->medicalRecordTypes()->create([
                'name' => $typeData['name'],
            ]);

            $typeDetails = [];
            foreach ($typeData['details'] as $detailData) {
                $medicalRecordType->medicalRecordDetail()->create([
                    'description' => $detailData['description'],
                ]);

                $typeDetails[] = [
                    'description' => $detailData['description'],
                ];
            }

            $response_payload['medical_record']['types'][] = [
                'name' => $medicalRecordType->name,
                'details' => $typeDetails,
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | send mail of their associated xray information after creation
        |--------------------------------------------------------------------------
        */
        $format_mail = new LaboratoryTestMail($response_payload);
        sendEmail(Mocks::KOMPLETECARE_EMAIL_ADDRESS->value, $format_mail);

        /*
        |--------------------------------------------------------------------------
        | send response data
        |--------------------------------------------------------------------------
        */
        return response()->json([
            "success" => true,
            "response" => $response_payload
        ], 200);
    }

}
