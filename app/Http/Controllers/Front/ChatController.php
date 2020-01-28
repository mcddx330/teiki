<?php

namespace App\Http\Controllers\Front;

use App\Models\Chat;
use App\Models\Character;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use \App\Http\Requests\CharPost;
use \App\Http\Requests\CharResPost;
use Illuminate\Http\Response;

class ChatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return Response
     */
    public function index() {
        $chats = Chat::orderBy('id', 'desc')
            ->paginate(5);

        for ($i = 0; $i < count($chats); $i++) {
            $res_id = $chats[$i]['res_char_id'];
            if (!is_null($res_id)) {
                // 返信先のキャラクター名を取得
                $char = Character::find($res_id);

                // キャラクターが削除されていたら「*削除*」を名前に入れる
                if (is_null($char)) {
                    $res_name = '*削除*';
                } else {
                    $res_name = $char->nickname."({$char->id})";
                }
                $chats[$i]['res_char_name'] = $res_name;

                // ツリーの参加人数・ログインユーザが参加しているかチェック
                $charcters = Chat::where('own_chat_id', $chats[$i]['own_chat_id'])
                        ->groupBy('char_id')
                        ->get(['char_id'])
                        ->toArray();
                for ($j=0; $j<count($charcters); $j++) {
                    $charcters[$j] = $charcters[$j]['char_id'];
                }
                $chats[$i]['tree_char_num'] = count($charcters);
                $chats[$i]['is_tree_join'] = in_array(Auth::user()->id, $charcters);
            } else {
                $chats[$i]['res_char_name'] = null;
                $chats[$i]['tree_char_num'] = 0;
                $chats[$i]['is_tree_join'] = false;
            }
        }
        return view('chat/list', compact('chats'));
    }

    /**
     * @return Response
     */
    public function tree($id)
    {
        $chats = Chat::where('own_chat_id', $id)
            ->orderBy('id', 'dest')
            ->paginate(5);

        for ($i=0; $i < count($chats); $i++) {
            $res_id = $chats[$i]['res_char_id'];
            if (!is_null($res_id)) {
                // 返信先のキャラクター名を取得
                $char = Character::find($res_id);

                // キャラクターが削除されていたら「*削除*」を名前に入れる
                if (is_null($char)) {
                    $res_name = '*削除*';
                } else {
                    $res_name = $char->nickname."({$char->id})";
                }
                $chats[$i]['res_char_name'] = $res_name;
            } else {
                $chats[$i]['res_char_name'] = null;
            }
        }

        // ツリーの参加者を取得
        $charcters = Chat::where('own_chat_id', $id)
                ->groupBy('char_id')
                ->get(['char_id'])
                ->toArray();
        $joins = [];
        for ($i=0; $i<count($charcters); $i++) {
            $char = Character::find($charcters[$i]['char_id']);

            // キャラクターが削除されていたら「*削除*」を名前に入れる
            if (is_null($char)) {
                $joins[] = '*削除*';
            } else {
                $joins[] = $char->nickname;
            }
        }
        return view('chat/tree', compact('chats', 'joins'));
    }

    /**
     * @param CharPost
     *
     * @return Response
     */
    public function postChat(CharPost $request)
    {
        $data = $request->all();

        // @TODO アイコン登録したらここでidから画像パスを引く
        $icon_img = '/img/no_image_icon.png';

        // 発言内容を登録
        $chat = new Chat();
        $chat->fill([
            'own_chat_id' => 0,
            'char_id'     => Auth::user()->id,
            'name'        => $data['chat']['name'],
            'icon_img'    => $icon_img,
            'chat_txt'    => $data['chat']['chat_txt'],
        ]);
        $chat->save();

        // 自分のIDをオーナーに設定し直し
        $chat->own_chat_id = $chat->id;
        $chat->save();

        // 一覧画面へリダイレクト
        return redirect(route('chat.list'));
    }

    /**
     * @param CharResPost
     * @return Response
     */
    public function postRes(CharResPost $request)
    {
        $data = $request->all();

        // @TODO アイコン登録したらここでidから画像パスを引く
        $icon_img = '/img/no_image_icon.png';

        // 返信先のデータ取得（論理削除されたデータも取得）
        $res = Chat::where('id', $data['res']['res_id'])
                ->withTrashed()
                ->first();

        // 返信先のデータがなければ一覧画面へリダイレクト
        if (is_null($res)) {
            return redirect(route('chat.list'));
        }

        // 発言内容を登録
        $chat = new Chat();
        $chat->fill([
            'own_chat_id' => $res->own_chat_id,
            'res_chat_id' => $res->id,
            'res_char_id' => $res->char_id,
            'char_id'     => Auth::user()->id,
            'name'        => $data['res']['name'],
            'icon_img'    => $icon_img,
            'chat_txt'    => $data['res']['chat_txt'],
        ]);
        $chat->save();

        // 一覧画面へリダイレクト
        return redirect(route('chat.list'));
    }

    /**
     * @param Request
     * @return Response
     */
    public function postDelete(Request $request)
    {
        $data = $request->all();
        $chat = Chat::find($data['chat']['delete_id']);
        if (is_null($chat) || $chat->char_id != Auth::user()->id) {
            // 発言IDが存在しないか、発言者のIDがログインユーザと一致しなければ一覧画面へリダイレクト
            return redirect(route('chat.list'));
        }

        // 発言を削除し、一覧画面へリダイレクト
        $chat->delete();
        return redirect(route('chat.list'));
    }
}
