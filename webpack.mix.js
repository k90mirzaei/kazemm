const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        require("tailwindcss")
    ]);

mix.webpackConfig((webpack) => {
    return {
        plugins: [
            new webpack.DefinePlugin({
                "process.env.MIX_EMAIL": JSON.stringify(process.env.MIX_EMAIL),
                "process.env.MIX_GITHUB": JSON.stringify(process.env.MIX_GITHUB),
                "process.env.MIX_TWITTER": JSON.stringify(process.env.MIX_TWITTER),
                "process.env.MIX_LINKEDIN": JSON.stringify(process.env.MIX_LINKEDIN),
            }),
        ],
    };
});

