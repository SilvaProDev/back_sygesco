<?php

namespace App\Http\Controllers;
use App\Helpers\Sms;
// require 'vendor/autoload.php';
use \Osms\Osms;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\SendSms;
use Exception;

class SendSmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $emailParent = Student::all();

        $data = new SendSms();
        $data->annee_id = $request->annee_id;
        $data->classe_id = $request->classe_id;
        $data->niveau_id = $request->niveau_id;
        $data->date = $request->date;
        $data->message = $request->message;
        $data->save();

        foreach($emailParent as $value) {
            if($value->classe_id == $request->classe_id){

                $basic  = new \Vonage\Client\Credentials\Basic("16bedae6", "NvV7QFuO0CTWWxF5");
                $client = new \Vonage\Client($basic);
    
                $response = $client->sms()->send(
                   new \Vonage\SMS\Message\SMS("2250707761084", SYGESCO, $request->message),
                    
                );
                
                $message = $response->current();
                
                if ($message->getStatus() == 0) {
                    echo "The message was sent successfully\n";
                } else {
                    echo "The message failed with status: " . $message->getStatus() . "\n";
                }

            }
        }


    }

    public function sendSMS(Request $request)
    {
        $emailParent = Student::all();

        $config = array(
            'clientId' => config('app.clientId'),
            'clientSecret' =>  config('app.clientSecret'),
        );

        $osms = new Sms($config);

        $data = $osms->getTokenFromConsumerKey();
        $token = array(
            'token' => $data['access_token']
        );

        foreach($emailParent as $value) {
            if($value->classe_id == $request->classe_id){

                $response = $osms->sendSms(
                // sender
                    'tel:+224620000000',
                    'tel:+225' . $value->contact_pere,
                    // message
                    $request->message,
                    
                    'Devscom'
                );     // receiver
               
            }
        }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updates(Request $request)
    {
        //

        $config = array(
            'clientId' => config('app.clientId'),
            'clientSecret' =>  config('app.clientSecret'),
        );

        // $osms = new Sms($config);

        $data = $osms->getTokenFromConsumerKey();
        $token = array(
            'token' => $data['access_token']
        );
        
        $osms = new Sms($config);
        
        $senderAddress = '0700000000';
        $receiverAddress = '0546134701';
        $message = 'Hello World!';
        $senderName = 'Optimus Prime';
        
       $response= $osms->sendSms($senderAddress, $receiverAddress, $message, $senderName);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
