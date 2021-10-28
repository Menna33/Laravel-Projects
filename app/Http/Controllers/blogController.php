<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Http\Controllers\validator;

class blogController extends Controller
{
    //
 public function display()
 {
     $data=Blog::get(); //btgeeb kol el data elly fe el table
     dd($data);
     return view ('display',[data,]);
 }
   public function create(){
   
    return view('blog');

   }
  public function store(Request $request){

        $data= $this->validate($request,[
           
            "title"     => "required",
            "content"    => "required|min:50",
            "category" => "required"
         ]);
         $op=blog::create($data);
         if($op)
         {
             $message="Raw inserted";

         }else{
            $message="Error";
         }
          

    } 
    public function edit($id)
    {
        //get the data of that profile
        $data=student::where('id',$id)->get(); 
        return view("edit");
    }
    public function remove($id)
    {

    }
    public function update(Request $request){

        $data= $this->validate($request,[
           
            "title"     => "required",
            "content"    => "required|min:50",
            "category" => "required"
         ]);
         $op=blog::create($data);
         if($op)
         {
             $message="Raw inserted";

         }else{
            $message="Error";
         }
          

    } 

}