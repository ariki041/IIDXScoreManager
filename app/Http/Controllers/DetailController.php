<?php

namespace App\Http\Controllers;

use App\Music;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index()
    {
        $musics = Music::all();

        return view('details/index', ['musics' => $musics]);
    }
}
