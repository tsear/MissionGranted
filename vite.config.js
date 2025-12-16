import { defineConfig } from 'vite';
import liveReload from 'vite-plugin-live-reload';
import path from 'path';

export default defineConfig({
  plugins: [
    liveReload([
      '**/*.php',
      'assets/scss/**/*.scss',
      'assets/js/**/*.js'
    ])
  ],
  root: './',
  base: './',
  build: {
    outDir: 'dist',
    emptyOutDir: true,
    manifest: true,
    rollupOptions: {
      input: {
        main: path.resolve(__dirname, 'assets/js/main.js'),
        styles: path.resolve(__dirname, 'assets/scss/main.scss')
      },
      output: {
        entryFileNames: 'assets/js/[name].min.js',
        chunkFileNames: 'assets/js/[name]-[hash].js',
        assetFileNames: (assetInfo) => {
          if (assetInfo.name.endsWith('.css')) {
            return 'assets/css/[name].min[extname]';
          }
          return 'assets/[name][extname]';
        }
      }
    }
  },
  server: {
    cors: true,
    strictPort: true,
    port: 3000,
    hmr: {
      host: 'localhost',
      protocol: 'ws'
    }
  },
  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'assets'),
      '@scss': path.resolve(__dirname, 'assets/scss'),
      '@js': path.resolve(__dirname, 'assets/js')
    }
  },
  css: {
    preprocessorOptions: {
      scss: {
        additionalData: `@import "@scss/abstracts/_variables.scss"; @import "@scss/abstracts/_mixins.scss";`
      }
    }
  }
});
