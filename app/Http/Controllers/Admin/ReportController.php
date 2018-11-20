<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Report;
use DB;
use App\Models\Article;
use App\Models\Articleinfo;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //用户举报列表页
        $report = Report::all();
        return view('admin.report.index',['title'=>'用户举报','report'=>$report]);
        // dump(Report::with('getUser','getB','getT')->get());
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
        //文章详情
        $data = Article::find($id);
        if (!empty($data)) {
            return view('admin.report.show',['data'=>$data]);
        } else {
            return back()->with('error','文章已删除');
        }
        
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除举报
        if (Report::destroy($id)) {
            return redirect('admin/report')->with('success','删除成功');
        } else {
            return back()->with('error','删除失败');
        }
    }

    /**
     * 删除违规文章
     *
     */ 
     public function DelArticle($id)
     {
        // 开启事务  
        DB::beginTransaction();
        $res1 = Article::destroy($id);
        $res2 = Articleinfo::where('aid',$id)->delete();
        if ($res1 && $res2) {
            // 提交事务   
            DB::commit();
            return redirect('admin/report')->with('success','删除成功');
        } else {
            // 回滚事务  
            DB::rollBack();
            return back()->with('error','已经删除');
        }
     }

}
