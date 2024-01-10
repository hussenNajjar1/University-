<?php

namespace App\Http\Controllers;
use App\Models\USER_universities;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class universitie_PDF extends Controller
{  public function index()
    {
    return view('pdf/show');
    }
    
    public function store(Request $request)
    {
       
        $PDF=$request->file('file_pdf')->getClientOriginalName();
        $path=$request->file('file_pdf')->storeAs('pdf',$PDF,'PDF');

    $user=1;
        $insert_pdf= new USER_universities();
        $insert_pdf->name=$request->name;
        $insert_pdf->year=$request->year;
        $insert_pdf->Chapter=$request->Chapter;
        $insert_pdf->file_pdf=$PDF;
        $insert_pdf->user_id=$user;
        $insert_pdf->universitie_id=$request->universitie_id;
        $insert_pdf->date_time=$request->date_time;
        $insert_pdf->save();
        return "تم رفع الملف ";



    }
 
    public function create()
    {
        return view('pdf/add_pdf');
    }
    public function show($year,$Chapter)
    {
   
    // $team=coures::with('us_h')->find(1);
   
     //
      $posts=USER_universities::where('universitie_id',1)->where('year',$year)->where('Chapter',$Chapter)->get();
      return view('pdf/pdf',compact('posts'));
   
    }
    
    public function show_m($year,$Chapter)
    {
   
    // $team=coures::with('us_h')->find(1);
   
     //
      $posts=USER_universities::where('universitie_id',2)->where('year',$year)->where('Chapter',$Chapter)->get();
     
       return view('pdf/pdf',compact('posts'));
       
   
    }
}
