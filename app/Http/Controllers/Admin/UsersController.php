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
use App\Models\Article;
use App\Models\Album;


class UsersController extends Controller
{
    /**
     *   管理员页面
     */ 
    public function Administrators(Request $request)
    {
       
        $user_admin = User::where('Identity',1)->paginate(3);
        return view('admin.users.Administrators',['title'=>'管理员','user_admin'=>$user_admin,'request'=>$request->all()]);
    }
    
    /**
     *   博主页面
     */ 
    public function Blogger(Request $request)
    {
        $Blogger = User::where('Identity',2)->paginate(2);
        return view('admin.users.Blogger',['title'=>'博主','Blogger'=>$Blogger,'request'=>$request->all()]);
    }

    /**
     *   博主个人文章
     */ 
    public function Particle($id)
    {
        $Particle = Article::where('uid',$id)->get();
        return view('admin.users.Particle',['title'=>'个人文章','Particle'=>$Particle]);    
    }

    /**
     *   博主个人相片
     */ 
    public function Palbum($id)
    {

        $Palbum = Album::where('uid',$id)->get();
        return view('admin.users.Palbum',['title'=>'个人文章','Palbum'=>$Palbum]);    
    }

    /**
     *   博主删除个人相片
     */ 
    public function Del($id)
    {
        if (Album::destroy($id)) {
            return back()->with('success','删除成功');
        } else {
            return back()->with('error','删除失败');
        }   
    }

    /**
     *   普通用户页面
     *
     */ 
    public function OrdinaryUser(Request $request)
    {
        $OrdinaryUser = User::where('Identity',3)->paginate(3);
        return view('admin.users.OrdinaryUser',['title'=>'普通用户','OrdinaryUser'=>$OrdinaryUser,'request'=>$request->all()]);
    }

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
      if ($res1 && $res2) {
        // 提交事务   
        DB::commit();
        if ($user->Identity == 1) {
            return redirect('/admin/users/Administrators')->with('success','添加成功');
        } else if ($user->Identity == 2) {
            return redirect('/admin/users/Blogger')->with('success','添加成功');
        } else {
            return redirect('/admin/users/OrdinaryUser')->with('success','添加成功');
        }
      } else {
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
        //通过id查询用户信息
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
        $user->Identity = $request->input('Identity');
        if(!empty($request->input('upass'))){
            $user->upass = Hash::make($request->input('upass'));   
        }
        $res1 = $user->save();//bool
        //查询详情表ID;
        $UDid = $user->userinfo->id;
        $userdetail = Userdetail::where('id',$UDid)->first();
        // dump($userdetail);
        //头像修改
        if ($request->hasFile('avatar')) {
            $profile = $request -> file('avatar');
            $ext = $profile ->getClientOriginalExtension(); 
            $file_name = str_random('20').'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            // 拼接数据库存放路径
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
            $userdetail->avatar = $profile_path;
        }
        $userdetail->phone = $request->input('phone');
        $userdetail->email = $request->input('email');
        $res2 = $userdetail->save();
        if ($res1 && $res2) {
            // 提交事务   
            DB::commit();
            if ($user->Identity == 1) {
                return redirect('/admin/users/Administrators')->with('success','修改成功');
            } else if ($user->Identity == 2) {
                return redirect('/admin/users/Blogger')->with('success','修改成功');
            } else {
                return redirect('/admin/users/OrdinaryUser')->with('success','修改成功');
            }
        } else {
            // 回滚事务  
            DB::rollBack();
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
        // 开启事务  
        DB::beginTransaction();
        // 查询用户身份进行保存
        $user = User::find($id);
        $Identity = $user->Identity;
        // 执行删除
        $res1 = User::destroy($id);
        $res2 = Userdetail::where('uid',$id)->delete();
        if ($res1 && $res2) {
            // 提交事务   
            DB::commit();
            if ($Identity == 1) {
                return redirect('/admin/users/Administrators')->with('success','删除成功');
            } else if ($Identity == 2) {
                return redirect('/admin/users/Blogger')->with('success','删除成功');
            } else {
                return redirect('/admin/users/OrdinaryUser')->with('success','删除成功');
            }
        } else {
        // 回滚事务  
            DB::rollBack();
            return back()->with('error','删除失败');
        }
    }
}
