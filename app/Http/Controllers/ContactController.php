<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('first_name', 'asc')->paginate(10);
        return view('contacts.index', compact('contacts'));
    }

    public function create(Type $var = null)
    {
        return view('/contacts.create');
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        return view('contacts.show', compact('contact'));
    }
}
