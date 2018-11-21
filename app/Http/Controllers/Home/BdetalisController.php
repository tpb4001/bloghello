<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Userdetail;

class BdetalisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //通过Session查询用户信息
        $uname = session('uname');
        $data = User::where('uname',$uname)->first();
        return view('home.bdetalis.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*
    * 头像修改
    *
    */
    public function uploads(Request $request)
    {
        if ($request->hasFile('file')) {
           // 修改用户
            $uname = session('uname');
            $data = User::where('uname',$uname)->first();
            $userdetail = Userdetail::where('uid',$data->id)->first();
            // 上传的头像
            $file = $request -> file('file');
            $ext = $file ->getClientOriginalExtension(); //获取文件后缀
            $file_name = str_random('20').'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $file -> move($dir_name,$file_name);
            // 拼接数据库存放路径
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
            $userdetail->avatar = $profile_path;
            if ($userdetail->save()) {
                $str = [
                    'code'=>0,
                    'msg'=>'上传成功',
                    'data'=>[
                        'src'=>$profile_path,
                    ],
                ];
            } else {
                $str = [
                    'code'=>1,
                    'msg'=>'上传失败',
                    'data'=>[
                        'src'=>$userdetail->avatar,
                    ],
                ];
            }   
        }
        return response()->json($str);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  int  $name
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        //加载密码修改视图
        $data = User::where('uname',$name)->first();
        return view('home.bdetalis.edit',['data'=>$data]);
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
        // 获取数据 进行基本信息修改
        $userdetail = Userdetail::where('uid',$id)->first();
        $userdetail->email = $request->input('email');
        $userdetail->sex = $request->input('sex');
        $userdetail->introduce = $request->input('introduce');
        if ($userdetail->save()) {
            return redirect('/Bdetalis')->with('success','修改成功');
        } else {
            return back()->with('error','修改失败');
        }
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
