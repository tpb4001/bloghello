<?php

namespace App\Http\Controllers\Home;

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
        // dump($topic);
        return view('home.topic.index',['topic'=>$topic]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.topic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $uid = User::where('uname',$request->input('uname'))->first()->id;
        $topic = new Topic;
        $topic->title  = $request->input('title');
        $topic->uid  = $uid;
        $topic->content  = $request->input('content'); 
        if($topic->save()) {
            // 提交事务   
            DB::commit();
            return redirect('/topic')->with('success','添加成功');
        } else {
            // 回滚事务  
            DB::rollBack();
            return back()->with('error','添加失败');
        }
    }

    /**
     * Display  the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic = Topic::find($id);
        
        

        // 话题评论
        $comment = Comment::where('tid',$id)->orderBy('created_at','desc')->get();
       
        // dump($article_pl);
        return view('home.topic.show',['topic'=>$topic,'comment'=>$comment]);
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
        //
    }
}
