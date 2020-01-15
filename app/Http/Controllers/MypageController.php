<?php

namespace App\Http\Controllers;

use App\Music;
use App\MusicList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class MypageController extends Controller
{
    public function index()
    {
        $level = config('search.level');
        $version = config('search.version');

        return view('/mypage', compact('level', 'version'));
    }

    //****************************************
    //  検索処理
    //****************************************
    public function search(Request $request)
    {
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

        return view('search')->with('music', $music);
    }
}
