@extends('layouts.app')

@section('title', 'PiGLy')

@section('header', '新規会員登録')

@section('content')
    <p>STEP1 アカウント情報の登録</p>
    
    <!-- バリデーションエラーメッセージの表示 -->
     @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label for="name">お名前:</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
            <div class="form__error">
                @error('name')
                <span>{{ $message }}</span> 
                @enderror
            </div>
        </div>

        <div>
            <label for="email">メールアドレス:</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            <div class="form__error">
                @error('email')
                <span>{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div>
            <label for="password">パスワード:</label>
            <input id="password" type="password" name="password" required>
            <div class="form__error">
                @error('password')
                <span>{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div>
            <button type="submit">次に進む</button>
        </div>
    </form>

    <div>
        <a href="{{ route('loginForm') }}">ログインはこちら</a>
    </div>
@endsection
