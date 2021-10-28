<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
// use App\Http\Controllers\validator;

class userController extends Controller
{
    //

   public function create(){
   
    return view('register');

   }

   public function display(){
    $data =  student::get();
    return view('display',['data' => $data]);
 }
 public function store(Request $request){

  $data =   $this->validate($request,[     
       "name"     => "required",
       "email"    => "required|email",
       "password" => "required|min:6"
    ]);


     // student::create(['name' => $request->name , 'password' => $request->password , 'email' => $request->email]);

     // student::create($request->excep(['_token']));
      

     $data['password'] = bcrypt($data['password']);


     $op = student::create($data);

     if($op){
       $message = "Raw Inserted";
     }else{
       $message = "Error Try Again !!!";
     }

      session()->flash('Message',$message);

    return redirect(url('/Create'));

} 




public function edit($id){

$data = student::where('id',$id)->get();

return view('edit',['data' => $data]);

}

 /* public function store(Request $request){

        //  echo $request->email;
        //  echo $request->input('name');
        // dd($request->all());
       // dd($request->except(['_token','password']));
      //  dd($request->only(['name','email']));

        //    dd($request->has('gender'));
            //  echo $request->method();
            // dd($request->isMethod('get'));
        //    echo $request->path();
        // echo $request->url(); 

     
    //     $errors = [];
    //     if(empty($request->name)){
    //         $errors['name'] = "Name required";
    //     }


    //     if(empty($request->email)){
    //         $errors['email'] = "Email required";
    //     }

    //  if(count($errors) > 0){

    //     foreach($errors as $val){
    //         echo $val.'<br>';
    //     }
    //  }else{
    //      echo 'Valid Data';
    //  }

    // $obj = new validator;
    // $obj->validate_inputs();
      //echo 'Post Data';



        /* $this->validate($request,[
           
            "name"     => "required",
            "email"    => "required|email",
            "password" => "required|min:6",
            "address"  =>"required|min:10",
            "gender"   =>"required",
            "linkedinurl" => "required|url
         ]);


           dd('valid Data');

    } */

}