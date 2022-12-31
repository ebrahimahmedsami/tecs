<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactsRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function save_contact_us(ContactsRequest $request){
        Contact::create($request->validated());
        return redirect()->back()->with(['success' => __('home.send_success')]);
    }
}
