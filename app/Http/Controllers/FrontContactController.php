<?php

namespace App\Http\Controllers;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;

class FrontContactController extends Controller
{
    public function __invoke (ContactRequest $request){
        Mail::to('lhdez.gaby@gmail.com')->send(new ContactMail($request->name,$request->email,$request->body));
        return redirect()->back();
    }
}
