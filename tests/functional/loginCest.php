<?php


class loginCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    public function berofeLoginTest(FunctionalTester $I)
    {
        $I->wantTo('未ログイン状態でアクセスすると、新規登録・ログイン画面にリダイレクトされる');
        $I->amOnPage('/');
        $I->seeCurrentUrlEquals('/login');

        $I->expectTo('ヘッダメニューの表示が正しいこと');
        $I->dontSeeLink('プロフィール');
        $I->dontSeeLink('チャット');
        $I->seeLink('キャラリスト');
        $I->seeLink('新規登録・ログイン');
        $I->dontSeeLink('ログアウト');

        $I->expectTo('ログインフォームの表示が正しいこと');
        $I->see('ログイン', 'div.card-header');
        $I->see('Eno.', 'label[for="id"]');
        $I->seeElement('input#id');
        $I->see('パスワード', 'label[for="password"]');
        $I->seeElement('input#password');
        $I->see('ログイン', 'button');

        $I->expectTo('新規登録フォームの表示が正しいこと');
        $I->see('新規登録', 'div.card-header');
        $I->see('キャラクター名', 'label[for="register_name"]');
        $I->seeElement('input#register_name');
        $I->see('パスワード', 'label[for="register_password"]');
        $I->seeElement('input#register_password');
        $I->see('パスワード（確認）', 'label[for="register_password-confirm"]');
        $I->seeElement('input#register_password-confirm');
        $I->see('合言葉', 'label[for="register_watchword"]');
        $I->seeElement('input#register_watchword');
        $I->see('パスワードは6文字以上20文字以内で入力してください。');
    }

    public function registNgTest(FunctionalTester $I)
    {
        $I->wantTo('新規登録のバリデーションの確認');
        $I->amOnPage('/');
        $I->seeCurrentUrlEquals('/login');

        $I->expectTo('必須入力の確認');
        $I->click('新規登録');
        $I->seeCurrentUrlEquals('/login');
        $I->see('必須入力です。', '.register_name');
        $I->see('必須入力です。', '.register_password');
        $I->see('必須入力です。', '.register_watchword');

        $I->expectTo('入力文字数の確認');
        $value = '';
        for ($i=0; $i<=50; $i++) {
            $value .= 'あ';
        }
        $I->fillField('register[name]', $value);
        $value = '';
        for ($i=0; $i<5; $i++) {
            $value .= 'a';
        }
        $I->fillField('register[password]', $value);
        $I->click('新規登録');
        $I->seeCurrentUrlEquals('/login');
        $I->see('50文字以下で入力してください。', '.register_name');
        $I->see('6文字以上で入力してください。', '.register_password');
        $value = '';
        for ($i=0; $i<=20; $i++) {
            $value .= 'a';
        }
        $I->fillField('register[password]', $value);
        $I->click('新規登録');
        $I->seeCurrentUrlEquals('/login');
        $I->see('20文字以下で入力してください。', '.register_password');

        $I->expectTo('入力不一致の確認');
        $I->fillField('register[password]', '123456');
        $I->fillField('register[password_confirmation]', '1234567');
        $I->fillField('register[watchword]', '合言葉');
        $I->click('新規登録');
        $I->seeCurrentUrlEquals('/login');
        $I->see('確認用の入力値と一致しません。', '.register_password');
        $I->see('合言葉が不正です。', '.register_watchword');
    }

    public function registOkTest(FunctionalTester $I)
    {
        $I->wantTo('新規登録の確認');
        $I->amOnPage('/');
        $I->seeCurrentUrlEquals('/login');

        $I->expectTo('新規登録が完了すること');
        $I->fillField('register[name]', 'テスト1');
        $I->fillField('register[password]', 'password');
        $I->fillField('register[password_confirmation]', 'password');
        $I->fillField('register[watchword]', 'あいことば');
        $I->click('新規登録');
        $I->seeCurrentUrlEquals('/');

        $I->expectTo('データが登録されていること');
        $I->seeRecord('characters', ['id' => 11, 'name' => 'テスト1', 'nickname' => 'テスト1']);
    }

    public function loginNgTest(FunctionalTester $I)
    {
        $I->wantTo('新規登録のバリデーションの確認');
        $I->amOnPage('/');
        $I->seeCurrentUrlEquals('/login');

        $I->expectTo('必須入力の確認');
        $I->click('ログイン');
        $I->seeCurrentUrlEquals('/login');
        $I->see('必須入力です。', '.id');
        $I->see('必須入力です。', '.password');

        $I->expectTo('パスワード不一致の確認');
        $I->fillField('id', '1');
        $I->fillField('password', '123456');
        $I->click('ログイン');
        $I->seeCurrentUrlEquals('/login');
        $I->see('Enoとパスワードが一致しません。', '.id');

        $I->expectTo('存在しないEnoの確認');
        $I->fillField('id', '99');
        $I->fillField('password', 'password');
        $I->click('ログイン');
        $I->seeCurrentUrlEquals('/login');
        $I->see('Enoとパスワードが一致しません。', '.id');
    }

    public function loginOkTest(FunctionalTester $I)
    {
        $I->wantTo('ログインの確認');
        $I->amOnPage('/');
        $I->seeCurrentUrlEquals('/login');

        $I->expectTo('ログインが完了すること');
        $I->fillField('id', '1');
        $I->fillField('password', 'password');
        $I->click('ログイン');
        $I->seeCurrentUrlEquals('/');

        $I->expectTo('ヘッダメニューの表示が正しいこと');
        $I->seeLink('プロフィール');
        $I->seeLink('チャット');
        $I->seeLink('キャラリスト');
        $I->seeLink('ログアウト');
        $I->dontSeeLink('新規登録・ログイン');
    }
}
