<?php

use Illuminate\Support\Str;
function generateId(): string 
{
   $value = mt_rand(0,100);

    return $value;
}



//  function sendEmail()
//     {
//         $data = [
//             'name' => 'John Doe',
//             'test_results' => 'Positive',
//             // Add any other data you want to pass to the email
//         ];

//         Mail::to('peopleoperations@kompletecare.com')->send(new LaboratoryTestMail($data));
//     }
