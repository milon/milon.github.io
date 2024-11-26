let mix = require('laravel-mix');
require('laravel-mix-jigsaw');

mix.disableNotifications();
mix.setPublicPath('source/assets/build');

mix.jigsaw()
    .sass('source/_assets/sass/main.scss', 'css/main.css')
    .sourceMaps()
    .copyDirectory('./node_modules/@fortawesome/fontawesome-free/webfonts', 'source/assets/build/fonts/font-awesome')
    .version();
