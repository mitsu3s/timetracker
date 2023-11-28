## Time Vault

### プロジェクトのクローン

```zsh
$ git clone git@github.com:mitsu3s/timevault.git
```

### 依存関係のインストール

```zsh
$ composer install

$ npm install -D tailwindcss postcss autoprefixer
```

### env ファイルの設定

```zsh
# .envファイルの作成
$ touch .env

# APP_KEYの生成
$ php artisan key:generate

# .envに記述
APP_NAME=TimeVault

DB_DATABASE=timevault
DB_PASSWORD=root
```

### データベースの設定

```zsh
# マイグレーションの実行
$ php artisan migrate
```

### アプリケーションの起動

```zsh
# Viteサーバー起動
$ npm run dev

# Laravelサーバー起動
$ php artisan serve --host=localhost

```
