@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2 class="text-center mb-4">Логін</h2>
            <div class="form-group">
                <label for="email">Email адреса</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Введіть email" required>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Пароль" required>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            @if ($errors->has('error'))
                <div class="invalid-feedback d-block">{{ $errors->first('error') }}</div>
            @endif
            <button type="submit" class="btn btn-primary btn-block">Увійти</button>
        </form>
    </div>
@endsection
