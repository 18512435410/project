<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //数据库的基本操作  
            //$row = DB::select('select * from stu');
        //得到的内容 数组里面放对象
            //return view('Admin.Db.index',['row'=>$row]);
            //DB::insert("insert into stu(name,age) values('xiaoyu',18)");
            //DB::update("update stu set name='abc' where id=135");
            //DB::delete("delete from stu where id = 135");
            //DB::statement('drop table aa');
        //以上用于应急操作  
        //查询构造器  原来model 连贯操作 
        //获取所有的内容
            $row = DB::table('stu')->get();
            //dd($row);
            //return view('Admin.Db.index',['row'=>$row]);
        //查询一条数据
            $row = DB::table('stu')->where('id',"=","134")->first();
        //查询结果中某一个字段 直接得到字符串
            $row = DB::table('stu')->where('id',"=","134")->value('name');    
        //查询结果中某一列数据
            $row = DB::table('stu')->pluck('name');
        //查询结果中所有的内容 只想得到某几个列
            $row = DB::table('stu')->select('name','age',"hobby as h")->get();
            $arr = array('name'=>'aa',"age"=>11);
        //添加一条数据
            //$row = DB::table('stu')->insert($arr);
        //批量添加
            $arr = array(
                    ['name'=>'bb',"age"=>22],
                    ['name'=>'cc',"age"=>33]
                );
            //$row = DB::table('stu')->insert($arr);
        //获得最后添加进去的那条数据的id
            $arr = array('name'=>'dd',"age"=>44);
            //$row = DB::table('stu')->insertGetId($arr);
        //删除数据 
            $row = DB::table('stu')->where('id','=','142')->delete();
        //修改
            $arr = array('name'=>'山炮',"age"=>'66');
            $row = DB::table('stu')->where('id','=','143')->update($arr);
        //where条件
            $row = DB::table('stu')->where('name','like','%小%')->get();
        // orwhere  where
            $row = DB::table('stu')->where('age','>',"18")->where('sex',"=",'1')->get();
            $row = DB::table('stu')->where('id','=','140')->orwhere('id','=','141')->get();
            $row = DB::table('stu')->whereIn('id',[140,139,18,33,56])->get();
            $row = DB::table('stu')->orderBy('id','desc')->get();
            $row = Db::table('stu')->count();
            $row = DB::select("select * from grade g,stu s where g.id=s.id");
            $row = DB::table('stu')->join('grade',"stu.id",'=','grade.id')->get();
            $row = DB::table('stu')->orderBy('id','desc')->paginate(3);
            $a = 10;
            return view('Admin.Db.index',['row'=>$row,'request'=>$request->all()]);
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
