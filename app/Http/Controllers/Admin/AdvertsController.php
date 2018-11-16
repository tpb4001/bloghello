<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Advert;
class AdvertsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $showCount = $request->input('showCount',2);
        $search = $request->input('search','');
        $advert = Advert::where('aname','like','%'.$search.'%')->paginate($showCount);
        return view('admin.advert.index',['title'=>'浏览广告','advert'=>$advert,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advert.create',['title'=>'广告添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $advert = new Advert;
        $advert->url = $request->input('url');
        $advert->aname = $request->input('aname');
        if($request->hasFile('image')){
            $profile = $request -> file('image');
            $ext = $profile ->getClientOriginalExtension(); //获取文件后缀
            $file_name = str_random('20').'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            // 拼接数据库存放路径
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
            $advert->image = $profile_path;
        }
        if($advert->save()) {
          return redirect('/admin/advert')->with('success','添加成功');
        } else {
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
        $data = Advert::find($id);
        return view('admin.advert.edit',['title'=>'广告修改','data'=>$data]);
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
        $advert = Advert::find($id);
        $advert->url = $request->input('url');
        $advert->aname = $request->input('aname');
        if($request->hasFile('image')){
            $profile = $request -> file('image');
            $ext = $profile ->getClientOriginalExtension(); //获取文件后缀
            $file_name = str_random('20').'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            // 拼接数据库存放路径
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
            $advert->image = $profile_path;
        }
        if($advert->save()) {
          return redirect('/admin/advert')->with('success','修改成功');
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
        if(Advert::destroy($id)){

         return redirect('admin/advert')->with('success','删除成功');
         }else{

         return back()->with('error','删除失败');
        }
    }
}
