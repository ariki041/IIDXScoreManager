<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <style>body {padding-top: 80px;} </style>
        <title>詳細ページ</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="">IIDX ScoreManager</a>
        </nav>

        <table class="table table-striped table-hover">
            <tr>
                <th>バージョン</th><th>タイトル</th><th>ジャンル</th><th>アーティスト</th><th>難易度</th><th>レベル</th><th>ノーツ数</th>
            </tr>
            @foreach ($musics as $music)
                <tr>
                    <td>{{ $music->version }}</td>
                    <td>{{ $music->title }}</td>
                    <td>{{ $music->genre }}</td>
                    <td>{{ $music->artist }}</td>
                    <td>{{ $music->difficulty }}</td>
                    <td>{{ $music->level }}</td>
                    <td>{{ $music->notes }}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>