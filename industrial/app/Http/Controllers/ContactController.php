<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Notifications\SendEmailNotification;
use Notification;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.adminContact', [
            'contacts' => Contact::orderBy('updated_at','asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname'=>'required',
            'email' =>'required',
            'message'=>'required'            
        ]);

        Contact::create([
            'fullname'=>$request->fullname,
            'email'=>$request->email,
            'message'=>$request->message
        ]);

        return redirect(route('contact'))->with('message','Your successfully sent');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function sendEmailToContact($id)
    {   
        $contact = Contact::find($id);
        return view('admin.contactMail',compact('contact'));
    }
    public function sendContactEmail(Request $request, $id)
    {
        $contact = Contact::find($id);
        $details = [
                    'greating'=> $request->greating,
                    'firstline'=>$request->firstline,
                    'body'=>$request->body,
                    'button'=>$request->button,
                    'url'=>$request->url,
                    'lastline'=>$request->lastline,
        ];

        Notification::send($contact, new SendEmailNotification($details));
        return redirect()->back();
    }
}
