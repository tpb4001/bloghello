<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinksStoreRequest;
use App\Models\Link;
use DB;
class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $link = Link::all();
        return view('admin.links.index',['title'=>'链接详情','link'=>$link]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.links.create',['title'=>'友情链接添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinksStoreRequest $request)
    {
        //
        $link = new link;
        $link->lname = $request->input('lname','');
        $link->url = $request->input('url','');
        $link->status = $request->input('status',1);
        if ($link->save()) {
            return redirect('/admin/link')->with('success','添加成功');
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
        //
          $data = Link::find($id);
          return view('admin.links.edit',['title'=>'链接修改','data'=>$data]);
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
        

        // 获取数据 进行修改
        $link = Link::find($id);
        $link->lname = $request->input('lname');
        $link->url = $request->input('url');
        $link->status = $request->input('status');
        if ($link->save()) {
            return redirect('/admin/link')->with('success','修改成功');
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
        //

        if (Link::destroy($id)) {
            return redirect('admin/link')->with('success','删除成功');
        } else {

            return back()->with('error','删除失败');
        }
    }
}
