<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusinessContactController extends Controller
{
    public function contact()
    {
        $bussinessContacts = \App\Models\BusinessContact::all();
        return view('superadmin.businesscontactlist')->with(compact('bussinessContacts'));
    }
    public function addcontact()
    {
        return view('superadmin.addbusinesscontact');
    }
    public function storecontact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        \App\Models\BusinessContact::create([
            'name' => $request->name,
        ]);

        return redirect()->route('contact.list')->with('success', 'Business contact added successfully.');
    }

    public function contactDlist()
    {
        $contactDetails = \App\Models\ContactDetail::with('businessContact')->get();
        return view('superadmin.contactdetailslist')->with(compact('contactDetails'));
    }

    public function contactDcreate()
    {
        $businessContacts = \App\Models\BusinessContact::all();
        return view('superadmin.addcontactdetails')->with(compact('businessContacts'));
    }

    public function contactDstore(Request $request)
    {
        $request->validate([
            'business_contact_id' => 'required|exists:business_contacts,id',
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
        ]);

        \App\Models\ContactDetail::create([
            'business_contact_id' => $request->business_contact_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('contact.details.list')->with('success', 'Contact detail added successfully.');
    }
}
