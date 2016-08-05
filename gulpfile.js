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
	var bpath = 'node_modules/bootstrap-sass/assets';
	var jqueryPath = 'bower_components/jquery';
    mix.sass('app.scss')
    	.copy('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js', 'public/js')
    	.copy('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css', 'public/css')
    	.copy('bower_components/moment/min/moment.min.js', 'public/js')
    	.copy('bower_components/moment/min/locales.min.js', 'public/js')
    	.copy(jqueryPath + '/dist/jquery.min.js', 'public/js')
    	.copy(bpath + '/javascripts/bootstrap.min.js', 'public/js')
    	.copy(bpath + '/fonts', 'public/fonts'); 
});
