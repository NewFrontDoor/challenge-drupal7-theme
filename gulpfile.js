var less = require('gulp-less'),
     gulp = require('gulp'),
     minify = require('gulp-cssnano'),
     plumber = require('gulp-plumber'),
     using = require('gulp-using');

gulp.task('watch', function() {
  gulp.watch('./**/*.less', ['compile']);
});

gulp.task('compile', function() {
  return gulp.src('./less/style.less')
    .pipe(plumber({
      errorHandler: function(err) {
        console.log(err);
        this.emit('end');
      }
    }))
    .pipe(using({prefix: 'Compiling theme style: ', color: 'red'}))
    .pipe(less())
    .pipe(gulp.dest('./css'));
});

gulp.task('default', ['compile']);
