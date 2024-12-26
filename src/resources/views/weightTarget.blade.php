@extends('layouts.weight')

@section('title', 目標体重')
@section('header', 目標体重')

@section('content')
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
        </main>
    </div>
</body>
@endsection

