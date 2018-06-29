<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('ログイン画面の確認');
$I->amOnPage('/');
$I->see('laravel');