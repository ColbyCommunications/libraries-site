// VARIABLES
// Plugins, paths, and other non-task related items 

// Gulp plugins
const { src, dest, watch } = require('gulp');
const sass        = require("gulp-sass");
const prefix      = require("gulp-autoprefixer");
const minifycss   = require("gulp-clean-css");
const concat      = require("gulp-concat");
const rename      = require("gulp-rename");
const uglify      = require("gulp-uglify");
const browserSync = require('browser-sync').create();

// File paths
var styleWatchFiles     = "assets/sass/**/*.scss";  // Path to all *.scss files in all subfolders
var watchPathFiles      = '**/*.php';             // watch path for PHP template files
var styleSRC            = "assets/sass/main.scss";  // Path to main source .scss file
var styleDest           = "assets";                 // Destination path for compiled styles

// Browsers for autoprefixing
var autoprefixBrowsers  = ["last 2 versions", "> 1%", "ie >= 9", "ie_mob >= 10", "ff >= 30", "chrome >= 34", "safari >= 7", "opera >= 23", "ios >= 7", "android >= 4", "bb >= 10"];

// Development site root folder / location 
var projectURL          = 'wpsandbox';  // project URL, can be "localhost:3000" or something else 



// SCSS Function - Convert SCSS to CSS, autoprefix, minify, save to assets folder 
function css() {
  return src(styleSRC)
  .pipe(sass())
  .pipe(prefix(autoprefixBrowsers))
  .pipe(rename('style.css'))
  .pipe(dest(styleDest), { sourcemaps: true })
  .pipe(prefix(autoprefixBrowsers))
  .pipe(minifycss())
  .pipe(rename({ suffix: ".min" }))
  .pipe(dest(styleDest), { sourcemaps: true })
  .pipe(browserSync.stream());
}

// BROWSERSYNC Function - Live reload, CSS injection, and localhost tunneling
function browser() {
    browserSync.init({
        proxy: projectURL,
        files: [ watchPathFiles ],
        port: 3010
    });

    watch(styleWatchFiles, css).on('change', browserSync.reload);
}

// EXPORTS - Default tasks
exports.css = css;
exports.default = browser;