# お問い合わせフォーム

## 環境構築
Dockerビルド
1. git clone git@github.com:Ruchida123/confirmation-test.git
2. docker-compose up -d --build

※MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-compose.ymlを編集してください。

Laravel環境構築
1. docker-compose exec php bash
2. composer install
3. .env.exampleファイルから.envを作成し、環境変数を変更
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed

## 使用技術(実行環境)
- PHP 7.4.9
- Laravel 8.83.8
- MySQL 10.3.39

## ER図
![](2024-04-02-22-36-21.png)

## URL
- 開発環境：http://localhost/
- phpMyAdmin：http://localhost:8080/
