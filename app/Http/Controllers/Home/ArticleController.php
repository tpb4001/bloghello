<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Models\Articleinfo;
use App\Models\Article;
use App\User;
use DB;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $uid = User::where('uname',session('uname'))->first()->id;
        $article = Article::where('uid',$uid)->get();
        return view('home.article.index',['article'=>$article]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获取类别
        $cates = Cates::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
        // 统计逗号出现的次数
        foreach ($cates as $k => $v) {
            $n = substr_count($v->path,',');
            $cates[$k]->cname = str_repeat('|----',$n).$v->cname;
        }
        return view('home.article.create',['cates'=>$cates]);
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
        $uid = User::where('uname',$request->input('uname'))->first()->id;
        $article = new Article;
        $article->title  = $request->input('title');
        $article->uid  = $uid;
        $article->cid  = $request->input('cid');
        $article->auth  = $request->input('auth');
        $article->copyform  = $request->input('copyform');
        $res1 = $article->save();
        $articleinfo = new Articleinfo;
        if($request->hasFile('image')){
            $profile = $request -> file('image');
            $ext = $profile ->getClientOriginalExtension(); //获取文件后缀
            $file_name = str_random('20').'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            // 拼接数据库存放路径
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
            $articleinfo->image = $profile_path;
        }
        $aid = $article->id;
        $articleinfo->aid  = $aid;
        $articleinfo->article  = $request->input('article');
        $res2 = $articleinfo->save();
        if($res1 && $res2) {
            // 提交事务   
            DB::commit();
            return redirect('/detalis/article')->with('success','添加成功');
        } else {
            // 回滚事务  
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
        //获取类别
        $cates = Cates::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
        // 统计逗号出现的次数
        foreach ($cates as $k => $v) {
            $n = substr_count($v->path,',');
            $cates[$k]->cname = str_repeat('|----',$n).$v->cname;
        }
        // 获取要修改的文章的数据
        $data = Article::find($id);
        return view('home.article.edit',['title'=>'文章修改','data'=>$data,'cates'=>$cates]);
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
        // 获取数据 进行修改
        $article = Article::find($id);
        $article->title  = $request->input('title');
        $article->cid  = $request->input('cid');
        $article->auth  = $request->input('auth');
        $article->copyform  = $request->input('copyform');
        $res1 = $article->save();//bool
        $articleinfo = Articleinfo::where('aid',$id)->first();
        if($request->hasFile('image')){
            $profile = $request -> file('image');
            $ext = $profile ->getClientOriginalExtension(); //获取文件后缀
            $file_name = str_random('20').'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            // 拼接数据库存放路径
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
            $articleinfo->image = $profile_path;
        }
        $articleinfo->article = $request->input('article');
        $res2 = $articleinfo->save(); 
        if ($res1 && $res2) {
            // 提交事务   
            DB::commit();
            return redirect('/detalis/article')->with('success','修改成功');
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
        $res1 = Article::destroy($id);
        $res2 = Articleinfo::where('aid',$id)->delete();
        if ($res1 && $res2) {
            // 提交事务   
            DB::commit();
            return redirect('/detalis/article')->with('success','删除成功');
        } else {
            // 回滚事务  
            DB::rollBack();
            return back()->with('error','删除失败');
        }
    }
}
