<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
    $contacts =Contact::all();
    return view('contacts.index', compact('contacts'));
}
public function edit($id)
    {
        $contact = Contact::find($id);
        $city = City::all();

        return view('contact.edit', compact('contact','city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'from'=>'required',
            'email'=> 'required',
            'message' => 'required',
            
          ]);

          $contact = Contact::find($id);
          $contact->from = $request->get('from');
          $contact->email = $request->get('email');
          $contact->messagee = $request->get('message');
          $contact->save();

          return redirect('/contact')->with('success', 'Contact information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return redirect('/contact')->with('success', 'Contact has been deleted Successfully!');
    }
}