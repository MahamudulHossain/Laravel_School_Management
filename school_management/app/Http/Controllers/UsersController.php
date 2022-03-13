<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MultiUser;
class UsersController extends Controller
{
    public function list(){
    	$data = MultiUser::all();
    	return view('admin.users.user_list',compact('data'));
    }
    public function show_form(){
    	return view('admin.users.add_form');
    }
    public function add_form(Request $req){
    	$validated = $req->validate([
        'email' => 'unique:multi_users'
    	]);
    	$code = rand(111111,999999);
    	$data = new MultiUser;
        $data->name = $req->post('name');
        $data->email = $req->post('email');
        $data->usertype = $req->post('usertype');
        $data->code = $code;
        $data->password = md5($code);
        $data->save();
        $req->session()->flash('message','User Added Successfully');
        return redirect('/users_list');
    }
}
