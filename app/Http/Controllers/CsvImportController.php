<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\MusicAttribute;
use App\Csvimport;

class CsvImportController extends Controller
{
    public function index(Request $request) {

        $validator = $this->validateUploadFile($request);
        
        if($validator->fails() === true) {
            return redirect('mypage')->with('message', $validator->errors()->first('csv_file'));
        }

        //CSVファイルをサーバに保存
        $tmp_csv_file = $request->file('csv_file')->store('csv');
        $fp = fopen(storage_path('app/') . $tmp_csv_file, 'r');


        // INNER JOIN `music_lists` ON `music_attributes`.`music_id` = `music_lists`.`music_id`
        $query = MusicAttribute::query()->join('music_lists', 'music_attributes.music_id', '=', 'music_lists.music_id');
        $query->select('music_id', 'title', 'csv_title', 'difficulty');
        $music = $query->get()->toArray();

        $headers = fgetcsv($fp);

        //NULL文字(?)が先頭についてるので除去
        $headers[0] = substr($headers[0] , 3, strlen($headers[0])-3);

        //CSVヘッダ確認
        $col_name = [];
        foreach($headers as $header) {
            $line = Csvimport::retrieveTestColumnsByValue($header, 'UTF-8');
            if($line === null) {
                fclose($fp);
                Storage::delete($tmp_csv_file);
                return redirect('mypage')->with('message', '登録に失敗しましたCSVファイルのフォーマットを確認してください。');
            }
            $col_name[] = $line;
        }
        
        //CSVファイルから1行ずつ取り出す
        $import_data = [];
        while($tmp_data = fgetcsv($fp)) {
            $import_data[] = array_combine($col_name, $tmp_data);
        }
        fclose($fp);

        $user_id = ['user_id' => Auth::id()]; //ユーザID
        $date = ['updated_at' => now(), 'created_at' => now()];

        foreach($import_data as $key1 => $impdata) {
            foreach($impdata as $key2 => $d) {
                if($d === '---') {
                    $import_data[$key1][$key2] = 0;
                }
            }
            $import_data[$key1] = array_merge($user_id + $date, $import_data[$key1]);
        }

        DB::statement($this->insertOrUpdate($import_data));

        return view('mypage/csvimport');
    }

    //CSVファイルから作成した配列をinsert文に変換
    private function insertOrUpdate(array $rows)
    {
        $table = with(new Csvimport)->getTable();

        $first = reset($rows);

        $columns = implode(
            ',',
            array_map(function ($value) {
                return "$value";
            }, array_keys($first))
        );

        $values = implode(',', array_map(function ($row) {
            return '(' . implode(
                ',',
                array_map(function ($value) {
                    return '"' . str_replace('"', '""', $value) . '"';
                }, $row)
            ) . ')';
        }, $rows));

        $updates = implode(
            ',',
            array_map(function ($value) {
                return "$value = VALUES($value)";
            }, array_keys($first))
        );

        $sql = "INSERT INTO {$table}({$columns}) VALUES {$values} ON DUPLICATE KEY UPDATE {$updates}";

        return $sql;
    }
    
    /**
     * アップロードファイルのバリデート
     */
    private function validateUploadFile(Request $request) {
        return Validator::make($request->all(), [
                'csv_file' => 'required|file|mimetypes:text/plain|mimes:csv,txt',
            ], [
                'csv_file.required' => 'ファイルを選択してください',
                'csv_file.file'     => 'ファイルアップロードに失敗しました',
                'csv_file.mimetypes'=> 'ファイル形式が不正です',
                'csv_file.mimes'    => 'ファイル拡張子が異なります',
            ]
        );
    }
}
