<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNewMail; // nome del file mail creato con make:mail
use App\Lead;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guest.home');
    }

    public function contact(){
        return view('guest.contact');
    }

    public function contactSent(Request $request){
        $data = $request->all();
        // dd($data);

        $newLead = new Lead();
        $newLead->fill($data); // because of fillable
        $newLead->save();
        $recipient = env('MAIL_FROM_ADDRESS'); // env permette di accedere alle info di .env 
        Mail::to($recipient)->send(new SendNewMail($newLead));
        // fa il send di una istanza di SendNewMail che recupera la view dalla funzione build
        return redirect()->route('guest.contact')->with('status','email sent');
    }
}
