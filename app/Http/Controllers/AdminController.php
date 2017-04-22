<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use URL;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    

    public function login()
    {
        if (session()->has('user')) {
            return redirect('admin');
        }
        return view('admin.login');
    }

    public function auth(Request $request)
    {
        if (Auth::attempt(['email' => $request->email ])) {
            // Authentication passed...
            //dd(Auth::check('admin'));
             dd($user = Auth::user());
            $request->session()->put('id', '$user->id');
            $request->session()->put('userName', '$user->name');
             
            //return redirect('admin');
            //dd (Auth::guard('admin')->user());
        }

        return view('admin.login');
    }

    public function signOut()
    {
        session()->forget('id');

        return view('admin.login');
    }

    public function profile()
    {
        $admin = User::find(session()->get('id'));

        return view('admin.account.profile')->with('admin', $admin);
    }

    public function ajax(Request $request)
    {
        if (session()->has($request->id_product)) {
            session()->put('total', $request->number - 1);
            session()->forget($request->id_product);
            echo $request->number - 1;
        } else {
            session()->put('total', $request->number +1);
            session()->put($request->id_product, '1');
            echo $request->number + 1;
        }
    }
}
