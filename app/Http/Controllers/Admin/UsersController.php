<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersStoreRequest;
use App\User;
use Hash;
use App\Models\Userdetail;
use DB;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::all();
        return view('admin.users.index',['title'=>'用户列表','user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create',['title'=>'用户添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersStoreRequest $request)
    {
        // 开启事务  
         DB::beginTransaction();

        // 获取数据 进行添加
        $user = new USer;
        $user->uname = $request->input('uname');
        $user->Identity = $request->input('ldentity');
        $user->upass = Hash::make($request->input('upass'));
        $res1 = $user->save();//bool
        $id=$user->id;//获取最后插入的id号
        $userdetail = new Userdetail;
        $userdetail->uid = $id;
        $userdetail->phone = $request->input('phone');
        $userdetail->email = $request->input('email');
      $res2 = $userdetail->save();
      if($res1 && $res2){
        // 提交事务   
         DB::commit();
         return redirect('admin/users')->with('success','添加成功');
      }else{
        // 回滚事务  
         DB::rollBack();
         return back()->with('error','添加失败');
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
        $data = User::find($id);
      

         return view('admin.users.edit',['title'=>'用户修改','data'=>$data]);
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
        // 开启事务  
         DB::beginTransaction();

        // 获取数据 进行修改
        $user = User::find($id);
        $user->uname = $request->input('uname');
        $user->ldentity = $request->input('ldentity');
        $user->upass = Hash::make($request->input('upass'));
        $res1 = $user->save();//bool
        $id=$user->id;//获取最后插入的id号
        $userdetail = new Userdetail;
        $userdetail->uid = $id;
        $userdetail->phone = $request->input('phone');
        $userdetail->email = $request->input('email');
      $res2 = $userdetail->save();
      if($res1 && $res2){
        // 提交事务   
         DB::commit();
         return redirect('admin/users')->with('success','添加成功');
      }else{
        // 回滚事务  
         DB::rollBack();
         return back()->with('error','添加失败');
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
        // 开启事务  
        DB::beginTransaction();
        $res1 = User::destroy($id);
        $res2 = Userdetail::where('uid',$id)->delete();
        if($res1 && $res2){
        // 提交事务   
         DB::commit();
         return redirect('admin/users')->with('success','删除成功');
         }else{
        // 回滚事务  
         DB::rollBack();
         return back()->with('error','删除失败');
      }
    }
}
