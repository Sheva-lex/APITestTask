let  mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css').vue()
    .sourceMaps();

mix.js('resources/frontend/admin-front/js/app.js', 'public/js/js-admin').minify('public/js/js-admin/app.js')
    .sass('resources/frontend/admin-front/sass/app.scss', 'public/css/css-admin').minify('public/css/css-admin/app.css')
    .copy('resources/frontend/admin-front/fonts', 'public/fonts/admin-fonts')
    .copy('resources/frontend/admin-front/img', 'public/img/img-admin');
