# Time Vault

**Time Vault** は、開始・終了日時をもとに自動的に状態を振り分けるスケジュール管理アプリケーションです。  
スケジュールは4種類に分類され、一目で状態を把握することができます。

## Feature

### スケジュールの分類

- **approaching**: 24 時間以内に開始予定のスケジュール
- **upcoming**: 24 時間以上先に開始予定のスケジュール
- **ongoing**: 現在進行中のスケジュール
- **done**: 既に終了したスケジュール

### 表示モード

- **Approaching / Upcoming**: これから始まるスケジュールを一覧で確認  
- **Weekly**: 1 週間分のスケジュールを俯瞰し、スケジュールの配置を把握  
- **Monthly**: 1 ヶ月分のスケジュールを確認  

### スケジュールの作成・編集

- 新しいスケジュールの作成はいつでも可能。スケジュール名・日時・詳細などを入力するだけで反映  
- 既存スケジュールの開始日時や終了日時の変更もシンプルな操作で完了  


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
