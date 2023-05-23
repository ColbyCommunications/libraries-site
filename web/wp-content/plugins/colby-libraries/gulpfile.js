const gulp = require("gulp");
const gutil = require("gulp-util");
const jshint = require("gulp-jshint");
const rename = require("gulp-rename");
const { src, dest, series, watch } = require("gulp");
const autoprefixer = require("gulp-autoprefixer");
const concat = require("gulp-concat");
const sass = require("gulp-sass")(require("sass")); // Specify the Sass compiler
const babel = require("gulp-babel");
const uglify = require("gulp-uglify");
const sourcemaps = require("gulp-sourcemaps");
const browserSync = require("browser-sync").create();
const notify = require("gulp-notify"); // Sends message notification to you
const mmq = require("gulp-merge-media-queries");
const minifycss = require("gulp-uglifycss"); // Minifies CSS files.

// Sass task
function compileSass() {
  return src("assets/sass/main.scss")
    .pipe(sourcemaps.init())
    .pipe(
      sass({
        errLogToConsole: true,
        // outputStyle: 'compact',
        outputStyle: "compressed",
        // outputStyle: 'nested',
        // outputStyle: 'expanded',
        precision: 10,
      })
    )
    .on("error", console.error.bind(console))
    .pipe(sourcemaps.write({ includeContent: false }))
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(autoprefixer({ browsers: ["last 2 versions"] }))
    .pipe(rename("style.css"))
    .pipe(sourcemaps.write("./")) // Write sourcemap to same folder
    .pipe(gulp.dest("assets"))
    .pipe(mmq({ log: true })) // Merge Media Queries only for .min.css version
    .pipe(browserSync.stream()) // Reloads style.css if that is enqueued
    .pipe(rename({ suffix: ".min" }))
    .pipe(
      minifycss({
        maxLineLen: 10,
      })
    )
    .pipe(gulp.dest("assets"))
    .pipe(browserSync.stream()) // Reloads style.min.css if that is enqueued
    .pipe(notify({ message: 'TASK: "styles" Completed!', onLast: true }));
}

const jsfiles = ["assets/js/jquery.accordion.js", "assets/js//main.js"];

// JavaScript task
function compileJs() {
  return gulp
    .src(jsfiles)
    .pipe(jshint({ esnext: true }))
    .pipe(jshint.reporter("default"))
    .pipe(babel({ presets: ["es2015"] }))
    .pipe(concat("scripts.js"))
    .pipe(gulp.dest("assets"))
    .pipe(rename("scripts.min.js"))
    .pipe(uglify().on("error", gutil.log))
    .pipe(gulp.dest("assets"))
    .pipe(notify({ message: 'TASK: "scripts" Completed!', onLast: true }));
}

// Watch task
function watchFiles() {
  browserSync.init({
    server: {
      baseDir: "./",
    },
  });

  watch(["assets/sass/*.scss", "assets/sass/**/*.scss"], compileSass);
  watch("assets/js/*.js", compileJs);
  watch("./*.html").on("change", browserSync.reload);
}

// Default task
exports.default = series(compileSass, compileJs, watchFiles);
