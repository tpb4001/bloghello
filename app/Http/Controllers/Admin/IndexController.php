<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use DB;
use Hash;
use App\User;
use App\Http\Requests;
use App\Models\Article;
use App\Models\Notice;
use App\Models\Topic;
use App\Models\User_details;
use App\Http\Controllers\Controller;
use App\Providers\AppServiceProvider;
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
        // 文章
        $article = Article::orderBy('created_at','desc')->paginate(5);
        // 公告
        $notice = Notice::orderBy('created_at','desc')->paginate(5);
        // 话题
        $topic = Topic::orderBy('created_at','desc')->paginate(5);
        //加载首页视图
        return view('admin.index.index',['article'=>$article,'notice'=>$notice,'topic'=>$topic]);
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
            //头像修改
            if ($request->hasFile('avatar')) {
                $profile = $request -> file('avatar');
                $ext = $profile ->getClientOriginalExtension(); 
                $file_name = str_random('20').'.'.$ext;
                $dir_name = './uploads/'.date('Ymd',time());
                $res = $profile -> move($dir_name,$file_name);
                // 拼接数据库存放路径
                $profile_path = ltrim($dir_name.'/'.$file_name,'.');
                $User_details->avatar = $profile_path;
            }
            $User_details->phone = $request->input('phone');
            $User_details->email = $request->input('email');
            $User_details->sex = $request->input('sex');
            $User_details->introduce = $request->input('introduce');
            $res1 = $User_details->save();
            $user->Identity = $request->input('Identity');
            $res2 = $user->save();
            if ($res1 && $res2) {
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
