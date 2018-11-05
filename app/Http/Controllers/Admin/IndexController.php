<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\User_details;
use App\Providers\AppServiceProvider;
use DB;
use Hash;
use App\Http\Requests\UpassStoreRequest;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //加载首页视图
        return view('admin.index.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $data = User::find($id);
        //加载个人详情页视图
        return view('admin.index.show',['title'=>'个人详情','data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        // 加载修改密码视图
        return view('admin.index.edit',['title'=>'修改密码','data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpassStoreRequest $request, $id)
    {
        $user = User::find($id);
        // 开启事务   
        DB::beginTransaction();
        //保存修改信息
        if (!empty($request->input('show'))) {
            // 保存个人详情修改信息  
            $User_details = User_details::where('uid',$id)->first();
            $User_details->phone = $request->input('phone');
            $User_details->email = $request->input('email');
            $User_details->sex = $request->input('sex');
            $User_details->introduce = $request->input('introduce');
            $res1 = $User_details->save();
            $user->Identity = $request->input('Identity');
            $res2 = $user->save();
            if($res1 && $res2) {
                // 提交事务   
                DB::commit();
                return redirect('/admin/index')->with('success','修改成功');
            } else {
                // 回滚事务  
                DB::rollBack();
                return back()->with('error','修改失败');
            }
        } else {
            // 修改密码
            $upass = $user->upass;
            $jupass = $request->input('jupass');
            if (Hash::check($jupass,$upass)) {
                $user->upass = Hash::make($request->input('upass'));
                if ($user->save()) {
                    // 提交事务   
                    DB::commit();
                    return redirect('/admin/index')->with('success','修改成功');
                } else {
                    // 回滚事务  
                    DB::rollBack();
                    return back()->with('error','修改失败');
                }
            } else {
                // 回滚事务  
                DB::rollBack();
                return back()->with('error','修改失败');
            }
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
