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

        // タイトル WHERE句設定
        foreach($request->only('title') as $key => $value)
        {
            if($value!='')
            {
                $query->where($key, 'like', '%'.$value.'%');
            }
        }

        // 検索結果パラメータセット
        $get_level = $request->input('level') ?: '';
        $get_version = $request->input('version') ?: '';
        $get_title = $request->input('title') ?: '';

        $pagination_params = array(
            'level' => $get_level,
            'version' => $get_version,
            'title' => $get_title
        );

        $music = $query->select('title', 'genre', 'artist', 'difficulty')->paginate(30);

        return view('search', compact('music', 'level', 'version', 'difficulty', 'pagination_params'));
    }
}
