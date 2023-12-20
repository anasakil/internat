<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SMSController extends Controller
{
    public function sendSMS(Request $request)
    {
        $infobipApiKey = config('services.infobip.api_key');
        $infobipBaseUrl = config('services.infobip.base_url');

        $client = new Client([
            'base_uri' => $infobipBaseUrl,
            'headers' => [
                'Authorization' => 'App ' . $infobipApiKey,
                'Content-Type' => 'application/json',
            ],
        ]);

        $to = $request->input('to'); // recipient's phone number
        $message = $request->input('message'); // SMS message

        $response = $client->post('/sms/2/text/single', [
            'json' => [
                'from' => 'YourSenderName',
                'to' => $to,
                'text' => $message,
            ],
        ]);

        $responseData = json_decode($response->getBody(), true);

        // Handle the response as needed
        if ($response->getStatusCode() === 200) {
            return response()->json(['status' => 'success', 'message' => 'SMS sent successfully']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Failed to send SMS']);
        }
    }
}
