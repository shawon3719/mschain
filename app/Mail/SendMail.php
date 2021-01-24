<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // If Request is Agent Data
        if ($this->data['request'] == "contact_data") {
            //from method for sending email
            //subject method for subject of email
            //view method for location of template email
            //with method for return value with data
            return $this->from($this->data['email'])
                ->subject('Contact from Website')
                ->view('frontend/pages/contactmail')
                ->with('data', $this->data);

        }
//        return $this->view('view.name');
    }
}
