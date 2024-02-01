const gulp = require('gulp');
const browserSync = require('browser-sync').create();
const sass = require('gulp-sass')(require('sass'));

// Set the Sass compiler (use either "sass" or "node-sass")


// Sass task
gulp.task('sass', function () {
  return gulp.src('./web/css/style.scss')
    .pipe(sass())
    .pipe(gulp.dest('./web/css/motory.css'))
    .pipe(browserSync.stream());
});

// Watch task
gulp.task('watch', function (done) {
  browserSync.init({
    proxy: 'http://localhost:8080', // Replace this with your actual local development server URL
  });

  gulp.watch('./web/css/style.scss', gulp.series('sass'));
  done(); // Signal async completion
});

// Default task
gulp.task('default', gulp.parallel('sass', 'watch'));
