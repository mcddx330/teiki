<?php


class characterCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function listTest(FunctionalTester $I)
    {
        $I->wantTo('キャラクターの一覧が表示される');
        $I->amOnPage('/list');
        $I->seeCurrentUrlEquals('/list');

        $I->expectTo('一覧の表示項目が正しいこと');
        $I->comment('1ページ目');
        $I->see('キャラクターリスト', '.card-header');
        $I->see('Eno / キャラクター名', 'tr:nth-child(1) th:nth-child(1)');
        $I->see('ひとこと', 'tr:nth-child(1) th:nth-child(2)');
        $I->see('Eno.1 / テストキャラクター1', 'tr:nth-child(2) td:nth-child(1)');
        $I->see('ひとこと自己紹介', 'tr:nth-child(2) td:nth-child(2)');
        $I->see('Eno.2 / テストキャラクター2', 'tr:nth-child(3) td:nth-child(1)');
        $I->see('てすとてすと', 'tr:nth-child(3) td:nth-child(2)');
        $I->see('Eno.5 / テストキャラクター5', 'tr:nth-child(6) td:nth-child(1)');
        $I->see('', 'tr:nth-child(6) td:nth-child(2)');
        $I->dontSee('Eno.6 / テストキャラクター6');
        $I->dontSeeLink('1', 'http://localhost/list?page=1');
        $I->seeLink('2', 'http://localhost/list?page=2');

        $I->comment('2ページ目');
        $I->click('2');
        $I->seeCurrentUrlEquals('/list?page=2');
        $I->see('キャラクターリスト', '.card-header');
        $I->see('Eno / キャラクター名', 'tr:nth-child(1) th:nth-child(1)');
        $I->see('ひとこと', 'tr:nth-child(1) th:nth-child(2)');
        $I->see('Eno.6 / テストキャラクター6', 'tr:nth-child(2) td:nth-child(1)');
        $I->see('', 'tr:nth-child(2) td:nth-child(2)');
        $I->see('Eno.10 / テストキャラクター10', 'tr:nth-child(6) td:nth-child(1)');
        $I->see('', 'tr:nth-child(6) td:nth-child(2)');
        $I->dontSee('Eno.1 / テストキャラクター1');
        $I->dontSee('Eno.5 / テストキャラクター5');
        $I->seeLink('1', 'http://localhost/list?page=1');
        $I->dontSeeLink('2', 'http://localhost/list?page=2');


    }

    public function detailNgTest(FunctionalTester $I)
    {
        $I->wantTo('存在しないEnoのキャラクターは404エラーになる');
        $I->amOnPage('/character/999');
        $I->seeCurrentUrlEquals('/character/999');
        $I->seePageNotFound();
    }

    public function detailOkTest(FunctionalTester $I)
    {
        $I->wantTo('Eno.1のキャラクター情報が表示される');
        $I->amOnPage('/character/1');
        $I->seeCurrentUrlEquals('/character/1');

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
