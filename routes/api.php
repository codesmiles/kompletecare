<?php

use App\Http\Controllers\LaboratoryTestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('user')->group(function () {
    Route::post('/submit_lab_test', [LaboratoryTestController::class, 'show']);
    Route::get('/get_lab_tests', []);
});

// TODO: GET-> Lab tests

// TODO POST lab tests
// post request of the lab-test to the database
// mailing service to peopleoperations@kompletecare.com✅
// Mail should include My name at the footer of the submission mail✅
// Endpoint will have an authentication for only authenticated users can access this endpoints✅
// provide the auth token for use by the frontend developer✅

// Patient model
// xray model
// ctScanModel
// medical history


// Bonus if you can implement the 2 endpoints to 1 using lighthouse-php graphql❌
// send the link to this submisstion to peopleoperations@kompletecare.com
// Submission is by email to peopleoperations@kompletecare.com. Specify the endpoints and the bearer auth token to be used for testing in your submission.


/*
|--------------------------------------------------------------------------
| sending mail message
|--------------------------------------------------------------------------
*/
// public function sendWelcomeEmail(array $payload)
// {
//     $userEmail = 'user@example.com'; // Replace with the recipient's email address
//     Mail::to($userEmail)->send(new LaboratoryTestMail());
//     return 'Welcome email sent successfully.';
// }

// public function sendEmail(Request $request)
// {
//     $validated = $request->validate([
//         'emailTopic' => 'required|string',
//         'emailBody' => 'required|string',
//         'senderEmail' => 'required|email',
//     ]);

//     $from = $validated['senderEmail'];
//     $topic = $validated['emailTopic'];
//     // $addresses = EmailListing::all();
//     $receivers = [];
//     $emailContent = $validated['emailBody'];



//     foreach ($addresses as $address) {
//         $this->array_push_assoc($receivers, $address->email, 'Example user ');
//     }

//     $email = new \SendGrid\Mail\Mail();
//     $email->setFrom($from, "alloy");
//     $email->setSubject($topic);
//     $email->addTo("alloyking1@gmail.com", "Example User");
//     $email->addTos($receivers);
//     $email->addContent("text/plain", $emailContent);

//     $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));

//     try {
//         $response = $sendgrid->send($email);
//         return response()->json("Email sent successfully");

//     } catch (Exception $e) {
//         return response()->json('Caught exception: ' . $e->getMessage() . "\n");
//     }

// }
