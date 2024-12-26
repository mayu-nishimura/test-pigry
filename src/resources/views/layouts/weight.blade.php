<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/weight.css') }}" />
</head>

<body>
    <div class="container">
        <header>
            <nav>
                <div>
                    <a href="/">PiGLy</a>
                </div>
                <div>
                    <a href="{{ route('weightTargetForm') }}">目標体重設定</a>
                </div>
                <div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">ログアウト</button>
                    </form>
                </div>
            </nav>
            <h1>@yield('header')</h1>
        </header>
        
        <main>
            @yield('content')
            <!-- 共通のボタン -->
             <div class="actions">
                <a href="{{ route('weightManagement') }}" class="btn btn-secondary">戻る</a>
                <button form="updateForm" type="submit" class="btn btn-primary">更新</button>
            </div>
        </main>
    </div>
</body>
</html>
