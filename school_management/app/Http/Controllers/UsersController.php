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
}
