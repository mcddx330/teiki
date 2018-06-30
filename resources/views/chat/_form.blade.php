@section('chat_form')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">発言</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('chat.post') }}" aria-label="{{ __('Chat') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="chat_icon" class="col-md-2 col-form-label text-md-right">{{ __('アイコン') }}</label>

                            <div class="col-md-3">
                                <select id="chat_icon" name="chat[icon]" class="form-control{{ $errors->has('chat.icon') ? ' is-invalid' : '' }}">
                                    <option value="0"{{ old('chat.icon') == 0 ? ' selected' : '' }}>アイコン0</option>
                                    <option value="1"{{ old('chat.icon') == 1 ? ' selected' : '' }}>アイコン1</option>
                                    <option value="2"{{ old('chat.icon') == 2 ? ' selected' : '' }}>アイコン2</option>
                                    <option value="3"{{ old('chat.icon') == 3 ? ' selected' : '' }}>アイコン3</option>
                                    <option value="4"{{ old('chat.icon') == 4 ? ' selected' : '' }}>アイコン4</option>
                                    <option value="5"{{ old('chat.icon') == 5 ? ' selected' : '' }}>アイコン5</option>
                                </select>

                                @if ($errors->has('chat.icon'))
                                    <span class="invalid-feedback icon" role="alert">
                                        <strong>{{ $errors->first('chat.icon') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="chat_name" class="col-md-2 col-form-label text-md-right">{{ __('名前') }}</label>

                            <div class="col-md-4">
                                <input id="chat_name" type="text" class="form-control{{ $errors->has('chat.name') ? ' is-invalid' : '' }}" name="chat[name]" value="{{ old('chat.name') }}" required autofocus>

                                @if ($errors->has('chat.name'))
                                    <span class="invalid-feedback name" role="alert">
                                        <strong>{{ $errors->first('chat.name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="chat_chat_txt" class="col-md-2 col-form-label text-md-right">{{ __('発言') }}</label>

                            <div class="col-md-9">
                                <textarea id="chat_chat_txt" class="form-control{{ $errors->has('chat.chat_txt') ? ' is-invalid' : '' }}" name="chat[chat_txt]" required>{{ old('chat.chat_txt') }}</textarea>

                                @if ($errors->has('chat.chat_txt'))
                                    <span class="invalid-feedback chat_txt" role="alert">
                                        <strong>{{ $errors->first('chat.chat_txt') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('発言') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('res_form')
<div class="chat-res-box">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" id="res_head">返信</div>
                    <div class="card-body" id="res_box">
                        <form method="POST" action="{{ route('chat.res') }}" aria-label="{{ __('Chat') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="chat_res_id" class="col-md-2 col-form-label text-md-right">{{ __('返信先ID') }}</label>

                                <div class="col-md-9">
                                    <p id="chat_res_show" class="col-form-label">{{ old('res.res_id') ? old('res.res_id') : '未設定' }}</p>
                                    <input id="chat_res_id" type="hidden" name="res[res_id]" class="form-control{{ $errors->has('res.res_id') ? ' is-invalid' : '' }}" value="{{ old('res.res_id') }}">

                                    @if ($errors->has('res.res_id'))
                                        <span class="invalid-feedback res_id" role="alert">
                                            <strong>{{ $errors->first('res.res_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="res_icon" class="col-md-2 col-form-label text-md-right">{{ __('アイコン') }}</label>

                                <div class="col-md-3">
                                    <select id="res_icon" name="res[icon]" class="form-control{{ $errors->has('res.icon') ? ' is-invalid' : '' }}">
                                        <option value="0"{{ old('res.icon') == 0 ? ' selected' : '' }}>アイコン0</option>
                                        <option value="1"{{ old('res.icon') == 1 ? ' selected' : '' }}>アイコン1</option>
                                        <option value="2"{{ old('res.icon') == 2 ? ' selected' : '' }}>アイコン2</option>
                                        <option value="3"{{ old('res.icon') == 3 ? ' selected' : '' }}>アイコン3</option>
                                        <option value="4"{{ old('res.icon') == 4 ? ' selected' : '' }}>アイコン4</option>
                                        <option value="5"{{ old('res.icon') == 5 ? ' selected' : '' }}>アイコン5</option>
                                    </select>

                                    @if ($errors->has('res.icon'))
                                        <span class="invalid-feedback icon" role="alert">
                                            <strong>{{ $errors->first('res.icon') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <label for="res_name" class="col-md-2 col-form-label text-md-right">{{ __('名前') }}</label>

                                <div class="col-md-4">
                                    <input id="res_name" type="text" class="form-control{{ $errors->has('res.name') ? ' is-invalid' : '' }}" name="res[name]" value="{{ old('res.name') }}" required autofocus>

                                    @if ($errors->has('res.name'))
                                        <span class="invalid-feedback name" role="alert">
                                            <strong>{{ $errors->first('res.name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="res_chat_txt" class="col-md-2 col-form-label text-md-right">{{ __('返信') }}</label>

                                <div class="col-md-9">
                                    <textarea id="res_chat_txt" class="form-control{{ $errors->has('res.chat_txt') ? ' is-invalid' : '' }}" name="res[chat_txt]" required>{{ old('res.chat_txt') }}</textarea>

                                    @if ($errors->has('res.chat_txt'))
                                        <span class="invalid-feedback chat_txt" role="alert">
                                            <strong>{{ $errors->first('res.chat_txt') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('返信') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('delete_form')
<div class="delete-box">
    <form method="POST" action="{{ route('chat.delete') }}" aria-label="{{ __('Chat') }}" id="chat_delete">
        @csrf
        <input id="chat_delete_id" type="hidden" name="chat[delete_id]" value="">
    </form>
</div>
@endsection