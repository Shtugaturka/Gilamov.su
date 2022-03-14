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
// App Other
mix.sass('resources/sass/app.scss', 'public/css');

// Work
mix.sass('resources/sass/work.scss', 'public/css');

// App Other
mix.js([
    'resources/js/app.js',
    'public/js/custom.js'
], 'public/js/app.js');

// Category
mix.js([
    'resources/js/category.js',
    'public/js/category/custom.js'
], 'public/js/category.js');

// Work
mix.js([
    'resources/js/work.js',
    'public/js/work/custom.js'
], 'public/js/work.js');

if (mix.inProduction()) {
    mix.version();
}

mix.disableNotifications();
