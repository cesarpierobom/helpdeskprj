let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.scripts([
    'resources/assets/js/chamado_categoria/create.js'
], 'public/js/chamado_categoria/create.js');

mix.scripts([
    'resources/assets/js/chamado_categoria/index.js'
], 'public/js/chamado_categoria/index.js');

mix.scripts([
    'resources/assets/js/organizacao/create.js'
], 'public/js/organizacao/create.js');

mix.scripts([
    'resources/assets/js/organizacao/index.js'
], 'public/js/organizacao/index.js');


mix.styles([
    'resources/assets/css/style.css',
], 'public/css/all.css');



mix.browserSync();