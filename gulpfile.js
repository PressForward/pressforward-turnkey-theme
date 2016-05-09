// Grab our gulp packages
var gulp  = require('gulp'),
    gutil = require('gulp-util'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    jshint = require('gulp-jshint'),
    stylish = require('jshint-stylish'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename'),
    plumber = require('gulp-plumber'),
    bower = require('gulp-bower')

// Compile Sass, Autoprefix and minify
gulp.task('styles', function() {
  return gulp.src('./assets/scss/**/*.scss')
    .pipe(plumber(function(error) {
            gutil.log(gutil.colors.red(error.message));
            this.emit('end');
    }))
    .pipe(sass())
    .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
    .pipe(gulp.dest('./assets/css/'))
    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .pipe(gulp.dest('./assets/css/'))
});

// JSHint, concat, and minify JavaScript
gulp.task('site-js', function() {
  return gulp.src([

           // Grab your custom scripts
  		  './assets/js/scripts/*.js'

  ])
    .pipe(plumber())
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'))
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest('./assets/js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('./assets/js'))
});

// JSHint, concat, and minify Foundation JavaScript
gulp.task('foundation-js', function() {
  return gulp.src([

  		  // Foundation core - needed if you want to use any of the components below
          './vendor/foundation-sites/js/foundation.core.js',
          './vendor/foundation-sites/js/foundation.util.*.js',

          // Pick the components you need in your project
          './vendor/foundation-sites/js/foundation.abide.js',
          './vendor/foundation-sites/js/foundation.accordion.js',
          './vendor/foundation-sites/js/foundation.accordionMenu.js',
          './vendor/foundation-sites/js/foundation.drilldown.js',
          './vendor/foundation-sites/js/foundation.dropdown.js',
          './vendor/foundation-sites/js/foundation.dropdownMenu.js',
          './vendor/foundation-sites/js/foundation.equalizer.js',
          './vendor/foundation-sites/js/foundation.interchange.js',
          './vendor/foundation-sites/js/foundation.magellan.js',
          './vendor/foundation-sites/js/foundation.offcanvas.js',
          './vendor/foundation-sites/js/foundation.orbit.js',
          './vendor/foundation-sites/js/foundation.responsiveMenu.js',
          './vendor/foundation-sites/js/foundation.responsiveToggle.js',
          './vendor/foundation-sites/js/foundation.reveal.js',
          './vendor/foundation-sites/js/foundation.slider.js',
          './vendor/foundation-sites/js/foundation.sticky.js',
          './vendor/foundation-sites/js/foundation.tabs.js',
          './vendor/foundation-sites/js/foundation.toggler.js',
          './vendor/foundation-sites/js/foundation.tooltip.js',
  ])
    .pipe(concat('foundation.js'))
    .pipe(gulp.dest('./assets/js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('./assets/js'))
});

// Update Foundation with Bower and save to /vendor
gulp.task('bower', function() {
  return bower({ cmd: 'update'})
    .pipe(gulp.dest('vendor/'))
});

// Create a default task
gulp.task('default', function() {
  gulp.start('styles', 'site-js', 'foundation-js');
});

// Watch files for changes
gulp.task('watch', function() {

  // Watch .scss files
  gulp.watch('./assets/scss/**/*.scss', ['styles']);

  // Watch site-js files
  gulp.watch('./assets/js/scripts/*.js', ['site-js']);

  // Watch foundation-js files
  gulp.watch('./vendor/foundation-sites/js/*.js', ['foundation-js']);

});

/**
 * Clean gulp cache
 */
 gulp.task('clear', function () {
   cache.clearAll();
 });


 /**
  * Clean tasks for zip
  *
  * Being a little overzealous, but we're cleaning out the build folder, codekit-cache directory and annoying DS_Store files and Also
  * clearing out unoptimized image files in zip as those will have been moved and optimized
 */

 gulp.task('cleanup', function() {
 	return 	gulp.src(['./assets/bower_components', '**/.sass-cache','**/.DS_Store'], { read: false }) // much faster
 		.pipe(ignore('node_modules/**')) //Example of a directory to ignore
 		.pipe(rimraf({ force: true }))
 		// .pipe(notify({ message: 'Clean task complete', onLast: true }));
 });
 gulp.task('cleanupFinal', function() {
 	return 	gulp.src(['./assets/bower_components','**/.sass-cache','**/.DS_Store'], { read: false }) // much faster
 		.pipe(ignore('node_modules/**')) //Example of a directory to ignore
 		.pipe(rimraf({ force: true }))
 		// .pipe(notify({ message: 'Clean task complete', onLast: true }));
 });

 /**
  * Build task that moves essential theme files for production-ready sites
  *
  * buildFiles copies all the files in buildInclude to build folder - check variable values at the top
  * buildImages copies all the images from img folder in assets while ignoring images inside raw folder if any
  */

  gulp.task('buildFiles', function() {
  	return 	gulp.src(buildInclude)
  		.pipe(gulp.dest(build))
  		.pipe(notify({ message: 'Copy from buildFiles complete', onLast: true }));
  });


/**
* Images
*
* Look at src/images, optimize the images and send them to the appropriate place
*/
gulp.task('buildImages', function() {
	return 	gulp.src(['assets/img/**/*', '!assets/images/raw/**'])
 		.pipe(gulp.dest(build+'assets/img/'))
 		.pipe(plugins.notify({ message: 'Images copied to buildTheme folder', onLast: true }));
});

 /**
  * Zipping build directory for distribution
  *
  * Taking the build folder, which has been cleaned, containing optimized files and zipping it up to send out as an installable theme
 */
 gulp.task('buildZip', function () {
 	// return 	gulp.src([build+'/**/', './.jshintrc','./.bowerrc','./.gitignore' ])
 	return 	gulp.src(build+'/**/')
 		.pipe(zip(project+'.zip'))
 		.pipe(gulp.dest('./'))
 		.pipe(notify({ message: 'Zip task complete', onLast: true }));
 });


 // ==== TASKS ==== //
 /**
  * Gulp Default Task
  *
  * Compiles styles, fires-up browser sync, watches js and php files. Note browser sync task watches php files
  *
 */

 // Package Distributable Theme
 gulp.task('build', function(cb) {
 	runSequence('styles', 'cleanup', 'vendorsJs', 'scriptsJs',  'buildFiles', 'buildImages', 'buildZip','cleanupFinal', cb);
 });
