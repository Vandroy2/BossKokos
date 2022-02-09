const mix = require('laravel-mix');

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
    .vue()
    .sass('resources/sass/app.scss', 'public/css');

mix.js('resources/adminAssets/js/app.js', 'public/adminAssets/js').sass('resources/adminAssets/sass/main.scss', 'public/adminAssets/css')
    .sourceMaps(true, 'source-map');
mix.copyDirectory('vendor/tinymce/tinymce', 'public/js/tinymce');
