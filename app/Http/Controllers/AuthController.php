<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
// use Illumintae\SUpport
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $req){
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password])){

            // if($req->remember){
            //     Cookie::queue('remember_token', Auth::user()->getRememberToken(), 100);
            // }

            // Session::put('user_data', Auth::user());

            return redirect('/');
        }
        return redirect()->back()->withErrors(['error' => 'invalid Credentials']);
    }

    public function logout(){
        Auth::logout();
        // $news = DB::table('News')->simplePaginate(15);
        // return view('layout.navbar', compact('news'));
        return redirect('/');
    }

    public function test(){
        $news = DB::table('News')->simplePaginate(15);
        return view('layout.cnavbar', compact('news'));
    }

    public function register(){
        return view('register');
    }

    public function regist(Request $req){
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->role = 'customer';
        $user->save();
        return redirect('/login');
    }
}
