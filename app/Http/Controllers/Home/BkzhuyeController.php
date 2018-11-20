<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Album;
use App\Models\Fans;
use App\User;

class BkzhuyeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function index($id)
    {
        // 博主的文章
        $article = Article::where('uid',$id)->orderBy('created_at','desc')->paginate(4);
        // 优秀文章
        $path = Article::where('uid',$id)->orderBy('updated_at','desc')->paginate(13);
        // 博主信息
        $user = User::find($id);
        return view('home.bkzhuye.index',['article'=>$article,'path'=>$path,'id'=>$id,'user'=>$user]);
    }
    /**
     * 博主相片
     *
     */
    public function myalbum($id)
    {
        // 博主的相片
        $album = Album::orderBy('created_at','desc')->paginate(4);
        // 优秀文章
        $path = Article::where('uid',$id)->orderBy('updated_at','desc')->paginate(13);
        return view('home.bkzhuye.myalbum',['album'=>$album,'path'=>$path,'id'=>$id]);
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
