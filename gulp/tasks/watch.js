var gulp = require('gulp');
var watch = require('gulp-watch');
var browserSync = require('browser-sync').create()

gulp.task('watch', function(){

  browserSync.init({
    notify: false,
    server: {
      baseDir: "app"
    }
  })

  watch('./app/index.html', function(){
    browserSync.reload();
  });

  watch('./app/price.html', function(){
    browserSync.reload();
  });

  watch('./app/test.html', function(){
    browserSync.reload();
  });

  watch('./app/assets/styles/**/*.css', function(){
    gulp.start('cssInject');
    gulp.start('cssInject2');
    gulp.start('cssInject3');
  })

  watch('./app/assets/scripts/**/*.js', function(){
    gulp.start('scriptsRefresh');
  })
});

gulp.task('cssInject', ['css'], function(){
  return gulp.src('./app/temp/styles/index.css')
        .pipe(browserSync.stream())
})

gulp.task('cssInject2', ['css2'], function(){
  return gulp.src('./app/temp/styles/price.css')
        .pipe(browserSync.stream())
})

gulp.task('cssInject3', ['css3'], function(){
  return gulp.src('./app/temp/styles/test.css')
        .pipe(browserSync.stream())
})

gulp.task('scriptsRefresh', ['scripts'], function(){
  browserSync.reload();
})
