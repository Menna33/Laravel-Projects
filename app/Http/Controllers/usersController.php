<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Tasks;

class usersController extends Controller
{

    public  function __construct(){

        $this->middleware('userCheck',['except' => ['create','store','LoginView','login']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data  = Tasks::get();
     
        return view('users.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.register');
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
            "name"     => "required|min:3",
            "email"    => "required|email",
            "password" => "required|min:6|max:10"
          ]);
   
       # Hash Password 
       $data['password'] = bcrypt($data['password']);
   
       # Store Data ...  
         $op = Users::create($data);
   
         if($op){
             $message = "Data Inserted";
         }else{
             $message = "Error Try Again!!";
         }
   
       # Set Message To Session .... 
       session()->flash('Message',$message);
       
       return redirect(url('/users'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function LoginView(){
       echo "mennnnnnnnnnnnnnnnnnnnnnna";
        return view('users.login');
    }


    public function login(Request $request){
   
       $data = $this->validate($request,[

        "email" => "required|email",
        "password" => "required|min:6"
       ]);


       if(auth()->guard('user')->attempt($data)){

        return redirect(url('/users'));
       }else{

           return redirect(url('/users/Login'));
       }

    }



   public function LogOut(){

    auth()->guard('user')->logout();

    return redirect(url('/users/Login'));
      
   }
}
