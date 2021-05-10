<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\user;


class userController extends Controller
{
    
    function saveUser(Request $req){
        
        $usr = new user;
        $usr->name= $req->name;
        $usr->email= $req->email;
        $usr->password= Hash::make($req->password);
        $usr->role=$req->role;
        $usr->save();
        return redirect('adm_getUsersResult');
    }

    function showUsers(){
        $msg = user::orderBy('id','asc')->get();
        return view('adm_getUsersResult', ['messages'=>$msg]);
    }

    function deleteUser($id){
        $data=user::find($id);
        $data->delete();
        return redirect('adm_getUsersResult');
    }

    function showIndividualUser($id){

        $data= user::find($id);
        return view('adm_editUsers', ["user_details" => $data]);
    }

    function updateIndividualUser(Request $req){
        $data=user::find($req->id);
        $data->name=$req->name;
        $data->email=$req->email;
        $data->role=$req->role;
        $data->save();
        return redirect('adm_getUsersResult');
        //return $req->input();
    }
}
