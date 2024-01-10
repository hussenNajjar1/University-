<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mail;
use App\Models\marks;
use Illuminate\Support\Facades\Redirect;

class Mails extends Controller
{
   
    public function index()
    {
      $Mails =Mail::all();
      return view('Mail/Show_Mail',compact('Mails'));
    }

   
    public function create()
    {
     
    }

    
    public function store(Request $request)
    {
        $insert_Mail=new Mail();
        $insert_Mail->name=$request->name;
        $insert_Mail->email=$request->email;
        $insert_Mail->phone=$request->phone;
        $insert_Mail->text=$request->text;
        $insert_Mail->save();
        return redirect()->route('dashboard');

    
      
    }

    
    public function show(string $id)
    {
        return "showww";
    }

    public function edit(string $id)
    {
       //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy($id)
    {
        

        Mail::destroy($id);
        return redirect()->back();

       
    }

   
}
