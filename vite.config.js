import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
            ],
            refresh: true,
            detectTls: 'laravel9_land.test',
        }),
    ],
    resolve: {
        alias: {
          '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        },  
    },
    build: {
        rollupOptions: {
          input: {
            app: 'resources/js/app.js',
          },
        },
      },
});
