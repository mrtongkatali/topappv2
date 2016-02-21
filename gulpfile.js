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

    mix.sass('app.scss')
      .copy('node_modules/jquery/dist/jquery.js','public/js/jquery.js')
      .copy('node_modules/bootstrap/dist/js/bootstrap.min.js','public/js');

    mix.styles([
      'reset.css',
      'onepcssgrid.css',
      'style.css',
      'app.css',
    ],null,'public/css');
    mix.version('public/css/all.css');

    // mix.scripts([
    //   '../../node_modules/jquery-latest/lib/node-jquery-latest.js',
    //   '../../node_modules/bootstrap/dist/js/bootstrap.min.js',
    // ],null,'public/js');
    // mix.version('public/js/all.js');
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
