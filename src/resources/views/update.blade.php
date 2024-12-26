@extends('layouts.weight')

@section('title', 情報更新')
@section('header', 情報更新')

@section('content')
    <h1>Weight Log</h1>
    
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

    <<form id="updateForm" method="POST" action="{{ route('updateWeightLog', ['id' => $weightLog->id]) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="logged_at">日付</label>
            <input id="logged_at" type="date" name="logged_at" value="{{ date('Y-m-d') }}" required>
            <div class="form__error">
                @error('logged_at')
                <span>{{ $message }}</span>
                @enderror </div>
        </div>

        <div>
            <label for="weight">体重</label>
            <input id="weight" type="number" step="0.1" name="weight" value="{{ $weightLog->weight }}" required>
            <div>kg<kg>
            <div class="form__error">
                @error('weight')
                <span>{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div>
            <label for="calories">摂取カロリー</label>
            <input id="calories" type="number" step="0.1" name="calories" value="{{ $caloriesLog->calories }}" required>
            <div>cal<kg>
            <div class="form__error">
                @error('calories')
                <span>{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div>
            <label for="exercise_time">運動時間</label>
            <input id="exercise_time" type="time" name="exercise_time" value="{{ old('exercise_time', $exercise_timeLog->exercise_time) }}" required>
            <div class="form__error">
                @error('exercise_time')
                <span>{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div>
            <label for="exercise_content">運動内容</label>
            <input id="exercise_content" type="number" step="0.1" name="exercise_content" value="{{ $exercise_contentLog->exercise_content }}" required>
            <div class="form__error">
                @error('exercise_content')
                <span>{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="actions">
            <a href="{{ route('weightManagement') }}" class="btn btn-danger">
                <img src="/path/to/trash-icon.png" alt="削除">
            </a>
       
            <a href="{{ route('weightManagement') }}" class="btn btn-secondary">戻る</a>
            <button form="updateForm" type="submit" class="btn btn-primary">更新</button>
            <form id="deleteForm" method="POST" action="{{ route('deleteWeightLog', ['id' => $weightLog->id]) }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <img src="/path/to/trash-icon.png" alt="削除">
                </button>
            </form>
        </div>
    </form>
</body>
@endsection
