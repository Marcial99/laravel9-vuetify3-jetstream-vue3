import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

// https://github.com/vuetifyjs/vuetify-loader/tree/next/packages/vite-plugin
import vuetify from "vite-plugin-vuetify";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        laravel({
            input: "resources/js/app.js",
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
});
