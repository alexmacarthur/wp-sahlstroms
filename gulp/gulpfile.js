// load our plugins
var gulp = require('gulp');
var jshint = require('gulp-jshint');
var uglify = require('gulp-uglify');
var autoprefix = require('gulp-autoprefixer');
var sass = require('gulp-sass');
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');
var concat = require('gulp-concat');
var svgmin = require('gulp-svgmin');

// check JavaScript
gulp.task('jshint',function(){
  gulp.src('../js/scripts.js')
      .pipe(jshint())
      .pipe(jshint.reporter('default'));
});

// minify JavaScript and put it into /dist
gulp.task('scripts', function() {
  gulp.src([ '../js/egg.js','../js/dropit.js', '../js/scripts.js'])
    .pipe(concat('scripts.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('../js'));
});

// compile and autoprefix SASS
gulp.task('scss', function () {
  gulp.src('../styles/style.scss')
    .pipe(sass({outputStyle: 'compressed'}))
    .pipe(autoprefix('last 3 versions'))
    .pipe(gulp.dest('../styles'));
});

gulp.task('svg', function () {
    return gulp.src('../img/*.svg')
        .pipe(svgmin())
        .pipe(gulp.dest('../img'));
});

gulp.task('images', function() {
  return gulp.src('../img/*')
    .pipe(imagemin({
        progressive: true,
        svgoPlugins: [{removeViewBox: false}],
        use: [pngquant()]
    }))
    .pipe(gulp.dest('../img'));
});

// run our default gulp tasks and watch for changes
gulp.task('default', ['jshint','scripts','scss'], function() {

  // watch for JavaScript changes
  gulp.watch('../js/*.js', ['jshint', 'scripts']);

  // watch for SASS changes
  gulp.watch('../styles/**/*.scss', ['scss']);

});
