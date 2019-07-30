<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Admin;
use Hash;
use Abc;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *X
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Admin::paginate(13);
        return view('Admin.users.index',["data"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        return view("Admin.Users.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //注意
        /*
           修改mysql的配置文件 my.ini
            mode="STRICT_ALL_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_ZERO_DATE,NO_ZERO_IN_DATE,NO_AUTO_CREATE_USER"

                将红色标注的NO_ZERO_DATE,NO_ZERO_IN_DATE,删掉保存重启mysql即可；

         */
        $data = $request->except(["repassword","_token"]);
        $data['password'] = Hash::make($data['password']);
        if(Admin::create($data)){
            return redirect('/users')->with('success',"天九成宫");
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
        //查询出一条信息
        $admininfo = Admin::find($id)->info;
        //dd($admininfo);
        return view('Admin.Users.show',['admininfo'=>$admininfo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //原来 DB::table('admin')->where('id','=',$id)->first(); 
        $data = Admin::find($id);
        return view('Admin.Users.edit',['row'=>$data]);

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
        $data = $request->except(['_token','_method']);
        if(Admin::where('id','=',$id)->update($data)){   
            return redirect('/users')->with('success',"修改成功");
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
        if(Admin::destroy($id)){
            return redirect('/users')->with('success',"删除成功");
        }
    }
    public function getadd($id){
        $data = Admin::find($id)->address;
        return View("Admin.Users.address",['data'=>$data]);
    }
    public function liuliu(){
        abc();
    }
    public function duanxin(Request $request){
        $url = "http://v.juhe.cn/sms/send";
        $phone = $request->input('phone');
        $code = rand(1000,9999);
        session(['code'=>$code]);
        $params = array(
            'key'   => '您申请的ApiKey', //您申请的APPKEY
            'mobile'    => $phone, //接受短信的用户手机号码
            'tpl_id'    => '111', //您申请的短信模板ID，根据实际情况修改
            'tpl_value' =>'#code#='.$code.'&#company#=聚合数据' //您设置的模板变量，根据实际情况修改
        );

        $paramstring = http_build_query($params);
        $content = juheCurl($url, $paramstring);
       // $result = json_decode($content, true);
        if ($result) {
            echo ($content);
        } else {
            //请求异常
        }
    }
    public function pay(Request $request){
        $order = $request->input('order');
        $total = $request->input('total');
        $ordernum = $request->input('ordernum');
        zhifu($order,$ordernum,$price);
    }
    public function useclass(){
        $abc = new Abc;
        $abc->say();
    }
}
