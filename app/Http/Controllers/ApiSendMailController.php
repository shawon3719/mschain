<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Use Validator Class
use Illuminate\Support\Facades\Validator;
//Use Mail Class
use App\Model\Contact;
use Image;
use File;

use Illuminate\Support\Facades\Mail;
//Use Model SendMail
use App\Mail\SendMail;
//Use Exception Class
use Exception;

class ApiSendMailController extends Controller
{
    //Create send_feedback function
    function send_contactdata(Request $request) {

        // $contact = new Contact;
        // $contact->name = $request->name;
        // $contact->email = $request->email;
        // $contact->phone = $request->phone;
        // $contact->message = $request->message;
        // $contact->date = date("Y-m-d", time());
        // $contact->save();
        // $id = $contact->id;
        // $contact_info = Contact::find($id);
        $response['message'] = "";
            $data = array(
                'name' 		=> $request->name,
                'email'		=> $request->email,
                'message'	=> $request->message,
                'phone'     => $request->phone,
                'date'      => date("Y-m-d", time()),
                //Send Request is send_feedback
                'request'	=> 'contact_data'
            );

            //Try to send Email
            try {
                //Send Email with model of email SendEmail and with variable data
                //Change * to Your Email
                Mail::to('shawon3719@gmail.com')->send(new SendMail($data));

                //Check if sending email failure
                if (!Mail::failures()) {
                    //Give response message success if success to send email
                    $response['message'] = "success";
                } else {
                    //Give response message failed if failed to send email
                    $response['message'] = "failed";
                }

            } catch (Exception $e) {
                //Give response message error if failed to send email
                $response['message'] = $e->getMessage();
            }


        //encode json variable response
        echo json_encode($response);

    }
}
