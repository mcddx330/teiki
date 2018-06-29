@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ログイン') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="id" class="col-sm-4 col-form-label text-md-right">{{ __('Eno.') }}</label>

                            <div class="col-md-6">
                                <input id="id" type="id" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{ old('id') }}" required autofocus>

                                @if ($errors->has('id'))
                                    <span class="invalid-feedback id" role="alert">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback password" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ログイン') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('新規登録') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="register_name" class="col-md-4 col-form-label text-md-right">{{ __('キャラクター名') }}</label>

                            <div class="col-md-6">
                                <input id="register_name" type="text" class="form-control{{ $errors->has('register.name') ? ' is-invalid' : '' }}" name="register[name]" value="{{ old('register.name') }}" required autofocus>

                                @if ($errors->has('register.name'))
                                    <span class="invalid-feedback register_name" role="alert">
                                        <strong>{{ $errors->first('register.name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="register_password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="register_password" type="password" class="form-control{{ $errors->has('register.password') ? ' is-invalid' : '' }}" name="register[password]" required>

                                @if ($errors->has('register.password'))
                                    <span class="invalid-feedback register_password" role="alert">
                                        <strong>{{ $errors->first('register.password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="register_password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワード（確認）') }}</label>

                            <div class="col-md-6">
                                <input id="register_password-confirm" type="password" class="form-control" name="register[password_confirmation]" required>
                                <span>パスワードは6文字以上20文字以内で入力してください。</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="register_watchword" class="col-md-4 col-form-label text-md-right">{{ __('合言葉') }}</label>

                            <div class="col-md-6">
                                <input id="register_watchword" type="text" class="form-control{{ $errors->has('register.watchword') ? ' is-invalid' : '' }}" name="register[watchword]" required>

                                @if ($errors->has('register.watchword'))
                                    <span class="invalid-feedback register_watchword" role="alert">
                                        <strong>{{ $errors->first('register.watchword') }}</strong>
                                    </span>
                                @endif
                                <span>合言葉は「あいことば」です。</span>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('新規登録') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
