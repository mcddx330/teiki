<?php

namespace App\Http\Controllers\Front;

use App\Models\Character;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // キャラクター一覧を、5人分ずつページングして取得
        $characters = Character::paginate(5);
        return view('character/list', compact('characters'));
    }

    public function detail($id)
    {
        // Enoからキャラクターを検索
        $character = Character::find($id);
        if (is_null($character)) {
            // データがなければ404エラー
            abort('404');
        }
        return view('character/detail', compact('character'));
    }
}
