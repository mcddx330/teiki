@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="chara-box">
        <div class="card">
          <div class="card-header">
            <div class="float-left">
              Eno.{{ $character->id }}
            </div>
            <div class="float-left em1l">
              【{{ $character->profile_title }}】
            </div>
            <div class="float-left">
              {{ $character->name_full }}
            </div>
          </div>

          <div class="card-body">
            <div class="row clearfix">
              <div class="col-md-6">
                @if(empty($character->profile_img))
                  <img src="/img/no_image_prof.png" alt="no image">
                @else
                  <img src="{{ $character->profile_img }}" alt="キャラクター画像">
                @endif
              </div>
              <div class="col-md-6">
                @if(!empty($character->profile_mini))
                  <p>{{ $character->profile_mini }}</p>
                @endif

                @include('character.partials.status')

                {{-- ログイン中は各種設定表示 --}}
                @if (Auth::check() && Auth::id() === $character->id)
                  <a href="{{route('character.settings', ['id' => $character->id])}}">基本設定</a>
                  <a href="{{route('character.turn.settings', ['id' => $character->id])}}">行動設定</a>
                @endif

              </div>
            </div>

            <div class="row clearfix">
              <div class="col-md-12">
                <p>■プロフィール</p>
                <div>
                  {!! nl2br(e($character->profile_txt)) !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
