let mix = require('laravel-mix');

mix.disableNotifications();
mix.setPublicPath('source/assets/build');

mix.sass('source/_assets/sass/main.scss', 'css/main.css')
    .sourceMaps()
    .sass('source/_assets/sass/cv.scss', 'css/cv.css')
    .sourceMaps()
    .copyDirectory('./node_modules/@fortawesome/fontawesome-free/webfonts', 'source/assets/build/fonts/font-awesome')
    .version();
