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

mix.autoload({
        jquery: ['$', 'window.jQuery', 'jQuery'],
        'popper.js/dist/umd/popper.js': ['Popper']
    })
	.js('resources/js/app.js', 'public/js').version()
	.js('resources/js/frontend.js', 'public/js').version()
	.js('resources/js/langs/langs.js', 'public/js').version()
	.js('resources/js/userAccount.js', 'public/js').version()
	.js('resources/js/backend.js', 'public/js').version()
	.js('resources/js/burgers.js', 'public/js').version()
	
	.postCss('resources/css/main.css', 'public/css', [
	  require('tailwindcss'),
	]).version()
	
	// .styles(['public/css/front-end/home.css', 
	// 		 'public/css/front-end/home-m.css',
	// 		 'public/css/front-end/home-images.css',
	// 		 ], 'public/css/home.css').version()
	// .styles(['public/css/front-end/all.css', 
	// 		 ], 'public/css/all.css').version()
	// .styles(['public/css/front-end/diamond.css', 
	// 		 ], 'public/css/diamond.css').version()
   .styles('public/css/color.scss', 'public/css').version()
   .sass('resources/sass/app.scss', 'public/css').version();