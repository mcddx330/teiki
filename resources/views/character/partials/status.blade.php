<table class="table table-striped border-bottom">
  <tr>
    <td><span class="mono-space">Lv：{{ $character->level }}</span></td>
    <td><span class="mono-space">HP：{{ $character->hp }}</span></td>
  </tr>
</table>

<p>■ステータス</p>
<table class="table table-striped border-bottom">
  <tr>
    <td><span class="mono-space">POW：{{ $character->power }}</span></td>
    <td><span class="mono-space">DEF：{{ $character->defense }}</span></td>
  </tr>
  <tr>
    <td><span class="mono-space">Wiz：{{ $character->wizard }}</span></td>
    <td><span class="mono-space">SPD：{{ $character->speed }}</span></td>
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