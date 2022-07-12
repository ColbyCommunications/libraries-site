const autoprefixer = require('gulp-autoprefixer');
const concat = require('gulp-concat');
const gulp = require('gulp');
const gutil = require('gulp-util');
const jshint = require('gulp-jshint');
const rename = require('gulp-rename');
const sass = require('gulp-sass');
const babel = require('gulp-babel');
const sourcemaps = require('gulp-sourcemaps');
const uglify = require('gulp-uglify');

const watchpaths = {
  sass: ['css/sass/*.scss', 'css/sass/**/*.scss'],
  js: ['js/source/*.js'],
};

const jsfiles = ['js/source/main.js'];

gulp.task('scripts', () =>
  gulp
    .src(jsfiles)
    .pipe(jshint({ esnext: true }))
    .pipe(jshint.reporter('default'))
    .pipe(babel({ presets: ['env'] }))
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest('js'))
    .pipe(rename('scripts.min.js'))
    .pipe(uglify().on('error', gutil.log))
    .pipe(gulp.dest('js'))
);

gulp.task('sass', () =>
  gulp
    .src('css/sass/main.scss')
    .pipe(
      sass({
        outputStyle: 'compressed',
        sourcemap: true,
      })
    )
    .pipe(sourcemaps.init())
    .pipe(sass({ outputStyle: 'compressed' }))
    .pipe(sourcemaps.write())
    .pipe(autoprefixer({ browsers: ['last 2 versions'] }))
    .pipe(rename('style.min.css'))
    .pipe(gulp.dest('css'))
);

gulp.task('sass2', () =>
  gulp
    .src('css/sass/main.scss')
    .pipe(sass())
    .pipe(autoprefixer({ browsers: ['last 2 versions'] }))
    .pipe(rename('style.css'))
    .pipe(gulp.dest('css'))
);

gulp.task('watch', () => {
  gulp.watch(watchpaths.sass, ['sass', 'sass2']);
  gulp.watch(watchpaths.js, ['scripts']);
});

gulp.task('default', ['watch']);
