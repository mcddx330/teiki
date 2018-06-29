@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="chara-box">
            <div class="card">
                <div class="card-header">Eno.{{ \Auth::user()->id }}　{{ \Auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row clearfix">
                        <div class="col-md-6">
                        @if(!empty(\Auth::user()->profile_mini))
                            <p>{{ \Auth::user()->profile_mini }}</p>
                        @endif
                            <p>■ステータス</p>
                            <table class="table table-striped border-bottom">
                                <tr>
                                    <td><span class="mono-space">STR：{{ \Auth::user()->str }}</span></td>
                                    <td><span class="mono-space">VIT：{{ \Auth::user()->vit }}</span></td>
                                    <td><span class="mono-space">DEX：{{ \Auth::user()->dex }}</span></td>
                                    <td><span class="mono-space">AGI：{{ \Auth::user()->agi }}</span></td>
                                </tr>
                                <tr>
                                    <td><span class="mono-space">INT：{{ \Auth::user()->int }}</span></td>
                                    <td><span class="mono-space">MND：{{ \Auth::user()->mnd }}</span></td>
                                    <td><span class="mono-space">CON：{{ \Auth::user()->con }}</span></td>
                                    <td><span class="mono-space">DEV：{{ \Auth::user()->dev }}</span></td>
                                </tr>
                                <tr>
                                    <td><span class="mono-space">DIR：{{ \Auth::user()->dir }}</span></td>
                                    <td><span class="mono-space">EXE：{{ \Auth::user()->exe }}</span></td>
                                    <td><span class="mono-space">DET：{{ \Auth::user()->det }}</span></td>
                                    <td><span class="mono-space">RES：{{ \Auth::user()->res }}</span></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><span class="mono-space">LUC：{{ \Auth::user()->luc }}</span></td>
                                    <td colspan="2"><span class="mono-space">GRA：{{ \Auth::user()->gra }}</span></td>
                                </tr>
                            </table>
<!--
                            <p>■ステータスの意味</p>
                            <p class="mono-space">
                                STR/筋力、VIT/活力、DEX/器用、AGI/敏捷<br>
                                INT/知力、MND/精神、CON/集中、DEV/献身<br>
                                DIR/指揮、EXE/演奏、DET/感応、RES/共感<br>
                                LUC/幸運、GRA/恩寵
                            </p>
-->
                        </div>
                        <div class="col-md-6">
                        @if(empty(\Auth::user()->profile_img))
                            <img src="/img/no_image_prof.png" alt="no image">
                        @else
                            <img src="{{ \Auth::user()->profile_img }}" alt="キャラクター画像">
                        @endif
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <p>■プロフィール</p>
                            <div>
                                {!! nl2br(e(\Auth::user()->profile_txt)) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
