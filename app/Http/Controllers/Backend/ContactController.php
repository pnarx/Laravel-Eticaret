<?php

namespace App\Http\Controllers\Backend;
use App\Models\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::all();
        return view ('backend.pages.contact.index',compact('contacts'));

    }

    public function edit($id) {
        $contact = Contact::where('id',$id)->firstOrFail();
        return view ('backend.pages.contact.edit',compact('contact'));

    }

    public function update(Request $request , $id) {
        $update = $request->status;
        Contact::where('id',$request->id)->update(['status'=>$update]);

        return back()->withSuccess('Başarıyla Güncellendi');
    }
     /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $contact = Contact::where('id',$request->id)->firstOrFail();


        $contact->delete();
        return response(['error'=>false,'message'=>'Başarıyla Slindi.']);


    }

    public function status(Request $request) {
        $update = $request->statu;
        $updatecheck = $update == "false" ? '0' : '1';

        Contact::where('id', $request->id)->update(['status' => $updatecheck]);
        return response(['error' => false, 'status' => $updatecheck]);
    }




}
