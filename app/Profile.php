<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
    );
    
    //php/Laravel 17課題、以下を追記
    //Profile Modelに関連付けを行う
    public function profilehistories()
    {
        return $this->hasMany('App\Profilehistories');
    }
}
