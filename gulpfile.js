var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    var bootstrapPath = 'node_modules/bootstrap-sass/assets';
    var fontAwesomePath = 'node_modules/font-awesome';
    mix.sass('app.scss')
        .browserify('app.js')
        .copy(bootstrapPath + '/fonts', 'public/fonts')
        .copy(fontAwesomePath + '/fonts', 'public/fonts/fontawesome');
    
});
