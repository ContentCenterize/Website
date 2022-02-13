const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/blog.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .postCss('resources/css/blog.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .postCss('resources/css/blog/mobile.css', 'public/css/blog', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .postCss('resources/css/blog/style.css', 'public/css/blog', [
        require('postcss-import'),
        require('tailwindcss'),
    ]);

if (mix.inProduction()) {
    mix.version();
}
