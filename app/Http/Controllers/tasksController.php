<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasks;

class tasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data  = Tasks::get();  //el mafrod hena ygib el tasks bta3t el user dah bas
     
        return view('tasks.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  $this->validate($request,[
            "title"     => "required",
            "description"    => "required|min:50",
            "start_date" => "required",
            "end_date" =>"required",
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
          $imageName = time().'.'.request()->$data['image']->getClientOriginalExtension();
         request()->$data['image']->move(public_path('uploads'), $imageName);
         $user_id=auth('user')->user()->id;

       # Store Data ...  
         $op = Tasks::create(['title' => $data['title'],
         'description' => $data['description'],
         'start_date' => $data['start_date'],
         'end_date' => $data['end_date'],
         'image' => $imageName,
         'user_id'=> $user_id,
        ]);
   
         if($op){
             $message = "Data Inserted";
         }else{
             $message = "Error Try Again!!";
         }
   
       # Set Message To Session .... 
       session()->flash('Message',$message);
       
       return redirect(url('/users/index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         # Fetch task Data ... 
       $data = Tasks::where('id',$id)->get();

       return view('tasks.edit');
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
        $data =  $this->validate($request,[
            "title"     => "required",
            "description"    => "required|min:50",
            "start_date" => "required",
            "end_date" =>"required",
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
          $imageName = time().'.'.request()->$data['image']->getClientOriginalExtension();
         request()->$data['image']->move(public_path('uploads'), $imageName);
         $op =  Tasks::where('id',$id)->update($data);

         if($op){
             $message = "Raw updated";
         }else{
             $message = "Error Try Again!!";
         }

         session()->flash('Message',$message);

         return redirect(url('/users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $op = Tasks::where('id',$id)->delete();

        if($op){
            $message = " Raw Removed";
        }else{
            $message = "Error Try Again !!!";
        }

        session()->flash('Message',$message);
       
        return back();
    }
}
