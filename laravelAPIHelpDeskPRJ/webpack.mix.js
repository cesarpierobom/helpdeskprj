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
    'resources/assets/js/utilities/scripts.js'
], 'public/js/utilities/scripts.js');

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
    'resources/assets/js/user/create.js'
], 'public/js/user/create.js');

mix.scripts([
    'resources/assets/js/user/index.js'
], 'public/js/user/index.js');

mix.scripts([
    'resources/assets/js/user/edit.js'
], 'public/js/user/edit.js');





 /**
 * 
 * CHAMADO URGENCIA
 */
mix.scripts([
    'resources/assets/js/chamado_urgencia/create.js'
], 'public/js/chamado_urgencia/create.js');

mix.scripts([
    'resources/assets/js/chamado_urgencia/index.js'
], 'public/js/chamado_urgencia/index.js');

mix.scripts([
    'resources/assets/js/chamado_urgencia/edit.js'
], 'public/js/chamado_urgencia/edit.js');



 /**
 * 
 * DEPARTAMENTO
 */
mix.scripts([
    'resources/assets/js/departamento/create.js'
], 'public/js/departamento/create.js');

mix.scripts([
    'resources/assets/js/departamento/index.js'
], 'public/js/departamento/index.js');

mix.scripts([
    'resources/assets/js/departamento/edit.js'
], 'public/js/departamento/edit.js');




 /**
 * 
 * INTERACAO
 */





 /**
 * 
 * SERVICO
 */
mix.scripts([
    'resources/assets/js/servico/create.js'
], 'public/js/servico/create.js');

mix.scripts([
    'resources/assets/js/servico/index.js'
], 'public/js/servico/index.js');

mix.scripts([
    'resources/assets/js/servico/edit.js'
], 'public/js/servico/edit.js');



/**
 * 
 * SUPORTE GRUPO
 */
mix.scripts([
    'resources/assets/js/suporte_grupo/create.js'
], 'public/js/suporte_grupo/create.js');

mix.scripts([
    'resources/assets/js/suporte_grupo/index.js'
], 'public/js/suporte_grupo/index.js');

mix.scripts([
    'resources/assets/js/suporte_grupo/edit.js'
], 'public/js/suporte_grupo/edit.js');



/**
 * 
 * USUARIO GRUPO
 */
mix.scripts([
    'resources/assets/js/usuario_grupo/create.js'
], 'public/js/usuario_grupo/create.js');

mix.scripts([
    'resources/assets/js/usuario_grupo/index.js'
], 'public/js/usuario_grupo/index.js');

mix.scripts([
    'resources/assets/js/usuario_grupo/edit.js'
], 'public/js/usuario_grupo/edit.js');




 /**
 * 
 * USUARIO
 */
mix.scripts([
    'resources/assets/js/user/create.js'
], 'public/js/user/create.js');

mix.scripts([
    'resources/assets/js/user/index.js'
], 'public/js/user/index.js');

mix.scripts([
    'resources/assets/js/user/edit.js'
], 'public/js/user/edit.js');



 /**
 * 
 * PERFIL
 */
mix.scripts([
    'resources/assets/js/role/create.js'
], 'public/js/role/create.js');

mix.scripts([
    'resources/assets/js/role/index.js'
], 'public/js/role/index.js');

mix.scripts([
    'resources/assets/js/role/edit.js'
], 'public/js/role/edit.js');



mix.scripts([
    'resources/assets/js/reports/geral.js'
], 'public/js/reports/geral.js');


mix.browserSync('homestead.localdev');