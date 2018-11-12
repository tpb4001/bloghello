 <?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Userdetail;
use DB;
use Hash;
class PdetalisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $uname = session('uname');
        $data = User::where('uname',$uname)->first();
        return view('home.Pdetalis.index',['data'=>$data]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        //
        $data = User::where('uname',$name)->first();
        return view('home.Pdetalis.edit',['data'=>$data]);
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
            // 头像修改
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
            $userdetail->sex = $request->input('sex');
            $userdetail->introduce = $request->input('introduce');
            if ($userdetail->save()) {
                return redirect('Pdetalis')->with('success','修改成功');
            } else {
                return back()->with('error','修改失败');
            } 
    }

    /**
     *  修改密码
     */
    public function Cpass(Request $request)
    {   
        $id = $request->input('id');
        $jupass = $request->input('jupass');
        $upass = $request->input('upass');
        $user = User::where('id',$id)->first();
        $yupass = $user->upass;
        if (Hash::check($jupass, $yupass)) {
            $user->upass = Hash::make($upass);
            echo 'success';
        } else {
            echo 'error';
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
