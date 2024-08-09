<?php

namespace App\Console\Commands\user;

use App\Enums\Mocks;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:authenticate-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to find or create a new user for the database';

    /*
    |--------------------------------------------------------------------------
    |  Query user from the terminal
    |--------------------------------------------------------------------------
    */
    protected function getUserData()
    {
        return [
            'email' => $this->ask('Input your Email:'),
            'password' => $this->secret('Input User Password:'),
        ];
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        /*
        |--------------------------------------------------------------------------
        | terminal request
        |--------------------------------------------------------------------------
        */
        $data = $this->getUserData();

        /*
        |--------------------------------------------------------------------------
        | validating parameters
        |--------------------------------------------------------------------------
        */
        $validator = Validator::make($data, [
            'email' => ['email', 'max:255', 'unique:users,email', "nullable"],
            'password' => [ 'string', 'min:8', "nullable"],
        ]);

        if ($validator->fails()) {
            $this->error('User creation failed due to validation errors:');
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return;
        }

        /*
        |--------------------------------------------------------------------------
        | set variables
        |--------------------------------------------------------------------------
        */
        $create_user_payload = [
            'email' => $data['email'] ?? Mocks::USER_EMAIL->value,
            'password' => $data['password'] == null ? Hash::make($data['password']) : Hash::make(Mocks::USER_PASSWORD->value),
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
        |set payload
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
        $this->info('Retrieving token.....');
        $this->info(json_encode($response));

    }

}
