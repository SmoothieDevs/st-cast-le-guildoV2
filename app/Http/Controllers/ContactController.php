<?php

namespace App\Http\Controllers;

use App\Recipient;
use App\Mail\ContactFormMessage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }
    public function send(ContactFormRequest $message)
    {
        // TODO empêcher spam
        Mail::to(config('admin.email'))->queue(new ContactFormMessage($message));

        return redirect()->back()->with('success', 'Merci pour votre message ! Il sera lu dès que possible.');
    }
}
