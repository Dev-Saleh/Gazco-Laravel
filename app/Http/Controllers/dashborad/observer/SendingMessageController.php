<?php


namespace App\Http\Controllers\dashborad\observer;

use App\Http\Controllers\Controller;



use NumberFormatter;

use Illuminate\Support\Facades\Mail;
use App\Notifications\PaymentReceived;
use Illuminate\Support\Facades\Notification;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
class SendingMessageController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function sendSms(Request $request)
    {
        $basic  = new \Vonage\Client\Credentials\Basic("bbd927f5", "Jr0KNpOnEGjKMgTN");
        $client = new \Vonage\Client($basic);


        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("967734043538", 'Gazco', 'مرحبا مزوني دبة الغاز وصلتك تعال استلمها يكلب')
        );
        
        $message = $response->current();
        
        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
        echo "Message has been sent successfuly";
    }
       
    }

