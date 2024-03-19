import { defineConfig } from "vite";
import { resolve } from 'path';
import sass from 'sass'


export default defineConfig({
    base: './',
    resolve: {
        alias: {
          '@': resolve(__dirname, 'src'),
        }
    },
    plugins: [
        {
            handleHotUpdate({ file, server }) {
                if (file.endsWith('.php') || file.endsWith('.scss') || file.endsWith('.js')) {
                    server.ws.send({ type: 'full-reload', path: '*' });
                }
            }
        }
    ],
    publicDir: resolve(__dirname + '/src/assets'),
    css: {
        preprocessorOptions: {
          scss: {
            implementation: sass,
          },
        },
    },
    build: {
        // emit manifest so PHP can find the hashed files
        manifest: true,
        outDir: resolve(__dirname + '/assets'),
        emptyOutDir: true,
        rollupOptions: {
            input: [
                resolve(__dirname + '/src/js/main.js'),
                resolve(__dirname + '/src/scss/styles.scss'),
            ],
            output: {
              chunkFileNames: 'js/modules/[name]-[hash].js',
              entryFileNames: 'js/main.js',
              assetFileNames: ({name}) => {
                if (/\.(gif|jpe?g|png|svg)$/.test(name ?? '')){
                    return 'images/[name][extname]';
                }
                
                if (/\.(eot|woff2|woff|ttf)$/.test(name ?? '')){
                    return 'fonts/[name][extname]';
                }
                
                if (/\.css$/.test(name ?? '')) {
                    return 'css/style.css';   
                }
                // default value
                // ref: https://rollupjs.org/guide/en/#outputassetfilenames
                return 'other/[name]-[hash][extname]';
              },
            },
          }
    },
    server: {
        // required to load scripts from custom host
        cors: {
            origin: "*"
        },
        
        // We need a strict port to match on PHP side.
        // You can change it. But, please update it on your .env file to match the same port
        // strictPort: true,
        port: 5173
        
    },
});