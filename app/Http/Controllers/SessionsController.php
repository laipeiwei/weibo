<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use think\response\Redirect;

class SessionsController extends Controller
{
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
            return redirect()->route('users.show', [Auth::user()]);
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
