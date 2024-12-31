<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;


class WhatsAppController extends Controller
{
    //public function sendMessage(Request $request)
    public function sendMessage()
    {
        $sid='ACf67a8e06f8237213ecfefbdd2b7a1981';
        $token='bcd652d306dbac8aa20f4bc35d1026e2';
        $twilio=new Client($sid, $token);
        
        $message = $twilio->messages
      ->create("whatsapp:+60197409931", // to 601156536319
        array(
          "from" => "whatsapp:+14155238886",
          "body" => "Ease Queue:1002"
        )
      );
    
   /* sms cost USD0.25
      $message = $twilio->messages
      ->create("+60197409931", // to
        array(
          "from" => "+13613093734",
          "body" => "Ease Queue:12"
        )
      );*/
    //print($message->sid);
    print $message->body;
    }
}
