<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.login.index');
    }
    /**
     *  后台登录
     */
    public function ACname(Request $request)
    {
        $uname = $request->input('uname');
        $upass = $request->input('upass');
        // 查询数据库用户 
        $user = User::where('uname',$uname)->first();
        // dump($user);
        // 判断密码错误
        if (Hash::check($upass,$user['upass'])) {
            session(['uname'=>$uname]);
        } else {
            echo "error";
        }
    }
    public function esc(Request $request)
    {
        $request->session()->flush();
        return redirect('admin/login');
    }
    
}
