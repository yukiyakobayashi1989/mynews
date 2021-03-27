<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

//php/Laravel 19 課題
use App\Profile;

class ProfileController extends Controller
{
    //php/Laravel 19 課題
    public function index(Request $request)
    {
        $posts = Profile::all()->sortByDesc('update_at');
        
        if(count($posts) > 0) {
            $headline = $posts->shift();
        }else {
            $headline = null;
        }
        //profile/indx.blade.phpにファイルを渡している
        //また　View テンプレートにheasline,posts という変数を渡している
        return view('profile.index', ['headline' => $headline, 'posts' => $posts]);
    }
}
