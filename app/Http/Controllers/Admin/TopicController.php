<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\Comment;
use App\User;
use DB;
class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topic = Topic::all();
        return view('admin.topic.index',['title'=>'话题列表','topic'=>$topic]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.topic.create',['title'=>'话题添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 开启事务   
        DB::beginTransaction();
        $topic = new Topic;
        $topic->title = $request->input('title');
        $topic->content = $request->input('content');
        $topic->uid  = $request->input('uid');
        if($topic->save()) {
            // 提交事务   
            DB::commit();
            return redirect('/admin/topic')->with('success','修改成功');
        } else {
            // 回滚事务  
            DB::rollBack();
            return back()->with('error','修改失败');
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
        $comment = Comment::where('tid',$id)->get();
        return view('admin.topic.show',['title'=>'评论列表','comment'=>$comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Topic::find($id);
        return view('admin.topic.edit',['title'=>'修改话题','data'=>$data]);
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
        $topic = Topic::find($id);
        $topic->title = $request->input('title');
        $topic->content = $request->input('content');
        if($topic->save()) {
            // 提交事务   
            DB::commit();
            return redirect('/admin/topic')->with('success','修改成功');
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
        // 开启事务  
        DB::beginTransaction();
        $res1 = Topic::destroy($id);
        $res2 = Comment::where('tid',$id)->delete();
        if($res1 && $res2){
        // 提交事务   
         DB::commit();
         return redirect('admin/topic')->with('success','删除成功');
         }else{
        // 回滚事务  
         DB::rollBack();
         return back()->with('error','删除失败');
      }
    }
}
