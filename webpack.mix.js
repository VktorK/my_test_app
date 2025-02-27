const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .vue() // Добавьте этот вызов для обработки Vue компонентов
    .sass('resources/sass/app.scss', 'public/css');
