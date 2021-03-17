<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;



class MemberController extends Controller
{
    //
    function addData(Request $req){
        // return dd($req->all());
     $member= new User();
     $member->name=$req->name;
     $member->email=$req->email;
     $member->password=$req->password;
    $member->save();
    return view('crud');
    }
}
