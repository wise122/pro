const mix = require('laravel-mix');
const glob = require('glob');
const path = require('path');

// PostCSS and TailwindCSS configuration.
const postCssPlugins = [
    require('postcss-import'),
    require('tailwindcss'),
];

// Processing individual CSS files.
glob.sync('resources/css/*.css').forEach(file => {
    const filename = path.basename(file, '.css');
    if (filename !== 'app') {
        mix.postCss(file, 'public/assets/css', postCssPlugins).options({
            processCssUrls: false,
        });
    }
});

// Copying directories.
mix.copyDirectory('resources/vendor', 'public/assets/vendor')
    .copyDirectory('resources/images', 'public/assets/images');

// Processing individual JS files and excluding 'app.js' which is handled separately.
glob.sync('resources/js/*.js').forEach(file => {
    const filename = path.basename(file, '.js').replace('.min', '');
    if (filename !== 'app') {
        mix.js(file, 'public/assets/js').sourceMaps(!mix.inProduction(), 'source-map');
    }
});

// Main app.js and app.css processing.
mix.js("resources/js/app.js", "public/assets/js")
    .postCss("resources/css/app.css", "public/assets/css", postCssPlugins);

// SASS processing.
mix.sass('resources/sass/style.scss', 'public/assets/css')
    .sass('resources/sass/responsive.scss', 'public/assets/css')
    .sourceMaps(!mix.inProduction(), 'source-map');
