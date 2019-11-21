@extends('layouts.app')

@section('content')
    <div class="border rounded p-3">
        {{ Form::open(['url' => '/search', 'method' => 'GET']) }}
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
        </div>
        <button type="submit" class="btn btn-primary" >検索</button>
        <button type="button" class="btn">詳細検索</button>
        {{ Form::close() }}
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>タイトル</th>
                <th>難易度</th>
                <th>アーティスト</th>
                <th>DJランク</th>
                <th>スコア</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($music as $key => $value)
                <tr>
                    <th>{{ $value['title'] }}</th>
                    <th class="tbl-music-dif-{{ $value['difficulty'] }}">{{ $difficulty[$value['difficulty']] }}</th>
                    <th>{{ $value['artist'] }}</th>
                    <th> </th>
                    <th> </th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection