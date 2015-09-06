var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix
        .sass('app.scss')
        .scripts([
            '../../../node_modules/fullpage.js/jquery.fullPage.min.js',
            'home/home.js'
        ], 'public/js/home.js')
        .scripts([
            '../../../node_modules/d3/d3.min.js',
            '../../../node_modules/angular/angular.min.js'
        ], 'public/js/app.js')
    ;
    //mix.bower();
});
