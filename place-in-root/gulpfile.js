"use strict";
const gulp = require('gulp');
const { src, dest, series } = require('gulp');
const sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass')(require('sass'));
const browsersync = require('browser-sync');
const phpConnect = require('gulp-connect-php');
const autoprefixer = require('gulp-autoprefixer');
const cleancss = require('gulp-cleancss');
const rename = require('gulp-rename');
const concat = require('gulp-concat');
const terser = require('gulp-terser');

// PHP server
function phpServer() {
    phpConnect.server({
        port: 8890,
        reloadOnRestart: true
    }, function (){
        browsersync.init({
            proxy: 'https://boilershop.local:8890/',
            browser: 'google chrome',
            notify: false,
            files: [
                "httpdocs/wp-content/themes/bureauhanze-child/assets/css/style.min.css", 
                "httpdocs/wp-content/themes/bureauhanze-child/**/*.php", 
                "httpdocs/wp-content/themes/bureauhanze-child/assets/js/script.js", 
                "httpdocs/wp-content/themes/bureauhanze-child/assets/js/footer.js"
            ],
            https: {
                key: '/Applications/MAMP/Library/OpenSSL/certs/localhost.key',
                cert: '/Applications/MAMP/Library/OpenSSL/certs/localhost.crt',
            },
            injectChanges: true
        });
    });
}

//Sass task
function scssTask() {
    return src('httpdocs/wp-content/themes/bureauhanze-child/assets/scss/style.scss')
        .pipe(sourcemaps.init({loadMaps: true}))
        .pipe(sass())
        .pipe(autoprefixer('last 2 versions'))
        .pipe(sourcemaps.write('.'))
        .pipe(cleancss({compatibility: 'ie8'}))
        .pipe(rename('style.min.css'))
        .pipe(dest('httpdocs/wp-content/themes/bureauhanze-child/assets/css'))
}

// Bundle JavaScript and minify
function jsScript() {
    return src('httpdocs/wp-content/themes/bureauhanze-child/assets/js/script.js')
        .pipe(sourcemaps.init())
        .pipe(terser())
        .pipe(rename('script.min.js'))
        .pipe(sourcemaps.write())
        .pipe(dest('httpdocs/wp-content/themes/bureauhanze-child/assets/js'));
}

// Bundle JavaScript and minify in footer
function jsFooter() {
    return src(['httpdocs/wp-content/themes/bureauhanze-child/assets/js/footer.js', 'httpdocs/wp-content/themes/bureauhanze-child/assets/js/woocommerce.js'])
        .pipe(sourcemaps.init())
        .pipe(terser())
        .pipe(concat('footer.min.js'))
        .pipe(sourcemaps.write())
        .pipe(dest('httpdocs/wp-content/themes/bureauhanze-child/assets/js'));
}


// BrowserSync Reload
function browserSyncReload(done) {
    browsersync.reload({stream:true})
    done();
}

// Watch PHP and SCSS files for changes
function watchFiles() {
    gulp.watch('httpdocs/wp-content/themes/bureauhanze-child/**/*.php', gulp.series(browserSyncReload));
    gulp.watch('httpdocs/wp-content/themes/bureauhanze-child/assets/scss/*.scss', gulp.series(scssTask, browserSyncReload));
    gulp.watch('httpdocs/wp-content/themes/bureauhanze-child/assets/js/script.js', gulp.series(jsScript, browserSyncReload));
    gulp.watch('httpdocs/wp-content/themes/bureauhanze-child/assets/js/footer.js', gulp.series(jsFooter, browserSyncReload));
    gulp.watch('httpdocs/wp-content/themes/bureauhanze-child/assets/js/woocommerce.js', gulp.series(jsFooter, browserSyncReload));
}

// Start PHP server and Browsersync
const watch = gulp.parallel([phpServer, watchFiles]);

// Start with $gulp
exports.default = series(scssTask, jsScript, jsFooter, watch);