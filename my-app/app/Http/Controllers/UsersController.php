<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
     // Hendle request ajax login
    public function index()
    {
        return view("login");
    }

    // Hendle request ajax view form blde template
    public function register()
    {
        return view("register");
    }

    
    // Hendle request ajax login
    public function loginUser(Request $request)
    {
        $vallidator = Validator::make($request->all(),[
            'email'=> 'required|email|max:100',
            'password' => 'required|min:8|max:50',
        ]);

        if($vallidator->fails()){
            return response()->json([
                    'status'=>400,
                    'message'=> $vallidator->getMessageBag()
            ]);

        }else{
            $user = Users::where('email', $request->email)->first();
            if($user){
                if(Hash::check($request->password, $user->password)){
                    $request->session()->put('loggedInUser', $user->id);
                    return response()->json([
                        'status'=>200,
                        'message'=> 'Success'
                    ]);
                }else{
                    return response()->json([
                        'status'=>401,
                        'message'=> 'E-mail or password is incorrect!'
                    ]);
                }
            }else{
                return response()->json([
                    'status'=>401,
                    'message'=> 'User not found!'
                ]);
            }
            
        }   
    }
   

    // Hendle request ajax save users request
    public function saveUser(Request $request)
    {
        $vallidator = Validator::make($request->all(),[
            'email'=> 'required|email|unique:users|max:100',
            'password' => 'required|min:8|max:50',
            'cpassword' => 'required|min:8|same:password'

        ],[
            'cpassword.same'=>'Password did not matched!',
            'cpassword.required'=>'Confirm password is required!'
        ]);
        if($vallidator->fails()){
            return response()->json([
                    'status'=>400,
                    'message'=> $vallidator->getMessageBag()
            ]);

        }else{
            $user = new Users();
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json([
                'status'=>200,
                'message'=> 'Registered Successfully!'
            ]);
        }

    }



       // Hendle request logout request
    public function logout()
    {
        return "hello logout";
        //
    }

    
}
