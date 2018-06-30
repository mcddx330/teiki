@extends('layouts.app')
@include('chat._form')

@section('content')
<div class="container" id="container">
    <div class="row justify-content-center">
@yield('chat_form')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">チャット</div>

                <div class="card-body">
                    <p class="mb-0">■ツリー参加者</p>
                    <p>{{ implode('、', $joins) }}</p>
                    <table class="table table-bordered chat-area">
                        @foreach($chats as $chat)
                        <tr>
                            <td class="chat-icon-area"><img src="{{ $chat->icon_img }}" alt="アイコン"></td>
                            <td class="chat-text-area">
                                @if($chat->res_chat_id)
                                <div>
                                    ＞{{ $chat->res_char_name }}
                                </div>
                                @endif
                                <div>
                                    {{ $chat->name }}({{ $chat->char_id }})<br>「{!! nl2br(e($chat->chat_txt)) !!}」
                                </div>
                                <div class="text-md-right">
                                    ID:{{ $chat->id }}　({{ $chat->created_at }})　
                                    @if ($chat->char_id == \Auth::user()->id)
                                    <a href="javascript:postDel({{ $chat->id }});">削除</a>
                                    @endif
                                    <a href="javascript:postRes({{ $chat->id }});">返信</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $chats->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@yield('res_form')
@yield('delete_form')

@endsection

@section('js_bottom')
<script>
    $(function(){
        @if (!$errors->has('res.res_id') && !$errors->has('res.icon') && !$errors->has('res.name') && !$errors->has('res.chat_txt'))
        $("#res_box").hide();
        @endif
        $("#res_head").on('click', function () {
            $("#res_box").slideToggle( function () {
                if ($("#res_box").is(':visible')) {
                    $("#container").addClass('bm-res-box');
                } else {
                    $("#container").removeClass('bm-res-box');
                }
            });
        });
    });

    function postRes(id) {
        $("#chat_res_id").val(id);
        $("#chat_res_show").text(id);
        $("#res_box").slideDown( function () {
            $("#container").addClass('bm-res-box');
        });
    }

    function postDel(id) {
        if (confirm('発言を削除します。よろしいですか？')) {
            $("#chat_delete_id").val(id);
            $("#chat_delete").submit();
        } else {
            return false;
        }
    }
</script>
@endsection