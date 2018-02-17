var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var sass        = require('gulp-sass');

gulp.task('serve', ['sass'], function() {

  browserSync.init({
     proxy: "http://localhost:80" // "rwr.dev"
  });

  gulp.watch("sass/*.scss", ['sass']);
  gulp.watch("*.php, *.js").on('change', browserSync.reload);
});

// Compile sass into CSS & auto-inject into browsers
gulp.task('sass', function() {
  return gulp.src("sass/*.scss")
     .pipe(sass())
     .pipe(gulp.dest("css"))
     .pipe(browserSync.stream());
});

gulp.task('default', ['serve']);
