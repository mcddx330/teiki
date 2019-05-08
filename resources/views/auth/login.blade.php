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
                  <input id="id" type="id" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id"
                         value="{{ old('id') }}" required autofocus>

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
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                         name="password" required>

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

                <div class="col-md-8 row">
                  <div class="col-6">
                    <input id="register_name" type="text" class="form-control{{ $errors->has('register.name.first') ? ' is-invalid' : '' }}"
                           name="register[name][first]" value="{{ old('register.name.first') }}" placeholder="名前（名）" required
                           autofocus>
                  </div>
                  @if ($errors->has('register.name.first'))
                    <span class="invalid-feedback register_name" role="alert">
                      <strong>{{ $errors->first('register.name.first') }}</strong>
                    </span>
                  @endif
                  <div class="col-6">
                    <input id="register_name" type="text" class="form-control{{ $errors->has('register.name.last') ? ' is-invalid' : '' }}"
                           name="register[name][last]" value="{{ old('register.name.last') }}" placeholder="名前（姓）" required>
                  </div>
                  @if ($errors->has('register.name.last'))
                    <span class="invalid-feedback register_name" role="alert">
                      <strong>{{ $errors->first('register.name.last') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-4 col-form-label text-md-right"></div>

                <div class="col-md-8 row">
                  <div class="col-md-12">
                    <label>{!! Form::checkbox(
                    'is_not_foreigner',
                    0,
                    null,
                    [
                      'id' => 'is_',
                      'class' => 'form-control',
                    ])
                  !!} 日本名（姓・名が反対に表示されます）</label>
                  </div>
                </div>
              </div>


              <div class="form-group row">
                <label for="register_password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                <div class="col-md-6">
                  {!! Form::password(
                    'register[password]', [
                      'id' => 'register_password',
                      'class' => array_merge(
                        ['form-control'],
                        ($errors->has('register.password'))
                          ? ['is_invalid']
                          : []
                      )
                    ]) !!}

                  <!--
                  <input id="register_password" type="password"
                         class="form-control{{ $errors->has('register.password') ? ' is-invalid' : '' }}" name="register[password]"
                         required>
                  -->

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
                  <input id="register_password-confirm" type="password" class="form-control" name="register[password_confirmation]"
                         required>
                  <span class="small">パスワードは8文字以上で入力してください。</span>
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
