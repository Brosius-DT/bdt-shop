import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import vue from '@vitejs/plugin-vue';               // <-- Vue‑Plugin
import { resolve } from 'path';

export default defineConfig({
  plugins: [
    vue(),                                           // <-- zuerst das Vue‑Plugin
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.ts'],
      refresh: true,
    }),
    tailwindcss(),
  ],
  resolve: {
    alias: {
      '@': resolve(__dirname, 'resources/js'),      // <-- optionaler Alias
    },
  },
});
