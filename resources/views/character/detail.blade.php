@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="chara-box">
            <div class="card">
                <div class="card-header">Eno.{{ $character->id }}　{{ $character->name }}</div>

                <div class="card-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                        @if(!empty($character->profile_mini))
                            <p>{{ $character->profile_mini }}</p>
                        @endif
                            <p>■ステータス</p>
                            <table class="table table-striped border-bottom">
                                <tr>
                                    <td><span class="mono-space">STR：{{ $character->str }}</span></td>
                                    <td><span class="mono-space">VIT：{{ $character->vit }}</span></td>
                                    <td><span class="mono-space">DEX：{{ $character->dex }}</span></td>
                                    <td><span class="mono-space">AGI：{{ $character->agi }}</span></td>
                                </tr>
                                <tr>
                                    <td><span class="mono-space">INT：{{ $character->int }}</span></td>
                                    <td><span class="mono-space">MND：{{ $character->mnd }}</span></td>
                                    <td><span class="mono-space">CON：{{ $character->con }}</span></td>
                                    <td><span class="mono-space">DEV：{{ $character->dev }}</span></td>
                                </tr>
                                <tr>
                                    <td><span class="mono-space">DIR：{{ $character->dir }}</span></td>
                                    <td><span class="mono-space">EXE：{{ $character->exe }}</span></td>
                                    <td><span class="mono-space">DET：{{ $character->det }}</span></td>
                                    <td><span class="mono-space">RES：{{ $character->res }}</span></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><span class="mono-space">LUC：{{ $character->luc }}</span></td>
                                    <td colspan="2"><span class="mono-space">GRA：{{ $character->gra }}</span></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                        @if(empty($character->profile_img))
                            <img src="/img/no_image_prof.png" alt="no image">
                        @else
                            <img src="{{ $character->profile_img }}" alt="キャラクター画像">
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
