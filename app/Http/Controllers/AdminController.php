<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Admin;


class AdminController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            $adminCount = Admin::where(['username'=>$data['username'],'password'=>md5($data['password']),'status'=>1])->count();
            if($adminCount > 0){
                Session::put('adminSession', $data['username']);
                return redirect('/admin/dashboard');
            }else{
                return redirect('/admin')->with('flash_message_error','Tên người dùng hoặc mật khẩu không đúng!');
            }
        }
		return view('admin.admin_login');
    }
    
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function setting(){
        $adminDetails = Admin::where(['username'=>Session::get('adminSession')])->first();
        return view('admin.setting')->with(compact('adminDetails'));
    }

    public function chkPassword(Request $request){
        $data = $request->all();
        $adminCount = Admin::where(['username'=>Session::get('adminSession'),'password'=>md5($data['current_pwd'])])->count();
        if($adminCount == 1){
            echo "true"; die;
        }else {
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request ->all();
            $adminCount = Admin::where(['username'=>Session::get('adminSession'),'password'=>md5($data['current_pwd'])])->count();
            if($adminCount == 1){
                $password = md5($data['new_pwd']);
                Admin::where('username',Session::get('adminSession'))->update(['password'=>$password]);
                return redirect('/admin/setting')->with('flash_message_success','Mật khẩu đã được cập nhật thành công!');
            }else {
                return redirect('/admin/setting')->with('flash_message_error','Mật khẩu hiện tại không đúng');
            }
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/admin')->with('flash_message_success','Đăng xuất thành công!');
    }
    

}
