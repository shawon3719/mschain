<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Contact::orderBy('created_at', 'desc')->get();
            return view('admin.pages.mailbox.inbox', compact('messages'));
    }
    /**
     * Display Inbox in details.
     *
     * @return \Illuminate\Http\Response
     */
    public function read($id)
    {
        $message = Contact::find($id);
        $message->is_seen = 0;
        $message->save();
            return view('admin.pages.mailbox.read', compact('message'));
    }

    public function Send(Request $request)
    {
//        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->date = date("Y-m-d", time());
        $contact->time =  date("h:i a", time());
        $contact->message = $request->message;
        $contact->save();
    }

    public function destroy(Request $request,$id){
        $message = Contact::find($id);
        $message->delete();
        session()->flash('success', 'Message has been Deleted Successfully');
        return redirect()->route('admin.inbox');
    }

}
