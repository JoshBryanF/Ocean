<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\News;

class pageController extends Controller
{
    //
    public function index(){
        $news = DB::table('News')->Paginate(5);
        if (auth()->check() && auth()->user()->role === 'customer') {
            return view('customer.home', compact('news'));
        }
        if (auth()->check() && auth()->user()->role === 'admin') {
            return view('customer.home', compact('news'));
        }
        return view('home', compact('news'));
    }

    public function news(){
        $news = DB::table('News')->Paginate(12);
        if (auth()->check() && auth()->user()->role === 'customer') {
            return view('customer.news', compact('news'));
        }
        if (auth()->check() && auth()->user()->role === 'admin') {
            return view('admin.news', compact('news'));
        }
        return view('news', compact('news'));
    }

    public function newsdetail($id){
        // $news = DB::table('News');
        $news = News::findOrFail($id);
        if (auth()->check() && auth()->user()->role === 'customer') {
            return view('customer.newsdetail', compact('news'));
        }
        if (auth()->check() && auth()->user()->role === 'admin') {
            return view('customer.newsdetail', compact('news'));
        }
        return view('newsdetail', compact('news'));
    }

    public function aboutus(){
        if (auth()->check() && auth()->user()->role === 'customer') {
            return view('customer.aboutus');
        }
        if (auth()->check() && auth()->user()->role === 'admin') {
            return view('customer.aboutus');
        }
        return view('aboutus');
    }

    public function donate(){

        $totalAmountCollected = DB::table('donations')->sum('jumlah') ?? 0;
        $goalAmount = 250000000; 
        $percentageCollected = ($totalAmountCollected / $goalAmount) * 100;

        if (auth()->check() && auth()->user()->role === 'customer') {
            return view('customer.donate', compact('totalAmountCollected', 'percentageCollected', 'goalAmount'));
        }
        if (auth()->check() && auth()->user()->role === 'admin') {
            return view('donation', compact('totalAmountCollected', 'percentageCollected', 'goalAmount'));
        }
        return view('donate');
    }

    public function ocean(){
        // $news = DB::table('News')->simplePaginate(15);
        if (auth()->check() && auth()->user()->role === 'customer') {
            return view('customer.ocean');
        }
        if (auth()->check() && auth()->user()->role === 'admin') {
            return view('customer.ocean');
        }
        return view('ocean');
    }

    public function searchnews(Request $req){
        $name = $req->search;
        // News::where('judul', 'like', '%'.$name.'%')->simplePaginate(15);
        $news = DB::table('News')->where('judul', 'like', '%'.$name.'%')->simplePaginate(15);
        if (auth()->check() && auth()->user()->role === 'customer') {
            return view('customer.news', compact('news'));
        }
        if (auth()->check() && auth()->user()->role === 'admin') {
            return view('customer.news', compact('news'));
        }
        return view('news', compact('news'));
    }
}
