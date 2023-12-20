<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vonage\Client;
use Vonage\Client\Credentials\Basic;
use Vonage\SMS\Message\SMS;

class VonageController extends Controller
{
    public function sendSms(Request $request)
    {
        dd($request->all());

        $basic  = new Basic("53f660f8", "E5Clo1raeq2WIzuz");
        $client = new Client($basic);
    
        $to = $request->input('to');
        $brandName = 'YOUR_BRAND_NAME'; // Replace with your brand name
        $messageText = 'A text message sent using the Vonage SMS API';
    
        try {
            if (empty($to)) {
                throw new \InvalidArgumentException('Recipient phone number ("to") is empty.');
            }
    
            $response = $client->sms()->send(
                new SMS((string) $to, $brandName, $messageText)
            );
    
            $message = $response->current();
    
            if ($message->getStatus() == 0) {
                return response()->json(['success' => true, 'message' => 'The message was sent successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'The message failed with status: ' . $message->getStatus()]);
            }
            } catch (\Throwable $e) {
                echo 'Error: ' . $e->getMessage();
                }
        
    
}
}
