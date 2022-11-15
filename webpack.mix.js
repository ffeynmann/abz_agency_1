const mix = require('laravel-mix');
const path = require("path");


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


mix
    .alias({
        '@spa': path.join(__dirname, 'resources', 'src', 'spa')
    })
    .ts('resources/src/spa/app.ts', 'public/spa/js').vue({
    version: 3,
    extractStyles: 'public/spa/css/styles.css',
})
    .sourceMaps()
    .version();

mix.sass('resources/src/spa/scss/styles.scss', 'public/spa/css').sourceMaps().version();

