<?php


namespace App\Repositories;


use App\User;

class UserRepository
{
    /** @var User */
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register()
    {
        // 校验
        \request()->validate([
            'name' => 'required|string|min:3|unique:users,name',
            'email' =>'required|unique:users,email|email',
            'password' => 'required|min:5|max:10|confirmed'
        ]);
        // 逻辑
        $name = request('name');
        $email = request('email');
        $password = bcrypt(request('password'));
        $user = User::create(compact('name','email','password'));
        return $user;
    }
}