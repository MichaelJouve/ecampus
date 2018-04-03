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
    'public/css/article.css',
    'public/css/config.css',
    'public/css/contact.css',
    'public/css/equipe.css',
    'public/css/listing.css',
    'public/css/panier.css',
    'public/css/profil.css',
    'public/css/recherche.css',
    'public/css/style.css',
], 'public/css/all.css');