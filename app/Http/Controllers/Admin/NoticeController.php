<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Notice;
use App\Http\Requests\NoticeStoreRequest;
class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $showCount = $request->input('showCount',2);
        $search = $request->input('search','');
        $notice = Notice::where('title','like','%'.$search.'%')->paginate($showCount);
        return view('admin.notice.index',['notice'=>$notice,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载模版
        return view('admin.notice.create',['title'=>'公告添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticeStoreRequest $request)
    {
        
        $notice = new Notice;
        $notice->title = $request->input('title','');
        $notice->content = $request->input('content','');
        if ($notice->save()) {
            return redirect('/admin/notice')->with('success','添加成功');
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
        $notice = Notice::find($id);
        // 加载模版
        return view('admin.notice.show',['notice'=>$notice,'title'=>'公告添加']);
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
          $data = Notice::find($id);
          return view('admin.notice.edit',['title'=>'公告修改','data'=>$data]);
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
        $notice = Notice::find($id);
        $notice->title = $request->input('title');
        $notice->content = $request->input('content');
        if($notice->save()) {
            return redirect('/admin/notice')->with('success','修改成功');
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
        if(Notice::destroy($id)){


         return redirect('admin/notice')->with('success','删除成功');
         }else{
         return back()->with('error','删除失败');
        }
    }
}
