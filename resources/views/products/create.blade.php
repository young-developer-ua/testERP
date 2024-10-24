@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Створити товар</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Назва товару</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="description">Опис товару</label>
                <textarea name="description" class="form-control" id="description" rows="3" required>{{ old('description') }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="price">Ціна</label>
                <input type="number" name="price" class="form-control" id="price" value="{{ old('price') }}" required step="0.01">
            </div>

            <button type="submit" class="btn btn-success">Створити</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Назад</a>
        </form>
    </div>
@endsection