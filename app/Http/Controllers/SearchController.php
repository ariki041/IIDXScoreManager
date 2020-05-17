<?php

namespace App\Http\Controllers;

use App\Music;
use App\MusicList;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
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

        // 難易度 WHERE句設定
        $dif = ['2' => 'dif_n', '3' => 'dif_h', '4' => 'dif_a', '5' => 'dif_l'];
        $dif_key = [];

        foreach($request->only(['dif_n', 'dif_h', 'dif_a', 'dif_l']) as $key => $value)
        {
            if($value === 'on')
            {
                $keyIndex = array_search($key, $dif);
                array_push($dif_key, $keyIndex);
            }
        }
        $query->whereIn('difficulty', $dif_key);

        // タイトル WHERE句設定
        foreach($request->only('title') as $key => $value)
        {
            if($value !== '')
            {
                $query->where($key, 'like', '%'.$value.'%');
            }
        }

        // 検索結果パラメータセット
        $get_level = $request->input('level') ?: '';
        $get_version = $request->input('version') ?: '';
        $get_title = $request->input('title') ?: '';
        $get_dif_n = $request->input('dif_n') ? 'on' : '';
        $get_dif_h = $request->input('dif_h') ? 'on' : '';
        $get_dif_a = $request->input('dif_a') ? 'on' : '';
        $get_dif_l = $request->input('dif_l') ? 'on' : '';

        $pagination_params = array(
            'level' => $get_level,
            'version' => $get_version,
            'title' => $get_title,
            'dif_n' => $get_dif_n,
            'dif_h' => $get_dif_h,
            'dif_a' => $get_dif_a,
            'dif_l' => $get_dif_l,
        );

        $music = $query->select('title', 'genre', 'artist', 'difficulty')->paginate(30);

        return view('mypage/search', compact('music', 'level', 'version', 'difficulty', 'pagination_params'));
    }
}
