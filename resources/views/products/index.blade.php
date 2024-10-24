@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Список товарів</h1>
            <a href="{{ route('products.create') }}" class="btn btn-success">Створити товар</a>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Назва товару</th>
                <th>Опис товару</th>
                <th>Ціна</th>
                <th>Дії</th>
            </tr>
            </thead>
            <tbody>
            @foreach($productsData as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['description'] }}</td>
                    <td>{{ $product['price'] }} грн</td>
                    <td class="d-flex">
                        <a href="{{ route('products.show', $product['id']) }}" class="btn btn-info btn-sm mr-2">Переглянути</a>
                        <a href="{{ route('products.edit', $product['id']) }}" class="btn btn-primary btn-sm mr-2">Редагувати</a>
                        <form action="{{ route('products.destroy', $product['id']) }}" method="POST" onsubmit="return confirm('Ви впевнені, що хочете видалити цей товар?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Видалити</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
