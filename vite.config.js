import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
            detectTls: 'laravel9_land.test',
        }),
    ],
    build: {
        rollupOptions: {
          input: {
            app: 'resources/js/app.js',
          },
        },
      },
});
