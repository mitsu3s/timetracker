# Time Vault

## Requirement

| Language/FrameWork | Version |
| :----------------- | ------: |
| PHP                |   8.2.4 |
| Laravel            | 10.32.1 |
| Laravel Breeze     |  1.26.1 |
| MySQL              |  5.7.39 |
| npm                |   9.4.0 |
| Tailwind CSS       |  3.1.10 |
| Vite               |   4.5.0 |

## Usage

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
$ cp .env.example .env

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
