<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    //
    public function addNews(){
        return view('admin.addnews');
    }

    public function inputNews(Request $req){
        $news = new news();
        $file = $req->file('image');
        $imgname = $req->title.'_'.time().'.'.$file->getClientOriginalExtension();
        $news->judul = $req->title;
        $news->author = $req->author;
        $content = $req->content;
        $textname = time();
        Storage::putFileAs('news_img', $file, $imgname);


    // Menyimpan file dengan nama yang dinamis
        Storage::put("news_text/{$textname}.txt", $content);
        $imgname = 'storage/news_img/'.$imgname;
        $textname = 'storage/news_text/'.$textname.'.txt';
        $news->image = $imgname;
        $news->isi = $textname;
        $news->save();
        return redirect()->back();
    }
}
