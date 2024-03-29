<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }

    public function show($id)
    {
        $contacts = Contact::find($id);
        return view('admin.contact.show',compact('contacts'));
    }

    public function destroy($id)
    {
        Contact::find($id)->delete();
        Toastr::success('Contact message successfully deleted.','Success',["positionClass"=>"toast-top-right"]);

        return redirect()->back();
    }
}
