<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Articleinfo;
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
        $article = Article::all();

        return view('admin.articles.index',['title'=>'文章列表','article'=>$article]);
       
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $article = new article;
        // dump( $article->all() );
        // dump($article->articleinfo() );

        // 获取数据 进行添加
        $article = new Article;
        $article->title = $request->input('title');
        $article->auth = $request->input('auth');
        $article->copyform = $request->input('copyform');
        $article->image = $request->input('image');
        $res1 = $article->save();
        $id = $article->id;
        $articleinfo = new Articleinfo;
        $article->tid = $id;
        $articleinfo->article = $request->input('article'); 
        $res2 = $articleinfo->save();

        
      if($res1 && $res2){

         return redirect('admin/articles')->with('success','添加成功');
      }else{

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
        $article = Article::find($id);
        // dump($article);
         return view('admin.articles.show',['title'=>'文章详情','article'=>$article]);
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
