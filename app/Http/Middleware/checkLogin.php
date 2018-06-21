<?php
/**
 * Created by PhpStorm.
 * User: Song
 * Date: 2018/6/19
 * Time: 14:48
 */
namespace App\Http\Middleware;

use Closure;
class checkLogin
{
    /**
     * 检测是否是登陆状态，是则继续，否则跳转到登录
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next)
    {
        if(!session('user'))
        {
            #return view('welcome');
            #return redirect('/');
            return redirect()->back();
        }
        return $next($request);
    }
}