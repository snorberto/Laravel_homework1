<?php

namespace App\Http\Controllers;
use App\Models\user;

class ModelController extends Controller
{

 public function read()
 {
    $users = user::where('id' ,">", 0)->orderBy('name','desc')->get();    
    return view('AdminSite',['users'=>$users]);
 }
}