<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;

//php/Laravel 17課題
use App\Profilehistories;
use Carbon\Carbon;

class ProfileController extends Controller
{
    //以下を追記
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $requst)
    {
        
        //以下を追記
        //Varidationを行う
        $this->validate($requst,Profile::$rules);
        
        $profile = new Profile;
        $form = $requst->all();
        
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        
        // データベースに保存する
        $profile->fill($form);
        $profile->save();
        
        return redirect('admin/profile/create');
    }
    
    public function edit(Request $requst)
    {   
        //profile modelからデータを取得する
        $profile = Profile::find($requst->id);
        if (empty($profile)) {
          abort(404);
        }  
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    
    public function update(Request $request)
    {
        //php/laranel課題16　validationをかける
        $this->validate($request, Profile::$rules);
        //Profile　Modelからデータを取得する
        $profile = Profile::find($request->id);
        //送信されてきたフォームデータを格納する
        $profile_form = $request->all();
        unset($profile_form['_token']);
        unset($profile_form['remove']);
        
        //該当するデータを上書きして保存する
        $profile->fill($profile_form)->save();
        
        //php/Laravel 17課題、以下を追記
        $history = new Profilehistories;
        $history->profile_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect('admin/profile/create');
    }
    
    //php/Laravel 課題16、削除action
    public function delete(Request $request)
  {
      // 該当するprofile Modelを取得
      $profile = Profile::find($request->id);
      // 削除する
      $profile->delete();
      return redirect('admin/profile/');
  }  
}


