<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tags;
class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $showCount = $request->input('showCount',10);
        $search = $request->input('search','');
        $tags = Tags::where('tname','like','%'.$search.'%')->paginate($showCount);
        // 显示视图
        return view('admin.tags.index',['title'=>'浏览标签','tags'=>$tags,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //显示视图
        return view('admin.tags.create',['title'=>'添加标签']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //将标签添加到数据库
        $tags = new Tags;
        $tags->tname = $request->input('tname','');
        $tags->tagsclass = $request->input('tagsclass','');
        if ($tags->save()) {
            return redirect('/admin/tags')->with('success','添加成功');
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
        $data = Tags::find($id);
        // 加載視圖
        return view('admin.tags.edit',['title'=>'修改标签','data'=>$data]);
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
        //保存修改信息
        $tags = Tags::find($id);
        $tags->tname = $request->input('tname','');
        $tags->tagsclass = $request->input('tagsclass','');
        if ($tags->save()) {
            return redirect('/admin/tags')->with('success','修改成功');
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
        //執行刪除
        if(Tags::destroy($id)) {
            return redirect('/admin/tags')->with('success','删除成功');
        } else {
            return back()->with('error','删除失败');
        }
    }
}
