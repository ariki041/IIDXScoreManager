<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Csvimport extends Model
{
    //
    protected $table = 'csvimports';

    /**
     * CSVヘッダ項目の定義地があれば定義配列のkeyを返す
     * 
     * @param string $header
     * @param string $encoding
     * @return string|null
     */
    public static function retrieveTestColumnsByValue(string $header, string $encoding)
    {
        $list = [
            'version'        => 'バージョン',
            'title'          => 'タイトル',
            'genre'          => 'ジャンル',
            'artist'         => 'アーティスト',
            'number_of_play' => 'プレー回数',
            'b_difficulty'   => 'BEGINNER 難易度',
            'b_ex_score'     => 'BEGINNER EXスコア',
            'b_pgreat'       => 'BEGINNER PGreat',
            'b_great'        => 'BEGINNER Great',
            'b_miss_count'   => 'BEGINNER ミスカウント',
            'b_clear_type'   => 'BEGINNER クリアタイプ',
            'b_dj_level'     => 'BEGINNER DJ LEVEL',
            'n_difficulty'   => 'NORMAL 難易度',
            'n_ex_score'     => 'NORMAL EXスコア',
            'n_pgreat'       => 'NORMAL PGreat',
            'n_great'        => 'NORMAL Great',
            'n_miss_count'   => 'NORMAL ミスカウント',
            'n_clear_type'   => 'NORMAL クリアタイプ',
            'n_dj_level'     => 'NORMAL DJ LEVEL',
            'h_difficulty'   => 'HYPER 難易度',
            'h_ex_score'     => 'HYPER EXスコア',
            'h_pgreat'       => 'HYPER PGreat',
            'h_great'        => 'HYPER Great',
            'h_miss_count'   => 'HYPER ミスカウント',
            'h_clear_type'   => 'HYPER クリアタイプ',
            'h_dj_level'     => 'HYPER DJ LEVEL',
            'a_difficulty'   => 'ANOTHER 難易度',
            'a_ex_score'     => 'ANOTHER EXスコア',
            'a_pgreat'       => 'ANOTHER PGreat',
            'a_great'        => 'ANOTHER Great',
            'a_miss_count'   => 'ANOTHER ミスカウント',
            'a_clear_type'   => 'ANOTHER クリアタイプ',
            'a_dj_level'     => 'ANOTHER DJ LEVEL',
            'l_difficulty'   => 'LEGGENDARIA 難易度',
            'l_ex_score'     => 'LEGGENDARIA EXスコア',
            'l_pgreat'       => 'LEGGENDARIA PGreat',
            'l_great'        => 'LEGGENDARIA Great',
            'l_miss_count'   => 'LEGGENDARIA ミスカウント',
            'l_clear_type'   => 'LEGGENDARIA クリアタイプ',
            'l_dj_level'     => 'LEGGENDARIA DJ LEVEL',
            'last_play_date' => '最終プレー日時'
        ];

        foreach($list as $key => $value) {
            if($header === mb_convert_encoding($value, $encoding)) {
                return $key;
            }
        }

        return null;
    }
}
