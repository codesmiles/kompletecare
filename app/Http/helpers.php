<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;

/*
|--------------------------------------------------------------------------
| send email laboratoryTest Email
|--------------------------------------------------------------------------
*/
function sendEmail(string $email, Mailable $mailable_instance): void
{
    try {
        Mail::to($email)->send($mailable_instance);
    } catch (\Exception $e) {
        Log::error('Failed to send email: ' . $e->getMessage());
    }
}
