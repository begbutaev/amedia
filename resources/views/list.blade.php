@extends('layouts.master')

@section('content')

    <div class="col-md-12">
        <h1>Заявки</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    id
                </th>
                <th>
                    Тема
                </th>
                <th>
                    Сообщение
                </th>
                <th>
                    Имя
                </th>
                <th>
                    Почта
                </th>
                <th>
                    Ссылка на файл
                </th>
                <th>
                    Время создания
                </th>
                <th>
                    Статус заявки
                </th>
            </tr>
            @foreach($appeals as $appeal)
                <tr>
                    <td>{{ $appeal->id}}</td>
                    <td>{{ $appeal->subject }}</td>
                    <td>{{ $appeal->message }}</td>
                    <td>{{ $appeal->user->name }}</td>
                    <td>{{ $appeal->user->email }}</td>
                    <td><a href="{{ Storage::url($appeal->file)}}">Download File</a></td>
                    <td>{{ $appeal->created_at }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            @if($appeal->answered===0)
                                <form action="{{ route('answered', $appeal) }}" method="POST">
                                    @csrf

                                    <input class="btn btn-success" type="submit" value="Ответил"></form>
                            @else
                                Отмечено
                            @endif

                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $appeals->links() }}
    </div>
@endsection
