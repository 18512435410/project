<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserInsert extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //表单授权
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // input  name => 规则 
            // required 不能为空  regex 正则  unique 不能重复: 表名
            "user" => "required|regex:/\w{6,18}/|unique:admin",
            "password"=>"required|regex:/\w{6,18}/",
            "repassword"=>"required|regex:/\w{6,18}/|same:password",
            "email"=>"required|email",
            "phone"=>"required|regex:/\d{11}/"
        ];
    }
    //自定义错误信息 messages  固定名字
    public function messages(){
        return[
            "user.required"=>'用户名不能为空',
            "user.regex"=>"用户名必须是6~18数字字母下划线",
            "user.unique"=>'用户名不能重复',
            "password.required"=>"密码不能为空",
            "password.regex"=>"密码不符合规定",
            "repassword.required"=>"确认密码不能为空",
            "repassword.regex"=>"确认密码不符合规定",
            "repassword.same"=>"密码和确认密码不相同",
            "email.required"=>"邮箱不能为空",
            "email.email"=>"邮箱不符合邮箱规则",
            "phone.required"=>"电话不能为空",
            "phone.regex"=>"电话格式不争取",
        ]; 
    }
}
