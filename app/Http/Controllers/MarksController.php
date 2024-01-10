<?php

namespace App\Http\Controllers;

use App\Models\marks;
use Illuminate\Http\Request;

class MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       
        $marks=marks::all();
        return view('marks/search',compact('marks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('marks/add_mark');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $insert_mark = new marks();
        $insert_mark->IDstudent = $request->IDstudent;
        $insert_mark->name = $request->name;
        $insert_mark->MaterialName = $request->MaterialName; 
        $insert_mark->universitie = $request->universitie; 
        $insert_mark->theoretical = $request->theoretical;
        $insert_mark->practical = $request->practical;
        $insert_mark->Total = $request->Total;
        $insert_mark->message = $request->message;
        $insert_mark->save();

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        
            $id = $request->input('id');
         
            $marks=marks::where('IDstudent',$id)->get();
            return view('marks/search',compact('marks'));
    }


    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       
     $edit_mark=marks::find($id);
     return view('marks/edit_mark',compact('edit_mark'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        
        $update_mark =marks::find($id);
        $update_mark->IDstudent = $request->IDstudent;
        $update_mark->name = $request->name;
        $update_mark->MaterialName = $request->MaterialName; 
        $update_mark->universitie = $request->universitie; 
        $update_mark->theoretical = $request->theoretical;
        $update_mark->practical = $request->practical;
        $update_mark->Total = $request->Total;
        $update_mark->message = $request->message;
        $update_mark->save();
        return redirect()->route('search');
        
    }




    public function destroy($id)
    {
        marks::destroy($id);
        return redirect()->back();
    }
}
