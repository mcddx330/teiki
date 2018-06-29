# 定期ゲームサンプル

定期ゲーム作りたいけどキャラクター登録からしてどうすればいいかわからん。みたいな話を聞いたので、汎用性高そうな新規登録・ログイン・チャット画面だけざくっと。

- 戦闘とか成長とか探索のシステムは定期ゲームごとに一番個性が出ると思うので、サンプル作るかどうかは怪しいです。
- ソースコード全公開しておくので、好き勝手に中身見ちゃってください。
- このプロジェクトを丸ごとそのまま運用で使われる想定はしていないです。後からmigrationファイル書き換えとかやっちゃうのでDBのデータがご臨終する。

フレームワークにLaravel、テストツールにCodeceptionを使用しています。


## 使い方メモ

XAMPP環境で動作確認済。

- コマンドラインからteikiディレクトリ直下に移動
- Composer をインストール
- コマンドラインから `composer install` を実行（Laravelで使うファイルがvenderディレクトリの下にインストールされる）
- コマンドラインから `cp .env.example .env` を実行（.envファイルがコピーされる）
- .envファイルの中を修正（下記はローカル環境で、mysqlにteikiデータベースとteiki_adminユーザを追加した場合の例）
```
APP_NAME=定期ゲームサンプル
APP_ENV=local
APP_KEY=base64:3qMEVDQ+Bsrk1fNr9Rjg1zzJ+fhfEnX76nZjxkxiKCw=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=teiki
DB_USERNAME=teiki_admin
DB_PASSWORD=12345
```
- コマンドラインから `php artisan migrate` を実行（データベースに必要なテーブルが作成される）
- xampp/apache/conf/httpd.confファイルを修正（下記はローカル環境で、Cドライブ直下にxamppをインストールした場合の例）
```
<VirtualHost *:80>
DocumentRoot "C:/xampp/htdocs/teiki/public"
ServerName dev.laravel.teiki
</VirtualHost>
```
- ブラウザから`http://localhost`へアクセスして、ページが表示されればOK