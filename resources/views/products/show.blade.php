@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Інформація про товар: {{ $productData['name'] }}
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Назва товару: {{ $productData['name'] }}</h5>
                        <p class="card-text">Опис: {{ $productData['description'] }}</p>
                        <p class="card-text">Ціна: {{ $productData['price'] }} грн</p>
                        <p class="card-text">Дата створення: {{ $productData['created_at'] }}</p>
                        <p class="card-text">Останнє оновлення: {{ $productData['updated_at'] }}</p>

                        <div class="mt-3">
                            <a href="{{ route('products.edit', $productData['id']) }}" class="btn btn-primary">Редагувати</a>

                            <form action="{{ route('products.destroy', $productData['id']) }}" method="POST" class="d-inline" onsubmit="return confirm('Ви впевнені, що хочете видалити цей товар?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Видалити</button>
                            </form>

                            <a href="{{ route('products.index') }}" class="btn btn-secondary">Повернутись до списку товарів</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
