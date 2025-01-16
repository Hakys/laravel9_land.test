import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig(async () => {
    const laravelPlugin = (await import('laravel-vite-plugin')).default;

    return {
        plugins: [
            laravelPlugin({
                input: 'resources/js/app.js',
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
    };
});
