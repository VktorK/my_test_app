@extends('layout.app')

@section('title', 'Products')

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="w-75">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Наименование товара</th>
                    <th scope="col" class="text-center">Цена</th>
                    <th scope="col" class="text-center">Категория товара</th>
                    <th scope="col" class="text-center">Обновить данные</th>
                    <th scope="col" class="text-center">Удалить продукт</th>
                </tr>
                </thead>
                <tbody>
                @if(count($productResource) === 0)
                    <tr>
                        <td colspan="7" class="text-center">Товары не найдены</td>
                    </tr>
                @else
                    @foreach($productResource as $product)
                        <tr>
                            <th scope="row" class="text-center">{{$product['id']}}</th>
                            <td class="text-center" onclick="window.location='{{ route('user.products.show', $product['id']) }}'" style="cursor: pointer;">{{$product['title']}}</td>
                            <td class="text-center" onclick="window.location='{{ route('user.products.show', $product['id']) }}'" style="cursor: pointer;">{{$product['price']}} руб</td>
                            <td class="text-center" onclick="window.location='{{ route('user.products.show', $product['id']) }}'" style="cursor: pointer;">{{$product['category_title']}}</td>
                            <td class="text-center actions">
                                <a href="{{ route('user.products.edit', $product['id']) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Обновить</a>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('user.products.destroy', $product['id']) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этот продукт?');" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" style="cursor: pointer;"><i class="fas fa-trash"></i> Удалить</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        </tbody>
            </table>
            <div class="text-center">
                <a href="{{ route('user.products.create') }}" class="btn btn-success">Добавить новый продукт</a>
            </div>
        </div>
    </div>
@endsection
