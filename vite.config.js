import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        // host: 'jobportal.local',
        host: '0.0.0.0',
        port: 5173,
        cors: true,
        hmr: {
            // host: 'jobportal.local',
            host: 'localhost',
            protocol: 'ws',
        },
        watch: {
            usePolling: true,
            interval: 1000,
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
