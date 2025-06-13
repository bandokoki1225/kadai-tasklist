@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2>id = {{ $Task->id }} のタスク詳細ページ</h2>
    </div>

    <table class="table w-full my-4">
        <tr>
            <th>id</th>
            <td>{{ $Task->id }}</td>
        </tr>

        <tr>
            <th>タスク</th>
            <td>{{ $Task->content }}</td>
        </tr>

        <tr>
            <th>ステータス</th>
            <td>{{ $Task->status }}</td>
        </tr>
    </table>
    {{-- タスク編集ページへのリンク --}}
    <a class="btn btn-outline" href="{{ route('Tasks.edit', $Task->id) }}">このタスクを編集</a>
    {{-- タスク削除フォーム --}}
    <form method="POST" action="{{ route('Tasks.destroy', $Task->id) }}" class="my-2">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-error btn-outline"
            onclick="return confirm('id = {{ $Task->id }} のタスクを削除します。よろしいですか？')">削除</button>
    </form>
@endsection