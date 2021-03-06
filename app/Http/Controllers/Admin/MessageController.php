<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\user;
use App\Models\Message_hf;
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $showCount = $request->input('showCount',3);
        $search = $request->input('search','');
        $message = Message::where('umes','like','%'.$search.'%')->paginate($showCount);
        return view('admin.message.index',['message'=>$message,'request'=>$request->all()]);
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
        $data = Message::find($id);
        $message_hf = Message_hf::where('mid',$id)->get();
        // dump($message_hf);
         return view('admin.message.show',['message_hf'=>$message_hf,'data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        // 获取数据 进行回复
        $message = Message::find($id);
        $message->huifu = $request->input('huifu');
        if($message->save()) {
            return redirect('/admin/message')->with('success','回复成功');
        } else {
            return back()->with('error','回复失败');
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
        if (Message::destroy($id)) {
            return redirect('admin/message')->with('success','删除成功');
        } else {
            return back()->with('error','删除失败');
        }
    }
}
