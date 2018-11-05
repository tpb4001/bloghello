<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Http\Requests\ImageStoreRequest;
use DB;
class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $showCount = $request->input('showCount',5);
        $search = $request->input('search','');
        // 获取数据
        $image = Image::where('iname','like','%'.$search .'%')->paginate($showCount);
        // 加载到列表页面
        return view('admin.image.index',['image'=>$image,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载模版
        return view('admin.image.create',['image'=>'图片添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 开启事物
        DB::beginTransaction();
        // 判断是否有文件上传
        if($request->hasFile('image')){
            $profile = $request -> file('image');
            $ext = $profile ->getClientOriginalExtension(); //获取文件后缀
            $file_name = str_random('20').'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            // 拼接数据库存放路径
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
        }else{
            return redirect() -> back() -> withInput() -> withErrors('没有图片上传');
        }
        // 获取数据 进行添加
        $image = new Image;
        
        $image->iname = $request->input('iname');
        $image->iurl = $request->input('iurl');
        $image->img = $profile_path;
        $image->status = $request->input('status');
        $res = $image->save(); // bool
        if($res){
            // 提交事务
            DB::commit();
            return redirect('admin/image')->with('success', '添加成功');
        }else{
            // 事务回滚
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Image::find($id);
        return view('admin.image.edit',['image'=>'图片修改','data'=>$data]);
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
        // 开启事物
        DB::beginTransaction();
        
        // 获取数据 进行添加
        $image = Image::find($id);
        $image->iname = $request->input('iname');
        $image->iurl = $request->input('iurl');
        $image->status = $request->input('status');
        // 判断是否有文件上传
        if($request->hasFile('image')){
            $profile = $request -> file('image');
            $ext = $profile ->getClientOriginalExtension(); //获取文件后缀
            $file_name = str_random('20').'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            // 拼接数据库存放路径
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
            $image->img = $profile_path;
        }else{
        	 $image->img = $image->img;
        }
       
        $res = $image->save(); // bool
        
        if($res){
            // 提交事务
            DB::commit();
            return redirect('admin/image')->with('success', '修改成功');
        }else{
            // 事务回滚
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
        if(Image::destroy($id)){
         return redirect('admin/image')->with('success','删除成功');
         }else{
         return back()->with('error','删除失败');
        }
    }
}
