import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
    build: {
        outDir: './public_html/build/'
    },
    plugins: [
        laravel({
            publicDirectory: 'public_html',
            input: [
                'resources/scss/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve:{
        alias:{
            '@' : path.resolve(__dirname, './resources/js'),
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        },
    },
});
