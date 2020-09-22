const { EnvironmentPlugin } = require("webpack");
const mix = require("laravel-mix");
const glob = require("glob");
const path = require("path");

mix.options({
    postCss: [require("autoprefixer")]
});

mix.webpackConfig({
    plugins: [
        new EnvironmentPlugin({
            // Application's public url
            BASE_URL: "/"
        })
    ],
    resolve: {
        extensions: ['.js', '.vue'],
        alias: {
            "@": path.join(__dirname, "resources/assets/src"),
            node_modules: path.join(__dirname, "node_modules")
        }
    }
});

mix.copy("resources/assets/src/components", "public/components");
mix.js("resources/assets/src/app.js", "public").sourceMaps();
