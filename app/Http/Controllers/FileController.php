<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       /* echo "123";
        //return response('')->withCookie('user','xiaoyu',2);
        Cookie::queue("ming","zhi",3);
        session(['name'=>'xyz',"age"=>18,'hobby'=>'买电脑']);*/
        //return response()->json(['name'=>'11','age'=>22]);
        //$arr = ["name"=>'abc','hobby'=>'bbb'];
        //echo json_encode($arr);
        //return response()->download('1.jpg');

        return "iloveyou";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
 /*      $a = $request->cookie("user");
       // var_dump($a);    \ 命名空间 
       $b = Cookie::get('ming');
       $s = session('hobby');   
       session(['aa'=>1,'bb'=>2]);
       $request->session()->pull('bb');
       $all = $request->session()->all();
       dd($all); 
       echo $s;*/
       return view("Admin.File.add");
        //return redirect('/file');
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
        if ($request->hasFile("upup")) {
            //不重复的文件名
            $name = time()+rand(100000,999999);
            //获得图片的后缀
            $hz = $request->file('upup')->getClientOriginalExtension();
            $dirname = date('Y-m-d');
            $path = './upload/'.$dirname.'/';
            $filename = $name.$hz;
            //执行文件上传   Config::('app.fileup');
            $jg = $request->file('upup')->move($path,$filename);
            echo $path.$filename;
            dd($jg);

            //dd($jg->pathname);
        } else {
            echo "没有";
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
