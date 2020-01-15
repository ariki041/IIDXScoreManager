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
            <form action="{{url('/search')}}">
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="level">レベル</label>
                    <select id="level" name="level" class="form-control">
                        @foreach($level as $index => $name)
                            <option value="{{ $index }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-7">
                    <label for="version">バージョン</label>
                    <select id ="version" name="version" class="form-control">
                        @foreach($version as $index => $name)
                            <option value="{{ $index }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="title">タイトル</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" >検索</button>
            <button type="button" class="btn">詳細検索</button>
            </form>
        </div>
        <div class="border rounded p-3 my-2">
            <p>csvからインポート</p>
            <form class="form-inline" enctype="multipart/form-data" action="" name="" method="POST">
                <div class="form-group col-md-12">
                    <div class="input-group">
                        <label class="input-group-btn">
                            <span class="btn btn-primary" >
                                参照
                                <input type="file" id="csvFileImport" name="csvFileImport" style="display:none" accept=".csv">
                            </span>
                        </label>
                        <div class="col-8">
                            <input type="text" class="form-control" readonly="">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection