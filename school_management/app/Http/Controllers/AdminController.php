<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
class AdminController extends Controller
{
    public function admin_login_form(){
    	return view('admin.admin_login');
    }
    public function admin_login(Request $req){
    	$email = $req->post('email');
        $pass = md5($req->post('password'));
        $result = Admin::where('email',$email)->first();
        if($result){
          if ($result->password === $pass) {
            $req->session()->put('ADMIN_LOGIN',true);
            $req->session()->put('ADMIN_ID',$result->id);
            return redirect('dashboard');
          }else{
            $req->session()->flash('error','Please Enter Correct Password');
            return redirect()->back();
          }
        }else{
           $req->session()->flash('error','Please Enter Valid Email Id');
           return redirect()->back();
        }
    }
}
