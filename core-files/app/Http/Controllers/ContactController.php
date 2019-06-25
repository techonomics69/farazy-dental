<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('frontend.contact');
    }

    public function getContacts(){
        $contacts = Contact::orderBy('id','desc')->get();
        return view('admin.contact.index')->with([
            'messages'  => $contacts
        ]);
    }

    public function create(Request $request){
        Contact::create($request->all());
        return response()->json([
            'status'    => true,
            'message'   => 'Thanks you for contacting us. As soon as possible we will response you.'
        ]);
    }
}
