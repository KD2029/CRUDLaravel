<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class NotificationController extends Controller
{
    //
    public function SendSmsNotification(){

        $basic  = new \Vonage\Client\Credentials\Basic("8842e19f", "mIsrxCLbftClH2yT");
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("256775939664", "SupaMealPlanner", 'Yoo it looks like you are gonna be the next best developer the likes this world has not yet seen')
        );
        
        $message = $response->current();
        
        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }
}
