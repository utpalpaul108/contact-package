<?php

namespace Gaurangadas\Contact\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gaurangadas\Contact\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Gaurangadas\Contact\Mail\ContactMailable;

class ContactController extends Controller
{
    public function index(){
        return view('contact::contact');
    }

    public function store(Request $request){
        Mail::to(config('contact.email_send_to'))->send(new ContactMailable($request->name, $request->message));
        Contact::create($request->all());
        return redirect(route('contact'));
    }
}