@extends('layouts.app')

@section('content')
    
    @if (Auth::check())
        <h1>タスク一覧</h1>
        @if(count($tasks) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>task</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{!! link_to_route('tasks.show', $task->id, ['task' => $task->id]) !!}</td>
                        <td>{{ $task->content }}</td>
                        <td>{{ $task->status }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{-- ページネーションのリンク --}}
            {{ $tasks->links() }}
        @endif
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the TaskList</h1>
                    {{-- ユーザ登録ページへのリンク --}}
                    {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection