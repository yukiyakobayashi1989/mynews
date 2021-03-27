<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

//php/Laravel 19.追記
use App\News;

class Newscontroller extends Controller
{
    //
    //php/Laravel 19.追記
    public function index(Request $request)
    {
        $posts = News::all()->sortByDesc('update_at');
        
        if (count($posts) > 0) {
            $headline = $posts->shift();
        }else {
            $headline = null;
        }
        //news/index.blade.php ファイルを渡している
        //また　View　テンプレートにheadline,posts という変数を渡している
        return view('news.index', ['headline' => $headline, 'posts' => $posts]);
    }
}
