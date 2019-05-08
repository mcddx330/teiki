@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">キャラクターリスト</div>

          <div class="card-body">
            <table class="table table-bordered">
              <tr>
                <th>Eno / キャラクター名</th>
                <!--
                  <th>ひとこと</th>
                -->
              </tr>
              @foreach($characters as $character)
                <tr>
                  <td>
                    Eno.{{ $character->id }} /
                    <a href="{{ route('character.detail', ['id' => $character->id]) }}">{{ $character->name_full }}</a>
                  </td>
                <!--
                    <td>
                      {{ $character->profile_mini }}
                    </td>
                  -->
                </tr>
              @endforeach
            </table>
            {{ $characters->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
