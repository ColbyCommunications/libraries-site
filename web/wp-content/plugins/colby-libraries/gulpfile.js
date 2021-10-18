var autoprefixer = require('gulp-autoprefixer'),
	concat = require('gulp-concat'),
	gulp = require('gulp'),
	gutil = require('gulp-util'),
	jshint = require('gulp-jshint'),
	rename = require('gulp-rename'),
	sass = require('gulp-sass'),
	babel = require('gulp-babel'),
	sourcemaps = require('gulp-sourcemaps'),
	uglify = require('gulp-uglify'),
	watch = require('gulp-watch');
	mmq = require('gulp-merge-media-queries');
	minifycss = require('gulp-uglifycss'); // Minifies CSS files.
	browserSync = require('browser-sync').create(); // Super sweet browser syncing and reloading
	reload = browserSync.reload; // For manual browser reload.
	notify = require('gulp-notify'); // Sends message notification to you

var watchpaths = {
	sass: ['assets/sass/*.scss', 'assets/sass/**/*.scss'],
	js: ['assets/js/*.js'],
	php: ['./**/*.php'],
	};

var jsfiles = [
	'assets/js/jquery.accordion.js',
	'assets/js//main.js',
	];

// BROWSERSYNC
// Live reload, CSS/JS injection, and localhost tunneling - http://www.browsersync.io/docs/options/
gulp.task( 'browser-sync', function() {
  browserSync.init( {
    proxy: 'dev2',			// Project URL could be 'dev8' or 'localhost:3000'
    open: true,				// 'true' automatically opens BrowserSync live server, 'false' does not
    injectChanges: true,	// Inject CSS changes, comment it to reload browser for every CSS change
    // port: 7000,			// Use a specific port (instead of the one auto-detected by Browsersync)
  } );
});

// SCRIPTS TASK
// Compile JS files, minify, and save to assets folder
gulp.task('scripts', function() {
  return gulp.src(jsfiles)
    .pipe(jshint({esnext: true}))
    .pipe(jshint.reporter('default'))
    .pipe(babel({presets: ['es2015']}))
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest('assets'))
    .pipe(rename('scripts.min.js'))
    .pipe(uglify().on('error', gutil.log))
    .pipe(gulp.dest('assets'))
  	.pipe( notify( { message: 'TASK: "scripts" Completed!', onLast: true } ) );
});

// STYLE TASK
// Compile SCSS, add vendor prefixes, minify, save to assets folder
gulp.task('sass', function () {
  gulp.src( 'assets/sass/main.scss' )
  .pipe( sourcemaps.init() )
  .pipe( sass( {
    errLogToConsole: true,
      // outputStyle: 'compact',
      outputStyle: 'compressed',
      // outputStyle: 'nested',
      // outputStyle: 'expanded',
      precision: 10
    } ) )
  .on('error', console.error.bind(console))
  .pipe( sourcemaps.write( { includeContent: false } ) )
  .pipe( sourcemaps.init( { loadMaps: true } ) )
  .pipe( autoprefixer( {browsers: ['last 2 versions']} ) )
  .pipe(rename('style.css'))
  .pipe( sourcemaps.write ( './' ) ) // Write sourcemap to same folder
  .pipe( gulp.dest( 'assets' ) )
  .pipe( mmq( { log: true } ) ) // Merge Media Queries only for .min.css version
  .pipe( browserSync.stream() ) // Reloads style.css if that is enqueued
  .pipe( rename( { suffix: '.min' } ) )
  .pipe( minifycss( {
    maxLineLen: 10
  }))
  .pipe( gulp.dest( 'assets' ) )
  .pipe( browserSync.stream() ) // Reloads style.min.css if that is enqueued
  .pipe( notify( { message: 'TASK: "styles" Completed!', onLast: true } ) )
});

// WATCH TASK
// Watch files for changes and reload
gulp.task( 'default', ['sass', 'scripts', 'browser-sync'], function () {
	gulp.watch(watchpaths.sass, ['sass']); // Compile styles and inject CSS
	gulp.watch(watchpaths.js, ['scripts', reload]); // Compile JS and reload browser
	gulp.watch(watchpaths.php, reload); // Reload browser on file change
});
