<?php

// In app/Http/Controllers/TwilioController.php

namespace App\Http\Controllers;

use App\Models\AcceptStudent;
use Illuminate\Http\Request;
use Twilio\Rest\Client;


class TwilioController extends Controller
{
    public function sendSMSToStudent($id)
    {
        $acceptStudent = AcceptStudent::find($id);

        if (!$acceptStudent) {
            return redirect()->back()->with('error', 'Student not found');
        }

        $phoneNumber = $acceptStudent->telephone; // Assuming the column is named 'telephone'

        // Use Twilio API to send SMS using $phoneNumber
        $twilio = new Client(config('twilio.account_sid'), config('twilio.auth_token'));

        try {
            $message = $twilio->messages->create(
                $phoneNumber,
                [
                    'from' => config('twilio.phone_number'),
                    'body' => 'Hello from your school! This is a test SMS.',
                ]
            );

            return redirect()->back()->with('success', 'SMS sent successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send SMS: ' . $e->getMessage());
        }
    }
}

