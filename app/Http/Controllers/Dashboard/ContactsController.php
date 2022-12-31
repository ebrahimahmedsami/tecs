<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactsRequest;
use App\Models\Contact;
use Yajra\DataTables\Facades\DataTables;

class ContactsController extends Controller
{
    public function save_contact_us(ContactsRequest $request){
        Contact::create($request->validated());
        return redirect()->back()->with(['success' => __('home.send_success')]);
    }

    public function contact_us_view(){
        if (\request()->ajax()) {
            $data =Contact::orderBy('id','desc')->get();
            return Datatables::of($data)->make(true);
        }
        return view('dashboard.contact-us.list');
    }

    public function contact_us_delete($id){
        $contactUs = Contact::where('id',$id)->first();
        if ($contactUs)
            $contactUs->delete();
        return back()->with(['success' => __('dashboard.item deleted successfully')]);
    }
}
