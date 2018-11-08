<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Articleinfo;
use App\Models\Article_pl;
use App\User;
use App\Models\Link;
use App\Models\Topic;
use App\Models\Comment;
use App\Models\Advert;
use App\Models\Notice;
use App\Models\Image;
>>>>>>> origin/ljg
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 文章
        $article = Article::all();
        // 友情链接
        $link = Link::all();
        // 话题
        $topic = Topic::all();
        // 广告
        $advert = Advert::all();
        //轮播图
        $image = Image::all();
        $lbt = count($image);
        // 公告
        $ljg = Notice::orderBy('created_at','desc')->first();
        //首页视图
        return view('home.index.index',['ljg'=>$ljg,'image'=>$image,'lbt'=>$lbt,'article'=>$article,'link'=>$link,'topic'=>$topic,'advert'=>$advert]);
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
        $article = Article::find($id);
        // 文章评论
         $article_pl = Article_pl::where('aid',$id)->get();
        // dump($article_pl);
        return view('home.article.show',['article'=>$article,'article_pl'=>$article_pl]);
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
