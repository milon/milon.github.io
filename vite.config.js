import jigsaw from '@tighten/jigsaw-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import { defineConfig } from 'vite';

export default defineConfig({
  plugins: [
    tailwindcss(),
    jigsaw({
      input: [
        'source/_assets/css/site.css',
        'source/_assets/sass/main.scss',
        'source/_assets/sass/cv.scss',
        'source/_assets/js/search.js',
      ],
      refresh: true,
    }),
  ],
});
