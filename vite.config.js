import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';

/**
 * server.host nên để là 0.0.0.0 hoặc true để chấp nhận tất cả domain (*)
 * server.cors
 *     - true nếu vite vs web(app_url) chaỵ khác domain (*)
 *     - false hoặc ko cần đề cập nếu vite vs web(app_url) chaỵ cùng domain
 * server.hmr.host
 *     - nếu là domain ảo thì điện thoại không xem được
 *     - nếu là IP thì điện thoại xem được (*)
 *         - domain ảo cũng xem được luôn
 *         - nếu là http thì máy tính hoặc điện thoại truy cập trực tiếp vào http://IP
 *         - nếu là https thì máy tính hoặc điện thoại truy cập gián tiếp vào https://IP:5173
 * server.hmr.protocol
 *     - nếu là http thì dùng ws
 *     - nếu là https thì dùng wss
 * server.https
 *     - nếu không dùng https thì cần comment phần này đi
 *     - nếu dùng https thì cần phải có
 *         - đồng bộ https cho các link asset để load được css và js
 * 
 * *** Lưu ý: IP có thể thay đổi chỉ cần set server.host là 0.0.0.0 và khi chạy npm run dev sẽ hiện ra IP mới
 */

export default defineConfig({
    server: {
        // host: 'jobportal.local',
        host: '0.0.0.0',
        port: 5173,
        cors: true,
        hmr: {
            // host: 'jobportal.local',
            host: '192.168.1.3', // IP có thể thay đổi
            // protocol: 'ws',
            protocol: 'wss',
        },
        watch: {
            usePolling: true,
            interval: 1000,
        },
        https: {
            key: fs.readFileSync('./jobportal.local-key.pem'),
            cert: fs.readFileSync('./jobportal.local.pem'),
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
