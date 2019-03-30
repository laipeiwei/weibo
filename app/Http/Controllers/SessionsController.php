<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store']
        ]);
        $this->middleware('guest',[
            'only' => ['create'],
        ]);
    }
    public function create()
    {
        return view('sessions.create');
    }
    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);
        if(Auth::attempt($credentials,$request->has('remember'))){
            session()->flash('success','欢迎回来！');
            $callback = route('users.show', [Auth::user()]);
            return redirect()->intended($callback);
        }else{
            session()->flash('danger','账号或密码错误');
            return redirect()->back()->withInput();
        }
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success',"退出登录成功");
        return redirect('login');
    }


}
