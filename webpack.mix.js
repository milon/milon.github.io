let mix = require('laravel-mix');
let build = require('./tasks/build.js');

mix.disableSuccessNotifications();
mix.setPublicPath('source/assets/build');

mix.sass('source/_assets/sass/main.scss', 'css/main.css')
    .sourceMaps()
    .sass('source/_assets/sass/cv.scss', 'css/cv.css')
    .sourceMaps()
    .sass('source/_assets/sass/resume.scss', 'css/resume.css')
    .sourceMaps()
    .version();
