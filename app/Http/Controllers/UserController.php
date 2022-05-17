<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;//check email & pass match
class UserController extends Controller
{
    public $user;
    function login(Request $req){
        $user= User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password)){
            return "Username or password is not matched";
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }
    function register(Request $req){
        $user = new User;
        $userRegister= User::where(['name'=>$req->name])->first();
        $emailRegister= User::where(['email'=>$req->email])->first();
        if($userRegister){
            return "This username is Already used";
        }
        else if($emailRegister){
            return "This email is Already used";
        }
        else{
            $user->name=$req->name;
            $user->email=$req->email;
            $user->password=Hash::make($req->password);
            $user->save();
            return redirect('/login');
        }
    }
}
