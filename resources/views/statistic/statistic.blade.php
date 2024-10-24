@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">
            @if(auth()->user()->role->id === \App\Enums\RoleEnum::BUYER->value)
                Ваша статистика
            @else
                Статистика користувачів
            @endif
        </h1>

        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
            <tr>
                @if(auth()->user()->role->id === \App\Enums\RoleEnum::BUYER->value)
                    <th>Ім'я користувача</th>
                @else
                    <th>#</th>
                    <th>Ім'я користувача</th>
                    <th>Роль</th>
                @endif
                <th>Кількість створених товарів</th>
                <th>Середня ціна товарів</th>
            </tr>
            </thead>
            <tbody>
            @if(auth()->user()->role->id === \App\Enums\RoleEnum::BUYER->value)
                <tr>
                    <td>{{ $statistics[0]['name'] }}</td>
                    <td>{{ $statistics[0]['products_count'] }}</td>
                    <td>{{ $statistics[0]['average_price'] }}</td>
                </tr>
            @else
                @foreach($statistics as $statistic)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $statistic['name'] }}</td>
                        <td>{{ $statistic['role'] }}</td>
                        <td>{{ $statistic['products_count'] }}</td>
                        <td>{{ $statistic['average_price'] }}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
