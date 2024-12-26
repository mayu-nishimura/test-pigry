@extends('layouts.weight')

@section('title', 体重管理')
@section('header', 体重管理')

@section('content')
    <div>
        <div>
            <label for="weight">目標体重</label>
            <div>{{ $weightTarget }}</div>
        </div>
        <div>
            <label for="weight">目標まで</label>
            <div>{{ $weightTarget - $currentWeight }}</div>
        </div>
        <div>
            <label for="weight">最新体重</label>
            <div>{{ $currentWeight }}</div>
        </div>
    </div>

    <div>
        <div><input id="start_date" type="date" placeholder="開始日"></div>
        <div>~</div>
        <div><input id="end_date" type="date" placeholder="終了日"></div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDataModal">データ追加</button>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>日付</th>
                <th>体重</th>
                <th>食事摂取カロリー</th>
                <th>運動時間</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($weightLogs as $log)
            <tr>
                <td>{{ \Carbon\Carbon::parse($log->logged_at)->format('Y/m/d') }}</td>
                <td>{{ number_format($log->weight, 1) }} kg</td>
                <td>{{ $log->calories }} cal</td>
                <td>{{ \Carbon\Carbon::parse($log->exercise_time)->format('H:i') }}</td>
                <td>
                    <a href="{{ route('editWeightLog', ['id' => $log->id]) }}" class="btn btn-secondary">
                        <img src="/path/to/pencil-icon.png" alt="編集">
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $weightLogs->links() }}
    </div>

    <!-- モーダルウィンドウ -->
    <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataModalLabel">Weight Logを追加</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="storeForm" method="POST" action="{{ route('storeWeightLog') }}">
                        @csrf
                        <div>
                            <label for="logged_at">日付</label>
                            <label for="logged_at">必須</label>
                            <input id="logged_at" type="date" name="logged_at" required>
                        </div>

                        <div>
                            <label for="weight">体重</label>
                            <label for="weight">必須</label>
                            <input id="weight" type="number" step="0.1" name="weight" required>
                            <div>kg</div>
                        </div>

                        <div>
                            <label for="calories">摂取カロリー</label>
                            <label for="calories">必須</label>
                            <input id="calories" type="number" step="0.1" name="calories" required>
                            <div>cal</div>
                        </div>

                        <div>
                            <label for="exercise_time">運動時間</label>
                            <label for="logged_at">必須</label>
                            <input id="exercise_time" type="time" name="exercise_time" required>
                        </div>

                        <div>
                            <label for="exercise_content">運動内容</label>
                            <input id="exercise_content" type="text" name="exercise_content" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">戻る</button>
                            <button type="submit" class="btn btn-primary">登録</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@endsection
