@extends('layouts.app')

@section('title', 'PigLy')

@section('header', '新規会員登録')

@section('content')
<h3>STEP2 体重データの入力</h3>

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

    <form method="POST" action="{{ route('storeInitialWeight') }}">
        @csrf
        <div>
            <label for="initial_weight">現在の体重:</label>
            <input id="initial_weight" type="number" step="0.1" name="initial_weight" value="{{ old('initial_weight') }}" required>
            <div>kg</div>
            <div class="form__error">
                @error('initial_weight')
                <span>{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div>
            <label for="target_weight">目標の体重:</label>
            <input id="target_weight" type="number" step="0.1" name="target_weight" value="{{ old('target_weight') }}" required>
            <div>kg</div>
            <div class="form__error">
                @error('target_weight')
                <span>{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div>
            <button type="submit">アカウント作成</button>
        </div>
    </form>
@endsection
