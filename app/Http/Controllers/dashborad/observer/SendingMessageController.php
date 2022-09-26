<?php


namespace App\Http\Controllers\dashborad\observer;
use App\Http\Controllers\Controller;
use NumberFormatter;
use Illuminate\Support\Facades\Mail;
use App\Notifications\PaymentReceived;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use App\Models\profile;
use Nexmo\Laravel\Facade\Nexmo;
class SendingMessageController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function sendSms(Request $request)
    {   
        $profile = profile::select()->first();
        foreach($request->mobilesCitizen as $number) 
        {
                // Nexmo::message()->send([
                //       'to'   => $number,
                //       'from' => 'DBSMazen',
                //       'text' => 'Hello Motaze',
                //   ]);

 

            $basic  = new \Vonage\Client\Credentials\Basic("dc27f7f7", "zxSVqS8FrnISAGdM");
            $client = new \Vonage\Client($basic);


             $client->sms()->send(
                new \Vonage\SMS\Message\SMS( $number, $profile->nameMessage, $profile->contentMessage)
            );
            
             $message = $response->current();
            
            if ($message->getStatus() == 0) 
            {
                    return response()->json(
                        [
                            'status' => true,
                            'alertType'=> '.alertSuccess',
                            'msg'    => 'تم إرسال الرسائل النصيه بنجاح',
                        
                        ]);
            } 
            else
             {
                    return response()->json(
                        [
                            'status' => false,
                            'msg'    => "فشلت عملية إرسال الرسائل: " . $message->getStatus() . "\n",
                            'alertType'=> '.alertError',
                        
                        ]);
            }
    
    //         return response()->json(
    //             [
    //                 'status' => true,
    //                 'msg'    =>  "Message has been sent successfuly",
    //             ]);
    //    }
    }
    //    echo 'Message has been sent successfuly';
       
    }

}