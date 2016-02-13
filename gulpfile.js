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
    mix.sass('app.scss');

    mix.styles([
      'app.css',
    ],null,'public/css');

    mix.version('public/css/all.css');

    /*
    mix.styles([
      'vendor/normalize.css',
      'app.css'
    ], null(output directory or filename),'public/css'(basedirectory) ); // to locate from other directory (not in the default w/c is resources/css)
    */

    /* Versioning

      mix.version('public/css/all.css')
      //html
      <link rel="stylesheet" href="{{ elixir('css/all.css'); }}">

    */
});
