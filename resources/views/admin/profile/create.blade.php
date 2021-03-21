{{-- profile.blade.phpファイルを読み込み --}}
@extends('layouts.profile')


{{-- profile.blade.phpの@yield('title')に'プロフィール'を埋め込む --}}
@section('profile', 'プロフィール')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>自己紹介</h2>
            </div>
        </div>
    </div>
@endsection