@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="border rounded p-3 my-2">
            <h3 class="border-bottom">PLAYER DATA</h3>
            <table class="table table-borderless">
                <thead>
                    
                </thead>
                <tbody>
                    <tr><td>DJネーム</td><td>aaaa</td></tr>
                    <tr><td>所属エリア</td><td>bbbb</td></tr>
                    <tr><td>IIDX ID</td><td>cccc</td></tr>
                    <tr><td>最終更新日</td><td>dddd</td></tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="border rounded p-3 my-2">
        {{ Form::open(['url' => 'mypage/search', 'method' => 'GET']) }}
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="level">レベル</label>
                {{Form::select('level', $level, Request::input('level'), ['class' => 'form-control'])}}
            </div>
            <div class="form-group col-md-7">
                <label for="version">バージョン</label>
                {{Form::select('version', $version, Request::input('version'), ['class' => 'form-control'])}}
            </div>
            <div class="form-group col-md-12">
                <label for="title">タイトル</label>
                {{ Form::text('title', Request::input('title'), ['class' => 'form-control']) }}
            </div>
            <div class="form-group col-md-12">
                <label for="difficulty">難易度</label>
                <div class="btn-group-toggle" data-toggle="buttons" name="difficulty">
                    <label class="btn btn-outline-normal {{ Request::input('dif_n')==='on' ? 'active' : '' }}">
                        {{ Form::checkbox('dif_n', "on", Request::input('dif_n')==='on' ? 'true' : '') }}NORMAL
                    </label>
                    <label class="btn btn-outline-hyper {{ Request::input('dif_h')==='on' ? 'active' : '' }}">
                        {{ Form::checkbox('dif_h', "on", Request::input('dif_h')==='on' ? 'true' : '') }}HYPER
                    </label>
                    <label class="btn btn-outline-another active">
                        {{ Form::checkbox('dif_a', "on", true) }}ANOTHER
                    </label>
                    <label class="btn btn-outline-leggendaria active">
                        {{ Form::checkbox('dif_l', "on", true) }}LEGGENDARIA
                    </label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" >検索</button>
        {{ Form::close() }}
    </div>

    <div class="border rounded p-3 my-2">
        {{ Form::open(['url' => 'mypage/csvimport', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
            <div class="form-group">
                <label for="inputFile">CSVファイルのアップロード</label>
                <div class="input-group">
                    <input type="text" class="form-control" readonly="">
                    <label class="input-group-btn">
                        <span class="btn btn-secondary">
                            <input type="file" name="csv_file" style="display:none" accept=".csv">参照
                        </span>
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">アップロード</button>
        {{ Form::close() }}

        @if(Session::has('message'))
        メッセージ：{{ session('message') }}
        @endif
    </div>

</div>
@endsection