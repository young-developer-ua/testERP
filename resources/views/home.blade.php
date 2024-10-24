@extends('layouts.app')

@section('content')
    <div class="container text-center mt-5">
        <h1>Ласкаво просимо до ERP системи</h1>
        <div class="mt-4">
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Логін</a>
            <a href="{{ route('register') }}" class="btn btn-success btn-lg">Реєстрація</a>
        </div>
    </div>
@endsection
