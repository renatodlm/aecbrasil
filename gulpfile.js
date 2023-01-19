"use strict";

const gulp = require('gulp');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');
const plumber = require('gulp-plumber');

const scssFiles = './scss/*.scss';
const cssDest = './';

const sassOptions = {
    // outputStyle: 'expanded',
    outputStyle: 'compressed'
}

function sassdev() {
    return gulp
        .src(scssFiles)
        .pipe(sourcemaps.init())
        .pipe(plumber({
            handleError: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
        .pipe(sass(sassOptions).on('error', sass.logError))
        .pipe(autoprefixer({
            cascade: true
        }))
        .pipe(sourcemaps.write('./maps/'))
        .pipe(gulp.dest(cssDest));
}

const scssFiles_templates = './scss/**/*.scss';
const cssDest_templates = './scss/';

function sass_templates() {
    return gulp
        .src(scssFiles_templates)
        .pipe(sourcemaps.init())
        .pipe(plumber({
            handleError: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
        .pipe(sass(sassOptions).on('error', sass.logError))
        .pipe(autoprefixer({
            cascade: true
        }))
        .pipe(sourcemaps.write('./maps/'))
        .pipe(gulp.dest(cssDest_templates));
}

function watch() {
    gulp.watch(scssFiles_templates, sassdev);
    gulp.watch(scssFiles_templates, sass_templates);
}

exports.default = gulp.parallel(sassdev, watch);
exports.default = gulp.parallel(sass_templates, watch);