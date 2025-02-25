<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .actions {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="w-75">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">Название товара</th>
                <th scope="col" class="text-center">Описание товара</th>
                <th scope="col" class="text-center">Цена</th>
                <th scope="col" class="text-center">Категория товара</th>
                <th scope="col" class="text-center">Обновить данные</th>
                <th scope="col" class="text-center">Удалить продукт</th>
            </tr>
            </thead>
            <tbody>
            @foreach($productResource as $product)
            <tr>
                <th scope="row" class="text-center">{{$product['id']}}</th>
                <td class="text-center">{{$product['title']}}</td>
                <td class="text-center">{{$product['description']}}</td>
                <td class="text-center">{{$product['price']}} руб</td>
                <td class="text-center">{{$product['category_title']}}</td>
                <td class="text-center actions">
                    <a href="{{ route('user.products.edit', $product['id']) }}" class="btn btn-primary btn-sm">Обновить</a>
                </td>
                <td>
                    <button class="btn btn-danger btn-sm">Удалить</button>
                </td>
            </tr>
            @endforeach
            </tbody>

        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
