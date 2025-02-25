<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
<h1>Форма ввода данных</h1>

<!-- Вывод сообщения об успешной отправке -->
@if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
    <p>Имя: {{ session('name') }}</p>
    <p>Email: {{ session('email') }}</p>
@endif

<!-- Форма с методом POST -->
<form action="{{ route('submit.form') }}" method="POST">
    @csrf <!-- CSRF-токен для защиты -->

    <!-- Поле для имени -->
    <label for="name">Имя:</label>
    <input type="text" id="name" name="name" required>
    <br><br>

    <!-- Поле для email -->
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br><br>

    <!-- Поле для пароля -->
    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" required>
    <br><br>

    <!-- Кнопка отправки -->
    <button type="submit">Отправить</button>
</form>
</body>
</html>
