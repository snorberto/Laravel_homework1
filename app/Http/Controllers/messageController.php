<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;

class messageController extends Controller
{
    function save(Request $req){
        
        $msg = new Messages;
        $msg->name= $req->name;
        $msg->email= $req->email;
        $msg->message= $req->comment;
        $msg->save();
        return redirect('Index');
    }

    function showMessages(){
        $msg = Messages::orderBy('created_at','desc')->get();
        return view('adm_messageResult', ['messages'=>$msg]);
    }
}
