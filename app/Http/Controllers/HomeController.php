<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contact;
use App\User;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::where('user_id', Auth::id())->paginate(10);
        return view('home')->with('contacts', $contact);
    }

    public function delete($id)
    {
        $contact =Contact::where('id',$id)->delete();
        return redirect()->route('home');
    }

    function sendEmail($id)
    {
        $contact = Contact::where('id',$id)->get();
        if(isset($contact)){
            Mail::send('emails.email', ['user' => $contact], function ($m) use ($contact) {
                $m->from('hello@app.com', 'Your Application');
    
                $m->to($contact->email, $contact->name)->subject('Your Reminder!');
            });
            return redirect()->route('home');
        }else{
            return redirect()->route('home');
        } 
    }
}
