<?php


class chatCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    public function chatListTest(FunctionalTester $I)
    {
        $I->wantTo('チャット一覧の表示を確認');

        $I->amLoggedAs(['id' => 2, 'password' => 'password']);
        $I->amOnPage('/chat');
        $I->seeCurrentUrlEquals('/chat');

        $I->expectTo('発言フォームが表示されること');
        $I->see('発言', '.card-header');
        $I->see('アイコン', 'label[for="chat_icon"]');
        $I->seeElement('select#chat_icon');
        $I->see('名前', 'label[for="chat_name"]');
        $I->seeElement('input#chat_name');
        $I->see('発言', 'label[for="chat_chat_txt"]');
        $I->seeElement('textarea#chat_chat_txt');
        $I->see('発言', 'button');

        $I->expectTo('返信フォームが表示されること');
        $I->see('返信', '.card-header');
        $I->see('返信先ID', 'label[for="chat_res_id"]');
        $I->see('未設定', '#chat_res_show');
        $I->seeElement('input#chat_res_id');
        $I->see('アイコン', 'label[for="res_icon"]');
        $I->seeElement('select#res_icon');
        $I->see('名前', 'label[for="res_name"]');
        $I->seeElement('input#res_name');
        $I->see('返信', 'label[for="res_chat_txt"]');
        $I->seeElement('textarea#res_chat_txt');
        $I->see('返信', 'button');

        $I->expectTo('削除フォームが表示されること');
        $I->seeElement("input#chat_delete_id");

        $I->expectTo('ツリーに参加していない発言ログの表示が正しいこと');
        $I->see('＞テスト1(1)（2人がツリーに参加中）', 'tr:nth-child(1) td:nth-child(2) a');
        $I->see('テスト３(3)', 'tr:nth-child(1) td:nth-child(2)');
        $I->see('「ツリーテスト」', 'tr:nth-child(1) td:nth-child(2)');
        $I->see('ID:6', 'tr:nth-child(1) td:nth-child(2)');
        $I->dontSee('削除', 'tr:nth-child(1) td:nth-child(2) a');
        $I->see('返信', 'tr:nth-child(1) td:nth-child(2) a');

        $I->expectTo('ツリーに参加している発言ログの表示が正しいこと');
        $I->see('＞テスト2(2)（あなたを含めた3人がツリーに参加中）', 'tr:nth-child(2) td:nth-child(2) a');
        $I->see('テスト３(3)', 'tr:nth-child(2) td:nth-child(2)');
        $I->see('「返信テスト３」', 'tr:nth-child(2) td:nth-child(2)');
        $I->see('ID:5', 'tr:nth-child(2) td:nth-child(2)');
        $I->dontSee('削除', 'tr:nth-child(2) td:nth-child(2) a');
        $I->see('返信', 'tr:nth-child(2) td:nth-child(2) a');

        $I->expectTo('自分の発言ログの表示が正しいこと');
        $I->see('＞テスト1(1)（あなたを含めた3人がツリーに参加中）', 'tr:nth-child(3) td:nth-child(2) a');
        $I->see('テスト２(2)', 'tr:nth-child(3) td:nth-child(2)');
        $I->see('「返信テスト２」', 'tr:nth-child(3) td:nth-child(2)');
        $I->see('ID:4', 'tr:nth-child(3) td:nth-child(2)');
        $I->see('削除', 'tr:nth-child(3) td:nth-child(2) a');
        $I->see('返信', 'tr:nth-child(3) td:nth-child(2) a');

        $I->expectTo('自分自身への返信ログの表示が正しいこと');
        $I->see('＞テスト1(1)（あなたを含めた3人がツリーに参加中）', 'tr:nth-child(4) td:nth-child(2) a');
        $I->see('テスト1(1)', 'tr:nth-child(4) td:nth-child(2)');
        $I->see('「返信テスト」', 'tr:nth-child(4) td:nth-child(2)');
        $I->see('ID:3', 'tr:nth-child(4) td:nth-child(2)');
        $I->dontSee('削除', 'tr:nth-child(4) td:nth-child(2) a');
        $I->see('返信', 'tr:nth-child(4) td:nth-child(2) a');

        $I->expectTo('発言（返信でない）ログの表示が正しいこと');
        $I->dontSee('＞', 'tr:nth-child(5) td:nth-child(2) a');
        $I->see('テストキャラクター(1)', 'tr:nth-child(5) td:nth-child(2)');
        $I->see('「テスト', 'tr:nth-child(5) td:nth-child(2)');
        $I->see('ID:2', 'tr:nth-child(5) td:nth-child(2)');
        $I->dontSee('削除', 'tr:nth-child(5) td:nth-child(2) a');
        $I->see('返信', 'tr:nth-child(5) td:nth-child(2) a');

        $I->expectTo('ページングが表示されていること');
        $I->dontSeeLink('1', 'http://localhost/chat?page=1');
        $I->seeLink('2', 'http://localhost/chat?page=2');

        $I->comment('2ページ目');
        $I->click('2');
        $I->seeCurrentUrlEquals('/chat?page=2');

        $I->expectTo('発言フォームが表示されること');
        $I->see('発言', '.card-header');
        $I->see('アイコン', 'label[for="chat_icon"]');
        $I->seeElement('select#chat_icon');
        $I->see('名前', 'label[for="chat_name"]');
        $I->seeElement('input#chat_name');
        $I->see('発言', 'label[for="chat_chat_txt"]');
        $I->seeElement('textarea#chat_chat_txt');
        $I->see('発言', 'button');

        $I->expectTo('返信フォームが表示されること');
        $I->see('返信', '.card-header');
        $I->see('返信先ID', 'label[for="chat_res_id"]');
        $I->see('未設定', '#chat_res_show');
        $I->seeElement('input#chat_res_id');
        $I->see('アイコン', 'label[for="res_icon"]');
        $I->seeElement('select#res_icon');
        $I->see('名前', 'label[for="res_name"]');
        $I->seeElement('input#res_name');
        $I->see('返信', 'label[for="res_chat_txt"]');
        $I->seeElement('textarea#res_chat_txt');
        $I->see('返信', 'button');

        $I->expectTo('削除フォームが表示されること');
        $I->seeElement("input#chat_delete_id");

        $I->expectTo('次のページの発言ログが表示されること');
        $I->dontSee('＞', 'tr:nth-child(1) td:nth-child(2) a');
        $I->see('テスト(1)', 'tr:nth-child(1) td:nth-child(2)');
        $I->see('「発言テスト」', 'tr:nth-child(1) td:nth-child(2)');
        $I->see('ID:1', 'tr:nth-child(1) td:nth-child(2)');
        $I->dontSee('削除', 'tr:nth-child(1) td:nth-child(2) a');
        $I->see('返信', 'tr:nth-child(1) td:nth-child(2) a');
    }

    public function chatTreeTest(FunctionalTester $I)
    {
        $I->wantTo('ツリー一覧の表示を確認');

        $I->amLoggedAs(['id' => 2, 'password' => 'password']);
        $I->amOnPage('/chat/tree/2');
        $I->seeCurrentUrlEquals('/chat/tree/2');

        $I->expectTo('発言フォームが表示されること');
        $I->see('発言', '.card-header');
        $I->see('アイコン', 'label[for="chat_icon"]');
        $I->seeElement('select#chat_icon');
        $I->see('名前', 'label[for="chat_name"]');
        $I->seeElement('input#chat_name');
        $I->see('発言', 'label[for="chat_chat_txt"]');
        $I->seeElement('textarea#chat_chat_txt');
        $I->see('発言', 'button');

        $I->expectTo('返信フォームが表示されること');
        $I->see('返信', '.card-header');
        $I->see('返信先ID', 'label[for="chat_res_id"]');
        $I->see('未設定', '#chat_res_show');
        $I->seeElement('input#chat_res_id');
        $I->see('アイコン', 'label[for="res_icon"]');
        $I->seeElement('select#res_icon');
        $I->see('名前', 'label[for="res_name"]');
        $I->seeElement('input#res_name');
        $I->see('返信', 'label[for="res_chat_txt"]');
        $I->seeElement('textarea#res_chat_txt');
        $I->see('返信', 'button');

        $I->expectTo('削除フォームが表示されること');
        $I->seeElement("input#chat_delete_id");

        $I->expectTo('ツリー参加者の一覧が表示されること');
        $I->see('■ツリー参加者', 'p');
        $I->see('テスト1、テスト2、テスト3', 'p');

        $I->expectTo('自分以外の返信ログの表示が正しいこと');
        $I->see('＞テスト2(2)', 'tr:nth-child(1) td:nth-child(2)');
        $I->see('テスト３(3)', 'tr:nth-child(1) td:nth-child(2)');
        $I->see('「返信テスト３」', 'tr:nth-child(1) td:nth-child(2)');
        $I->see('ID:5', 'tr:nth-child(1) td:nth-child(2)');
        $I->dontSee('削除', 'tr:nth-child(1) td:nth-child(2) a');
        $I->see('返信', 'tr:nth-child(1) td:nth-child(2) a');

        $I->expectTo('自分の返信ログの表示が正しいこと');
        $I->see('＞テスト1(1)', 'tr:nth-child(2) td:nth-child(2)');
        $I->see('テスト２(2)', 'tr:nth-child(2) td:nth-child(2)');
        $I->see('「返信テスト２」', 'tr:nth-child(2) td:nth-child(2)');
        $I->see('ID:4', 'tr:nth-child(2) td:nth-child(2)');
        $I->see('削除', 'tr:nth-child(2) td:nth-child(2) a');
        $I->see('返信', 'tr:nth-child(2) td:nth-child(2) a');

        $I->expectTo('発言（返信でない）ログの表示が正しいこと');
        $I->dontSee('＞', 'tr:nth-child(4) td:nth-child(2) a');
        $I->see('テストキャラクター(1)', 'tr:nth-child(4) td:nth-child(2)');
        $I->see('「テスト', 'tr:nth-child(4) td:nth-child(2)');
        $I->see('ID:2', 'tr:nth-child(4) td:nth-child(2)');
        $I->dontSee('削除', 'tr:nth-child(4) td:nth-child(2) a');
        $I->see('返信', 'tr:nth-child(4) td:nth-child(2) a');
    }

    public function chatPostNgTest(FunctionalTester $I)
    {
        $I->wantTo('発言のバリデーションを確認');

        $I->amLoggedAs(['id' => 3, 'password' => 'password']);
        $I->amOnPage('/chat');
        $I->seeCurrentUrlEquals('/chat');

        $I->expectTo('必須入力の確認');
        $I->click('発言');
        $I->seeCurrentUrlEquals('/chat');
        $I->see('必須入力です。', '.name');
        $I->see('必須入力です。', '.chat_txt');

        $I->expectTo('入力文字数の確認');
        $value = '';
        for ($i=0; $i<=50; $i++) {
            $value .= 'あ';
        }
        $I->fillField('chat[name]', $value);
        $value = '';
        for ($i=0; $i<=1000; $i++) {
            $value .= 'あ';
        }
        $I->fillField('chat[chat_txt]', $value);
        $I->click('発言');
        $I->seeCurrentUrlEquals('/chat');
        $I->see('50文字以下で入力してください。', '.name');
        $I->see('1000文字以下で入力してください。', '.chat_txt');
    }

    public function chatPostOkTest(FunctionalTester $I)
    {
        $I->wantTo('発言の確認');

        $I->amLoggedAs(['id' => 3, 'password' => 'password']);
        $I->amOnPage('/chat');
        $I->seeCurrentUrlEquals('/chat');

        $I->expectTo('必須入力の確認');
        $I->selectOption('chat[icon]', '1');
        $I->fillField('chat[name]', '発言テスト１');
        $I->fillField('chat[chat_txt]', 'テスト用の発言です');
        $I->click('発言');
        $I->seeCurrentUrlEquals('/chat');

        $I->expectTo('データが登録されていること');
        $I->seeRecord('chats', ['id' => 7, 'own_chat_id' => 7, 'name' => '発言テスト１', 'chat_txt' => 'テスト用の発言です']);

        $I->expectTo('一覧が最新化されていること');
        $I->dontSee('＞', 'tr:nth-child(1) td:nth-child(2) a');
        $I->see('発言テスト１(3)', 'tr:nth-child(1) td:nth-child(2)');
        $I->see('「テスト用の発言です」', 'tr:nth-child(1) td:nth-child(2)');
        $I->see('ID:7', 'tr:nth-child(1) td:nth-child(2)');
        $I->see('削除', 'tr:nth-child(1) td:nth-child(2) a');
        $I->see('返信', 'tr:nth-child(1) td:nth-child(2) a');
    }

    public function chatResNgTest(FunctionalTester $I)
    {
        $I->wantTo('発言のバリデーションを確認');

        $I->amLoggedAs(['id' => 3, 'password' => 'password']);
        $I->amOnPage('/chat');
        $I->seeCurrentUrlEquals('/chat');

        $I->expectTo('必須入力の確認');
        $I->click('返信', 'button');
        $I->seeCurrentUrlEquals('/chat');
        $I->see('返信先が指定されていません。', '.res_id');
        $I->see('必須入力です。', '.name');
        $I->see('必須入力です。', '.chat_txt');

        $I->expectTo('入力文字数の確認');
        $value = '';
        for ($i=0; $i<=50; $i++) {
            $value .= 'あ';
        }
        $I->fillField('res[name]', $value);
        $value = '';
        for ($i=0; $i<=1000; $i++) {
            $value .= 'あ';
        }
        $I->fillField('res[chat_txt]', $value);
        $I->click('返信', 'button');
        $I->seeCurrentUrlEquals('/chat');
        $I->see('50文字以下で入力してください。', '.name');
        $I->see('1000文字以下で入力してください。', '.chat_txt');
    }

    public function chatResOkTest(FunctionalTester $I)
    {
        $I->wantTo('発言の確認');

        $I->amLoggedAs(['id' => 3, 'password' => 'password']);
        $I->amOnPage('/chat');
        $I->seeCurrentUrlEquals('/chat');

        $I->expectTo('必須入力の確認');
        $I->fillField('res[res_id]', '4');
        $I->selectOption('res[icon]', '1');
        $I->fillField('res[name]', '返信テスト１');
        $I->fillField('res[chat_txt]', 'テスト用の返信です');
        $I->click('返信', 'button');
        $I->seeCurrentUrlEquals('/chat');

        $I->expectTo('データが登録されていること');
        $I->seeRecord('chats', ['id' => 8, 'own_chat_id' => 2, 'res_chat_id' => 4, 'res_char_id' => 2, 'name' => '返信テスト１', 'chat_txt' => 'テスト用の返信です']);

        $I->expectTo('一覧が最新化されていること');
        $I->see('＞テスト2(2)（あなたを含めた3人がツリーに参加中）', 'tr:nth-child(1) td:nth-child(2) a');
        $I->see('返信テスト１(3)', 'tr:nth-child(1) td:nth-child(2)');
        $I->see('「テスト用の返信です」', 'tr:nth-child(1) td:nth-child(2)');
        $I->see('ID:8','tr:nth-child(1) td:nth-child(2)');
        $I->see('削除', 'tr:nth-child(1) td:nth-child(2) a');
        $I->see('返信', 'tr:nth-child(1) td:nth-child(2) a');
    }

    public function chatDeleteNgTest(FunctionalTester $I)
    {
        $I->wantTo('不正な発言削除の確認');

        $I->amLoggedAs(['id' => 3, 'password' => 'password']);
        $I->amOnPage('/chat');
        $I->seeCurrentUrlEquals('/chat');

        $I->expectTo('発言IDが未指定の場合、エラーにならないこと');
        $I->submitForm('#chat_delete', ['chat[delete_id]' => '']);
        $I->seeCurrentUrlEquals('/chat');
        $I->seeNumRecords(6, 'chats');

        $I->expectTo('存在しない発言IDを指定しても、エラーにならないこと');
        $I->submitForm('#chat_delete', ['chat[delete_id]' => '999']);
        $I->seeCurrentUrlEquals('/chat');
        $I->seeNumRecords(6, 'chats');

        $I->expectTo('ログインユーザ以外の発言IDを指定しても、データが削除されないこと');
        $I->submitForm('#chat_delete', ['chat[delete_id]' => '3']);
        $I->seeCurrentUrlEquals('/chat');
        $I->seeNumRecords(6, 'chats');
        $I->seeRecord('chats', ['id' => 3, 'deleted_at' => null]);
    }

    public function chatDeleteOkTest(FunctionalTester $I)
    {
        $I->wantTo('自分の発言削除の確認');

        $I->amLoggedAs(['id' => 1, 'password' => 'password']);
        $I->amOnPage('/chat');
        $I->seeCurrentUrlEquals('/chat');

        $I->expectTo('ツリー途中の発言を削除しても、返信ログが途切れないこと');
        $I->submitForm('#chat_delete', ['chat[delete_id]' => '3']);
        $I->seeCurrentUrlEquals('/chat');
        $I->comment('発言が論理削除される');
        $I->seeNumRecords(6, 'chats');
        $I->dontSeeRecord('chats', ['id' => 3, 'deleted_at' => null]);

        $I->comment('削除した発言への返信');
        $I->see('＞テスト1(1)（あなたを含めた3人がツリーに参加中）', 'tr:nth-child(3) td:nth-child(2) a');
        $I->see('テスト２(2)', 'tr:nth-child(3) td:nth-child(2)');
        $I->see('「返信テスト２」', 'tr:nth-child(3) td:nth-child(2)');
        $I->see('ID:4', 'tr:nth-child(3) td:nth-child(2)');
        $I->dontSee('削除', 'tr:nth-child(3) td:nth-child(2) a');
        $I->see('返信', 'tr:nth-child(3) td:nth-child(2) a');
        $I->click('＞テスト1(1)（あなたを含めた3人がツリーに参加中）');
        $I->seeCurrentUrlEquals('/chat/tree/2');

        $I->comment('削除した発言への返信');
        $I->see('＞テスト1(1)', 'tr:nth-child(2) td:nth-child(2)');
        $I->see('テスト２(2)', 'tr:nth-child(2) td:nth-child(2)');
        $I->see('「返信テスト２」', 'tr:nth-child(2) td:nth-child(2)');
        $I->see('ID:4', 'tr:nth-child(2) td:nth-child(2)');
        $I->dontSee('削除', 'tr:nth-child(2) td:nth-child(2) a');
        $I->see('返信', 'tr:nth-child(2) td:nth-child(2) a');

        $I->comment('削除した発言が返信していたログ');
        $I->dontSee('＞', 'tr:nth-child(3) td:nth-child(2) a');
        $I->see('テストキャラクター(1)', 'tr:nth-child(3) td:nth-child(2)');
        $I->see('「テスト', 'tr:nth-child(3) td:nth-child(2)');
        $I->see('ID:2', 'tr:nth-child(3) td:nth-child(2)');
        $I->see('削除', 'tr:nth-child(3) td:nth-child(2) a');
        $I->see('返信', 'tr:nth-child(3) td:nth-child(2) a');

        $I->expectTo('ツリー最初の発言を削除しても、ツリーが消えないこと');
        $I->submitForm('#chat_delete', ['chat[delete_id]' => '2']);
        $I->seeCurrentUrlEquals('/chat');
        $I->comment('発言が論理削除される');
        $I->seeNumRecords(6, 'chats');
        $I->dontSeeRecord('chats', ['id' => 2, 'deleted_at' => null]);

        $I->comment('削除した発言への返信');
        $I->see('＞テスト1(1)（2人がツリーに参加中）', 'tr:nth-child(3) td:nth-child(2) a');
        $I->see('テスト２(2)', 'tr:nth-child(3) td:nth-child(2)');
        $I->see('「返信テスト２」', 'tr:nth-child(3) td:nth-child(2)');
        $I->see('ID:4', 'tr:nth-child(3) td:nth-child(2)');
        $I->dontSee('削除', 'tr:nth-child(3) td:nth-child(2) a');
        $I->see('返信', 'tr:nth-child(3) td:nth-child(2) a');
        $I->click('＞テスト1(1)（2人がツリーに参加中）');
        $I->seeCurrentUrlEquals('/chat/tree/2');

        $I->comment('削除した発言への返信');
        $I->see('＞テスト1(1)', 'tr:nth-child(2) td:nth-child(2)');
        $I->see('テスト２(2)', 'tr:nth-child(2) td:nth-child(2)');
        $I->see('「返信テスト２」', 'tr:nth-child(2) td:nth-child(2)');
        $I->see('ID:4', 'tr:nth-child(2) td:nth-child(2)');
        $I->dontSee('削除', 'tr:nth-child(2) td:nth-child(2) a');
        $I->see('返信', 'tr:nth-child(2) td:nth-child(2) a');

        $I->comment('ツリー参加者からの削除');
        $I->see('テスト2、テスト3', 'p');
        $I->dontSee('テスト1', 'p');
    }
}
