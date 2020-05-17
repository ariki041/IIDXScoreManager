@extends('layouts.app')

@section('content')
    <div class="border rounded p-3">
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
                <div class="btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-outline-normal {{ Request::input('dif_n')==='on' ? 'active' : '' }}">
                        {{ Form::checkbox('dif_n', "on", Request::input('dif_n')==='on' ? 'true' : '') }}NORMAL
                    </label>
                    <label class="btn btn-outline-hyper {{ Request::input('dif_h')==='on' ? 'active' : '' }}">
                        {{ Form::checkbox('dif_h', "on", Request::input('dif_h')==='on' ? 'true' : '') }}HYPER
                    </label>
                    <label class="btn btn-outline-another {{ Request::input('dif_a')==='on' ? 'active' : '' }}">
                        {{ Form::checkbox('dif_a', "on", Request::input('dif_a')==='on' ? 'true' : '') }}ANOTHER
                    </label>
                    <label class="btn btn-outline-leggendaria {{ Request::input('dif_l')==='on' ? 'active' : '' }}">
                        {{ Form::checkbox('dif_l', "on", Request::input('dif_l')==='on' ? 'true' : '') }}LEGGENDARIA
                    </label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" >検索</button>
        {{ Form::close() }}
    </div>
    
    <div class="mt-4">
        <div>
            @if($music->total()==0)
                <h4>検索結果なし</h4>
            @else
                <h5>{{ $music->total() }}件中 {{ ($music->currentPage()-1) * $music->perPage() + 1}}～{{ ($music->currentPage()-1) * $music->perPage() + $music->count() }}件表示</h5>
            @endif
        </div>
        <div>
            {{ $music->appends($pagination_params)->links() }}
        </div>
    </div>

    @if($music->total()!=0)
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
                    <th><a href="{{ route('mypage.music', ['id' => $value['music_id']]) }}">{{ $value['title'] }}</a></th>
                    <th class="tbl-music-dif-{{ $value['difficulty'] }}">{{ $difficulty[$value['difficulty']] }}</th>
                    <th>{{ $value['artist'] }}</th>
                    <th> </th>
                    <th> </th>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
@endsection