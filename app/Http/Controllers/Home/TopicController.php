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
    private $topic;

    public function __construct(Topic $topic)
    {
        $this->topic = $topic;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topic = $this->topic->with('getComment')->get();
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
        if (empty($request->input('content')) || empty($request->input('title'))) {
            return back()->with('error','内容不能为空');
        }
        DB::beginTransaction();
        $uid = User::where('uname',$request->input('uname'))->first()->id;
        $topic = new Topic;
        $topic->title  = $request->input('title');
        $topic->uid  = $uid;
        $topic->content  = $request->input('content'); 
         if($request->hasFile('image')){
            $profile = $request -> file('image');
            $ext = $profile ->getClientOriginalExtension(); //获取文件后缀
            $file_name = str_random('20').'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            // 拼接数据库存放路径
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
            $topic->image = $profile_path;
        }
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
        $topic = Topic::where('id',$id)->first();
        // 话题评论
        $comment = Comment::where('tid',$id)->orderBy('created_at','desc')->get();
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
