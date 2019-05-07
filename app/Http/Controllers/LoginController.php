<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        if(\Auth::check()){
            return redirect('/posts');
        }
        return view('login.index');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login()
    {
        // 验证
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required|min:5|max:10',
            'is_remember' => 'integer'
        ]);
        // 逻辑
        $user = request(['email','password']);
        $isRemember = (bool) request('is_remember');
        if(\Auth::attempt($user,$isRemember)){
            return redirect('/posts');
        }
        // 渲染
        return \Redirect::back()->withErrors('邮箱或密码错误');
    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/login');
    }
}

