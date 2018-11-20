<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Album;
use App\User;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $album = Album::all();
        return view('home.album.index',['album'=>$album]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('home.album.create');
    }

    /*
    * 相片上传
    *
    */
    public function uploads(Request $request)
    {
        
        if ($request->hasFile('profile')) {
            // 上传用户
            $uname = session('uname');
            $uid = User::where('uname',$uname)->first()->id;
            $album = new Album;
            $album->uid = $uid;
            $profile = $request -> file('profile');
            $ext = $profile ->getClientOriginalExtension(); //获取文件后缀
            $file_name = str_random('20').'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            // 拼接数据库存放路径
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
            $album->image = $profile_path;
            if ($album->save()) {
                $str = [
                    'code'=>0,
                    'msg'=>'上传成功'
                ];
            } else {
                $str = [
                    'code'=>1,
                    'msg'=>'上传失败'
                ];
            }
        }
        
        return response()->json($str);
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
    public function edit($id)
    {
        //
        $album = Album::find($id);
        return view('home.album.edit',['id'=>$id,'album'=>$album]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // 获取要修改的数据
        $id = $request->input('id');
        $album = Album::where('id',$id)->first();
        $album->content = $request->input('data');
        if ($album->save()) {
            session('album','success');
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
        //删除相片
        if (Album::destroy($id)) {
            return redirect('/myalbum')->with('success','删除成功');
        } else {
            return back()->with('error','删除失败');
        }
    }
}
