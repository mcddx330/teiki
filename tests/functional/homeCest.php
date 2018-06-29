<?php


class homeCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amLoggedAs(['id' => 1, 'password' => 'password']);
    }

    public function _after(FunctionalTester $I)
    {
    }

    public function homeTest(FunctionalTester $I)
    {
        $I->wantTo('自分のキャラクター情報が表示される');
        $I->amOnPage('/');
        $I->seeCurrentUrlEquals('/');

        $I->expectTo('表示項目が正しいこと');
        $I->see('Eno.1　テストキャラクター1', '.card-header');
        $I->see('ひとこと自己紹介', 'p');
        $I->see('■ステータス', 'p');
        $I->see('STR：5', 'tr:nth-child(1) td:nth-child(1) span.mono-space');
        $I->see('VIT：5', 'tr:nth-child(1) td:nth-child(2) span.mono-space');
        $I->see('DEX：5', 'tr:nth-child(1) td:nth-child(3) span.mono-space');
        $I->see('AGI：5', 'tr:nth-child(1) td:nth-child(4) span.mono-space');
        $I->see('INT：5', 'tr:nth-child(2) td:nth-child(1) span.mono-space');
        $I->see('MND：5', 'tr:nth-child(2) td:nth-child(2) span.mono-space');
        $I->see('CON：5', 'tr:nth-child(2) td:nth-child(3) span.mono-space');
        $I->see('DEV：5', 'tr:nth-child(2) td:nth-child(4) span.mono-space');
        $I->see('DIR：3', 'tr:nth-child(3) td:nth-child(1) span.mono-space');
        $I->see('EXE：3', 'tr:nth-child(3) td:nth-child(2) span.mono-space');
        $I->see('DET：3', 'tr:nth-child(3) td:nth-child(3) span.mono-space');
        $I->see('RES：3', 'tr:nth-child(3) td:nth-child(4) span.mono-space');
        $I->see('LUC：0', 'tr:nth-child(4) td:nth-child(1) span.mono-space');
        $I->see('GRA：0', 'tr:nth-child(4) td:nth-child(2) span.mono-space');
        $I->seeElement('img[src="/img/no_image_prof.png"]');
        $I->see('■プロフィール', 'p');
        $I->dontSee('自己紹介のサンプルです。', 'div');
        $I->see('自己紹介の', 'div');
        $I->see('サンプル', 'div');
        $I->see('です。', 'div');
    }
}
