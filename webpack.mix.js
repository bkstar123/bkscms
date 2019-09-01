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
    .sourceMaps()
    .sass('resources/sass/app.scss', 'public/css')
    .styles([
   	    'node_modules/admin-lte/plugins/fontawesome-free/css/all.min.css',
   	    'node_modules/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
   	], 'public/css/plugins.css')
    .copy('node_modules/admin-lte/plugins/fontawesome-free/webfonts', 'public/webfonts');

if (mix.inProduction()) {
    mix.version();
}