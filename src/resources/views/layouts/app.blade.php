<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COACHTECH</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <div class="container">
            <div class="header-left">
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="COACHTECH">
                </a>
            </div>
            <div class="header-right">
                <form action="#" method="GET" class="search-form">
                    @csrf
                    <input type="text" name="search" placeholder="なにをお探しですか？">
                </form>
                @auth
                    <a href="/logout">ログアウト</a>
                    <a href="/mypage">マイページ</a>
                @endauth
                @guest
                    <a href="/login">ログイン</a>
                    <a href="/register">会員登録</a>
                @endguest
                <a href="/sell" class="btn btn-primary">出品</a>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 COACHTECH</p>
        </div>
    </footer>
</body>
</html>
