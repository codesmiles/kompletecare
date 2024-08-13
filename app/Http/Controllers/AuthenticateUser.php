<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\Mocks;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthenticateUser extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        /*
        |--------------------------------------------------------------------------
        | validating parameters
        |--------------------------------------------------------------------------
        */
        $validator = Validator::make($request->all(), [
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['email', 'max:255', 'unique:users,email', "nullable"],
            'password' => ['string', 'min:8', "nullable"],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "response" => $validator->errors()
            ], 400);
        }

        /*
        |--------------------------------------------------------------------------
        | set variables
        |--------------------------------------------------------------------------
        */
        $create_user_payload = [
            'name' => $request->name ?? Mocks::USER_NAME->value,
            'email' => $request->email ?? Mocks::USER_EMAIL->value,
            'password' => $request->password == null ? Hash::make($request->password) : Hash::make(Mocks::USER_PASSWORD->value),
        ];

        /*
        |--------------------------------------------------------------------------
        | find or create a new user
        |--------------------------------------------------------------------------
        */
        $user = User::firstOrCreate(['email' => $create_user_payload['email']], $create_user_payload);

        /*
        |--------------------------------------------------------------------------
        | Generate a token for the user
        |--------------------------------------------------------------------------
        */
        $token = $user->createToken('API Token')->plainTextToken;

        /*
        |--------------------------------------------------------------------------
        | set payload
        |--------------------------------------------------------------------------
        */
        $response = [
            'token_type' => 'Bearer',
            'access_token' => $token,
        ];

        /*
        |--------------------------------------------------------------------------
        |  Return the token in the response
        |--------------------------------------------------------------------------
        */
        return response()->json([
            "success" => true,
            "response" => $response
        ], 200);
    }

}
