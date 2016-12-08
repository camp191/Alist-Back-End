var gulp = require('gulp');
var postCSS = require('gulp-postcss');
var autoPrefixer = require('autoprefixer');
var varCSS = require('postcss-simple-vars');
var nested = require('postcss-nested');
var importCSS = require('postcss-import');
var mixins = require('postcss-mixins');

gulp.task('css', function(){
  return gulp.src('./app/assets/styles/index.css')
        .pipe(postCSS([importCSS, varCSS, mixins, autoPrefixer, nested]))
        .on('error', function(errorInfo){
          console.log(errorInfo.toString());
          this.emit('end');
        })
        .pipe(gulp.dest('./app/temp/styles'));
})

gulp.task('css2', function(){
  return gulp.src('./app/assets/styles/price.css')
        .pipe(postCSS([importCSS, varCSS, mixins, autoPrefixer, nested]))
        .on('error', function(errorInfo){
          console.log(errorInfo.toString());
          this.emit('end');
        })
        .pipe(gulp.dest('./app/temp/styles'));
})

gulp.task('css3', function(){
  return gulp.src('./app/assets/styles/test.css')
        .pipe(postCSS([importCSS, varCSS, mixins, autoPrefixer, nested]))
        .on('error', function(errorInfo){
          console.log(errorInfo.toString());
          this.emit('end');
        })
        .pipe(gulp.dest('./app/temp/styles'));
})
