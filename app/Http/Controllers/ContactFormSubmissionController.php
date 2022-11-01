<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMessage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactFormRequest;

class ContactFormSubmissionController extends Controller
{
    /**
     * Affiche le formulaire de contact.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Envoi un mail à l'administrateur avec le message du formulaire de contact.
     *
     * @param  \App\Http\Requests\ContactFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function create(ContactFormRequest $message)
    {
        Mail::to(config('admin.email'))->queue(new ContactFormMessage($message));
        return redirect()->back()->with('success', 'Merci pour votre message ! Il sera lu dès que possible.');
    }
}
