<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;

class sendEmail extends Mailable
{
    use Queueable, SerializesModels;

    // public $sujet;
    public $tableau;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tableau)
    {
        //
        $this->tableau = $tableau;
        // $this->message = $message;
        // $this->fichier = $fichier;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    { 
      

        if($this->tableau['fileUrl'] =='vide'){

        return $this->from('sygesco001@gmail.com')
                    ->view('email.emailparent')->subject($this->tableau['sujet'])
                    ->with(['msge'=>$this->tableau['message'], "suje"=>$this->tableau['sujet']]);
        }else{
            return $this->from('sygesco001@gmail.com')
            ->view('email.emailparent')->subject($this->tableau['sujet'])
            ->with(['msge'=>$this->tableau['message'], "suje"=>$this->tableau['sujet']])
            ->attach(public_path('/public/fichier/'.$this->tableau['nom']),  [
                'as' => $this->tableau['fichier']->getClientOriginalName(),
                'mime' => 'application/pdf']);
            
        }
    }
}
