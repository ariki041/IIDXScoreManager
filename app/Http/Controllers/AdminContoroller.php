<?php

namespace App\Http\Controllers;

use App\Music;
use Illuminate\Http\Request;

class AdminContoroller extends Controller
{
    public function index() {
        $level = config('search.level');
        $version = config('search.version');

        return view('/admin/index', compact('level', 'version'));
    }

    //****************************************
    //  検索処理
    //****************************************
    public function search(Request $request)
    {
        // search.phpから取得
        $level = config('search.level');
        $version = config('search.version');
        $difficulty = config('search.difficulty');

        // INNER JOIN `music_lists` ON `musics`.`music_id` = `music_lists`.`id`
        $query = Music::query()->join('music_lists', 'musics.music_id', '=', 'music_lists.id');

        // レベル、バージョン WHERE句設定
        foreach($request->only(['level', 'version']) as $key => $value)
        {
            if($value!='')
            {
                $query->where($key, '=', ''.$value.'');
            }
        }

        // タイトル WHERE句設定
        foreach($request->only('title') as $key => $value)
        {
            if($value!='')
            {
                $query->where($key, 'like', '%'.$value.'%');
            }
        }

        $music = $query->get();

        return view('admin/search', compact('music', 'level', 'version'));
    }
}
