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

mix.js('resources/assets/js/bootstrap.js', 'public/js')

mix.styles([
    'node_modules/bootstrap/dist/css/bootstrap.min.css',
    'resources/assets/css/article.css',
    'resources/assets/css/config.css',
    'resources/assets/css/contact.css',
    'resources/assets/css/equipe.css',
    'resources/assets/css/listing.css',
    'resources/assets/css/panier.css',
    'resources/assets/css/profil.css',
    'resources/assets/css/recherche.css',
    'resources/assets/css/style.css'
], 'public/css/all.css');