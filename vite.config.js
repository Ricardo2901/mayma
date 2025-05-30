import { defineConfig } from 'vite';
import fullReload from 'vite-plugin-full-reload';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
        fullReload(['resources/views/**/*.blade.php']),
    ],
});
