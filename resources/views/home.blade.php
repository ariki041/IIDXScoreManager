@extends('layouts.home_temp')

@section('content')
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 order-md-2">
                <div class="card card-body center-block">
                    <h2>beatmania IIDX スコアマネージャ</h2>
    
                    <button type="button" class="btn btn-primary my-4" onclick="location.href='register'">新規登録</button>
                    <button trye="button" class="btn btn-outline-primary my-4" onclick="location.href='login'">ログイン</button>
                </div>
            </div>
    
            <div class="col-md-6 order-md-1 item1">
                <h1>画像どーん</h1>
            </div>
        </div>
    </div>
@endsection