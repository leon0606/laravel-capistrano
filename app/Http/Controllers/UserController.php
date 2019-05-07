<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function setting()
    {
        $user = \Auth::user();
        return view('user.setting', compact('user'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function settingStore(Request $request)
    {
        // 验证
        $this->validate(request(), [
            'name' => 'required|min:3'
        ]);
        // 逻辑
        $name = request('name');
        $user = \Auth::user();
        if($name != $user->name){
            if(User::where('name',$name)->count() > 0){
                return back()->withErrors('姓名已存在');
            }
            $user->name = $name;
        }

        if($request->file('avatar')){
            $path = $request->file('avatar')->storePublicly($user->id);
            $user->avatar = '/storage/'.$path;
        }
        $user->save();
        // 渲染
        return back();
    }
}
