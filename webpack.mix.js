const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

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

mix.copyDirectory('resources/img/', 'public/img/');

mix.sass('resources/sass/app.scss', 'public/css').options({
  processCssUrls: false,
  precision: 5,
  postCss: [tailwindcss('./tailwind.config.js')],
});

mix.ts('resources/vue/app.ts', 'public/js').vue();