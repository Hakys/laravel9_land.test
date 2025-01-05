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
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
        },
    },
    css: {
        preprocessorOptions: {
            scss: {
                additionalData: `@import "/node_modules/bootstrap/scss/bootstrap";`
            }
        }
    },
    build: {
        manifest: true,
        rollupOptions: {
            input: 'resources/js/app.js',
        },
    },
});
