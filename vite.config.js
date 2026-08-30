import jigsaw from '@tighten/jigsaw-vite-plugin';
import { defineConfig } from 'vite';

export default defineConfig({
  plugins: [
    jigsaw({
      input: [
        'source/_assets/sass/main.scss',
        'source/_assets/sass/cv.scss',
        'source/_assets/js/cv.js',
        'source/_assets/js/search.js',
      ],
      refresh: true,
    }),
  ],
});
