@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2 class="text-lg">タスク 一覧</h2>
    </div>

    @if (isset($Tasks))
        <table class="table table-zebra w-full my-4">
            <thead>
                <tr>
                    <th>id</th>
                    <th>タスク</th>
                    <th>ステータス</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Tasks as $Task)
                <tr>
                    <td><a class="link link-hover text-info" href="{{ route('Tasks.show', $Task->id) }}">{{ $Task->id }}</a></td>
                    <td>{{ $Task->content }}</td>
                    <td>{{ $Task->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    {{-- タスク作成ページへのリンク --}}
    <a class="btn btn-primary" href="{{ route('Tasks.create') }}">新規タスクの投稿</a>
@endsection