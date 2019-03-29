<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/28
 * Time: 22:33
 */

namespace App\Http\Controllers;


class StaticPagesController extends Controller
{
    public function home()
    {
        return view('static_pages.home');
    }
    public function help()
    {
        return view('static_pages.help');
    }
    public function about()
    {
        return view('static_pages.about');
    }
}