import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: [
                'app/Filament/**',
                'resources/views/filament/**',
            ],
        }),
        tailwindcss(),
    ],
    server: {
        host: '0.0.0.0',
        hmr: {
            host: 'localhost',
        },
        cors: true,
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
