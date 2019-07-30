<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //中间件过滤数据的核心   $request 请求   $next 下一步操作 
    public function handle($request, Closure $next)
    {
        //模拟登陆验证的中间件  
        if($request->session()->has('user')){
            //有user 已经登陆了  return $next 继续进行下一步 
            return $next($request);
        }else{
            // 没有session里面的user  跳回登陆的页面 
            return redirect("/login");
        }
    }
}
