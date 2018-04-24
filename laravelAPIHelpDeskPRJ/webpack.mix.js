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

mix.styles([
    'resources/assets/css/style.css',
], 'public/css/all.css');

/**
 * 
 * CHAMADO CATEGORIA
 */
mix.scripts([
    'resources/assets/js/chamado_categoria/create.js'
], 'public/js/chamado_categoria/create.js');

mix.scripts([
    'resources/assets/js/chamado_categoria/edit.js'
], 'public/js/chamado_categoria/edit.js');

mix.scripts([
    'resources/assets/js/chamado_categoria/index.js'
], 'public/js/chamado_categoria/index.js');


/**
 * 
 * ORGANIZACAO
 */
mix.scripts([
    'resources/assets/js/organizacao/create.js'
], 'public/js/organizacao/create.js');

mix.scripts([
    'resources/assets/js/organizacao/index.js'
], 'public/js/organizacao/index.js');

mix.scripts([
    'resources/assets/js/organizacao/edit.js'
], 'public/js/organizacao/edit.js');


/**
 * 
 * CHAMADO FEEDBACK
 */
mix.scripts([
    'resources/assets/js/chamado_feedback/create.js'
], 'public/js/chamado_feedback/create.js');

mix.scripts([
    'resources/assets/js/chamado_feedback/index.js'
], 'public/js/chamado_feedback/index.js');

mix.scripts([
    'resources/assets/js/chamado_feedback/edit.js'
], 'public/js/chamado_feedback/edit.js');



/**
 * 
 * CHAMADO PRIORIDADE
 */
mix.scripts([
    'resources/assets/js/chamado_prioridade/create.js'
], 'public/js/chamado_prioridade/create.js');

mix.scripts([
    'resources/assets/js/chamado_prioridade/index.js'
], 'public/js/chamado_prioridade/index.js');

mix.scripts([
    'resources/assets/js/chamado_prioridade/edit.js'
], 'public/js/chamado_prioridade/edit.js');


/**
 * 
 * CHAMADO SITUACAO
 */
mix.scripts([
    'resources/assets/js/chamado_situacao/create.js'
], 'public/js/chamado_situacao/create.js');

mix.scripts([
    'resources/assets/js/chamado_situacao/index.js'
], 'public/js/chamado_situacao/index.js');

mix.scripts([
    'resources/assets/js/chamado_situacao/edit.js'
], 'public/js/chamado_situacao/edit.js');


 /**
 * 
 * CHAMADO
 */

mix.scripts([
    'resources/assets/js/chamado/create.js'
], 'public/js/chamado/create.js');

mix.scripts([
    'resources/assets/js/chamado/index.js'
], 'public/js/chamado/index.js');

mix.scripts([
    'resources/assets/js/chamado/edit.js'
], 'public/js/chamado/edit.js');



 /**
 * 
 * CHAMADO SLA
 */
mix.scripts([
    'resources/assets/js/chamado_sla/create.js'
], 'public/js/chamado_sla/create.js');

mix.scripts([
    'resources/assets/js/chamado_sla/index.js'
], 'public/js/chamado_sla/index.js');

mix.scripts([
    'resources/assets/js/chamado_sla/edit.js'
], 'public/js/chamado_sla/edit.js');





 /**
 * 
 * CHAMADO URGENCIA
 */




 /**
 * 
 * DEPARTAMENTO
 */





 /**
 * 
 * INTERACAO
 */





 /**
 * 
 * SERVICO
 */




/**
 * 
 * SUPORTE GRUPO
 */




/**
 * 
 * USUARIO GRUPO
 */





 /**
 * 
 * USUARIO
 */




mix.browserSync();