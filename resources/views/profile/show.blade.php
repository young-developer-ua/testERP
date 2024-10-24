@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center mb-4">Ваш Профіль</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Особиста інформація</h5>
                <p><strong>Ім'я:</strong> {{ $userData['name'] }}</p>
                <p><strong>Email:</strong> {{ $userData['email'] }}</p>
                <p><strong>Роль:</strong> {{ $userData['role'] }}</p>
                @if($userData['teamLead'])
                    <p><strong>Тімлід:</strong> {{ $userData['teamLead'] }}</p>
                @endif

                <a href="{{ route('profile.edit', $userData['id']) }}" class="btn btn-primary">Редагувати профіль</a>
            </div>
        </div>
    </div>
@endsection
