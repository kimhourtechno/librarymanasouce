// import { defineConfig } from 'vite';

// export default defineConfig({
//   build: {
//     outDir: 'public/build',
//     assetsDir: 'public',
//   },
// });



import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
