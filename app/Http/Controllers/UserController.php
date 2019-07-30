<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
//导入表单自动校验类
use App\Http\Requests\AdminUserInsert;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //用户模块的遍历
    public function index(Request $request)
    {   
        $search = $request->input('search');
        $phone = $request->input('phone');
        $row = DB::table('admin')->where('user','like',"%{$search}%")->where('phone','like',"%{$phone}%")->paginate(3);
        
        return view('Admin.User.index',['row'=>$row,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.User.add');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserInsert $request)
    {
        $data = $request->except(['repassword','_token']);
        //密码进行加密操作 哈希加密算法 比md5更加的安全  注意 长度 60 不是 32了 注意数据库的字段长度
        $data['password'] = Hash::make($data['password']);
        //执行添加
        if(DB::table('admin')->insert($data)){
            //跳转的同时 可以带回去一些内容  自动存到 session
            return redirect('/user')->with('success','添加成功');
        }else{
            return back()->with('error',"添加失败");
        }
        //dd($data);
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
        $row = DB::table('admin')->where('id','=',$id)->first();
        return view("Admin.User.edit",['row'=>$row]);
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
        echo $id;
        $data = $request->except(['_token','_method']);
        if(DB::table("admin")->where('id','=',$id)->update($data)){
            return redirect('/user')->with('success','修改成功');
        }else{
            return back()->with('error',"修改失败");
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
        //执行删除
        if(DB::table('admin')->where('id','=',$id)->delete()){
            return redirect('/user')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
    public function ajaxdel(Request $request){
        $id = $request->input('id');
        //执行删除
        if(DB::table('admin')->where('id','=',$id)->delete()){
            echo "1";
        }else{
            echo "2";
        }

    }
}
