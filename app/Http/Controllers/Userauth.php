<?php

namespace App\Http\Controllers;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Http\Request;

class Userauth extends Controller
{
    // 
    function UserLogin(Request $req)
    {
        $email= $req->input('email');
        $password= $req->input('password');
        //$req->session()->put('user',$data['user']);
        // $check=DB::table('users')->where(['email'=>$email,'password'=>$password]);
        $posts=Post::all();

       return view('crud',compact('posts'));
    }    
}
