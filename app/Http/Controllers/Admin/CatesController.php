<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Cates;
use DB;
class CatesController extends Controller
{   
    /**
    *   分类数据处理
    */
    public static function getCates()
    {
        $cates = Cates::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
        // 统计逗号出现的次数
        foreach ($cates as $k => $v) {
            $n = substr_count($v->path,',');
            $cates[$k]->cname = str_repeat('|----',$n).$v->cname;
        }
        return $cates;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //加载视图
       return view('admin.cates.index',['title'=>'浏览类别','cates'=>self::getCates()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载视图
        return view('admin.cates.create',['title'=>'添加类别','cates'=>self::getCates()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //将分类添加到数据库
        // 获取当前提交的分类是否是顶级分类
        $pid = $request->input('pid',' ');
        if($pid == 0) {
            // 顶级
            $path = 0;
        } else {
            // 获取父级的信息
            $parent_data = Cates::find($pid);
            $path = $parent_data->path.','.$parent_data->id;
        }
        $cates = new Cates;
        $cates->cname = $request->input('cname','');
        $cates->pid = $request->input('pid','');
        $cates->pid = $request->input('pid','');
        $cates->status = $request->input('status',1);
        $cates->path = $path;
        if($cates->save()) {
            return redirect('/admin/cates')->with('success','添加成功');
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
        $data = Cates::find($id);
        //查询子分类
        $child_data = Cates::where('pid',$id)->first();
        if($child_data){
            return back()->with('error','当前分类有子分类,不允许修改');
            exit;
        }
        //加载视图
        return view('admin.cates.edit',['title'=>'添加类别','cates'=>self::getCates(),'data'=>$data]);
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
        $pid = $request->input('pid',' ');
        if($pid == 0) {
            // 顶级
            $path = 0;
        } else {
            // 获取父级的信息
            $parent_data = Cates::find($pid);
            $path = $parent_data->path.','.$parent_data->id;
        }
        $cates = Cates::find($id);
        $cates->cname = $request->input('cname','');
        $cates->pid = $request->input('pid','');
        $cates->pid = $request->input('pid','');
        $cates->status = $request->input('status',1);
        $cates->path = $path;
        if($cates->save()) {
            return redirect('/admin/cates')->with('success','修改成功');
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
        //查询子分类
        $child_data = Cates::where('pid',$id)->first();
        if($child_data){
            return back()->with('error','当前分类有子分类,不允许删除');
            exit;
        }
        // 执行删除
        $res = Cates::destroy($id);
        if($res) {
            return redirect('/admin/cates')->with('success','删除成功');
        } else {
            return back()->with('error','删除失败');
        }
    }
}
