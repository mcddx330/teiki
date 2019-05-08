@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="chara-box">
        <div class="card">
          <div class="card-header">Eno.{{ \Auth::user()->id }}　{{ \Auth::user()->formatted_name_attribute }}</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <div class="row clearfix">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
