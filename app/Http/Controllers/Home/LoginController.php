<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginStoreRequest;
use App\User;
use App\Models\User_details;
use Hash;
use DB;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //用户登录
        return view('home.login.index');
    }
    /**
     *  验证登录信息
     */
    public function yz(Request $request)
    {
        $uname = $request->input('uname');
        $upass = $request->input('upass');
        // 查询数据库用户 
        $user = User::where('uname',$uname)->first();
        $Identity = $user->Identity;
        // 判断密码错误
        if ((!empty($user)) && (Hash::check($upass,$user['upass']))) {
            session(['uname'=>$uname,'Identity'=>$Identity]);
        } else {
            echo "error";
        }
    }
    /**
     *  退出登录
     */
    public function esc(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //用户注册
        return view('home.login.create');
    }

    /**
    * 验证手机号码是否注册
    *
    */
    public function rephone(Request $request)
    {

        $phone = User_details::where('phone',$request->input('phone'))->first();
        if (!empty($phone)) {
            return 'error';
        } else {
            return 'success';
        }
    }

    /**
    * 验证用户名是否注册
    *
    */
    public function reuname(Request $request)
    {
        $uname = User::where('uname',$request->input('uname'))->first();
        if (!empty($uname)) {
            return 'error';
        } else {
            return 'success';
        }
    }

    /**
    * 发送手机短信验证码
    *
    */
    public function sendMobileCode(Request $request)
    {
        // 4位验证码
        $str_code = mt_rand(1000,9999);
        session(['str_code'=>$str_code]);
        // 手机号
        $phone_mobile = $request->input('phone');
        $host = "http://dingxin.market.alicloudapi.com";
        $path = "/dx/sendSms";
        $method = "POST";
        $appcode = "9dbe8d5778ad4e1eb332d6124f83fd71";
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys = 'mobile='.$phone_mobile.'&param=code%3A'.$str_code.'&tpl_id=TP1711063';
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_HEADER, true);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        $data = curl_exec($curl);
        curl_close($curl);
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginStoreRequest $request)
    {
        if ($request->input('code') == session('str_code')) {
            // 开启事务  
            DB::beginTransaction();
            // 获取数据 进行添加
            $user = new USer;
            $user->uname = $request->input('uname');
            $user->Identity = 3;
            $user->upass = Hash::make($request->input('upass'));
            $res1 = $user->save();//bool
            $id=$user->id;//获取最后插入的id号
            $userdetail = new User_details;
            $userdetail->uid = $id;
            $userdetail->phone = $request->input('phone');
            $res2 = $userdetail->save();
            if ($res1 && $res2) {
                // 提交事务   
                DB::commit();
                return redirect('/login')->with('success','添加成功');
            } else {
                // 回滚事务  
                DB::rollBack();
                return back()->with('error','添加失败');
            }
            // 删除session中的验证码
            $request->session()->forget('str_code');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
