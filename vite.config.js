import jigsaw from '@tighten/jigsaw-vite-plugin';
import { viteStaticCopy } from 'vite-plugin-static-copy';
import { defineConfig } from 'vite';

export default defineConfig({
  plugins: [
    jigsaw({
      input: [
        'source/_assets/sass/main.scss',
        'source/_assets/sass/cv.scss',
        'source/_assets/js/cv.js',
      ],
      refresh: true,
    }),
    viteStaticCopy({
      targets: [
        {
          src: 'node_modules/@fortawesome/fontawesome-free/webfonts/*',
          dest: 'fonts/font-awesome',
        },
      ],
    }),
  ],
});
