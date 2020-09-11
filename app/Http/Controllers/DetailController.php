<?php

namespace App\Http\Controllers;

use App\MusicAttribute;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index()
    {
        $musics = MusicAttribute::all();

        return view('details/index', ['musics' => $musics]);
    }
}
