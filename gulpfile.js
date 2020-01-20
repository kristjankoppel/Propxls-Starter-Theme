/**
 * GULP - GENERAL
 */
const { gulp, series, parallel, src, dest, watch }  = require('gulp');
const config = require('./config');

/**
 * GULP - SCSS
 */
const sass          = require('gulp-sass');
      sass.compiler = require('node-sass');
const autoprefixer  = require('gulp-autoprefixer');
const sourcemaps    = require('gulp-sourcemaps');
const mmq           = require('gulp-merge-media-queries');
const cssnano       = require('gulp-cssnano');

/**
 * GULP - JAVASCRIPT
 */
const rollup   = require('gulp-better-rollup');
const babel    = require('rollup-plugin-babel');
const resolve  = require('rollup-plugin-node-resolve');
const commonjs = require('rollup-plugin-commonjs');
const uglify   = require('rollup-plugin-uglify');

/**
 * GULP - Browser-sync
 */
const browserSync = require('browser-sync').create();

/**
 * GULP - Utility related plugins
 */
const notify    = require('gulp-notify');
const rename    = require('gulp-rename');
const wppot     = require('gulp-wp-pot');
const imageMin  = require('gulp-imagemin');
const svgSprite = require('gulp-svg-sprite');


/**
 * TASK - Build CSS from SCSS
 */
function buildCss() {
    return src('./assets/src/scss/pp-app-theme.scss')
        .pipe( sourcemaps.init() )
        .pipe(
            sass({
                includePaths: ['node_modules'],
                //sourceMap: true,
                //outputStyle: 'compressed',
            }).on( 'error', sass.logError)
        )
        .pipe( sourcemaps.write( './' ) )
        .pipe( dest('./assets/dist/css') )
        .pipe( browserSync.stream() );
}

/**
 * TASK - Build minfied CSS
 */
function buildMinCss() {
    return src('./assets/dist/css/pp-app-theme.css')
        .pipe( autoprefixer() )
        .pipe( mmq({ log: true }) ) // Merge Media Queries
        .pipe( cssnano() ) 
        .pipe( rename({ suffix: '.min' }) ) 
        .pipe( dest('./assets/dist/css') )
        .pipe( notify({ message: '\n\n✅  ===> TASK: css_min — completed!\n', onLast: true }) );
}

/**
 * TASK - Build JS from partials
 */
function buildJs() {
    return  src('./assets/src/js/pp-app.js')
        .pipe(rollup({ plugins: [babel(), resolve(), commonjs()] }, 'umd'))
        .pipe(dest('./assets/dist/js'))
        .pipe(browserSync.stream());
}

function uglifyJs() {
    return  src('./assets/dist/js/pp-app.js')
        .pipe(
            rollup(
                { 
                    plugins: [
                        babel(), 
                        resolve(), 
                        commonjs(), 
                        uglify()
                    ] 
                }, 
                'umd'
            )
        )
        .pipe( dest('./assets/dist/js') )
        .pipe( notify({ message: '\n\n✅  ===> TASK: uglify_js — completed!\n', onLast: true }) );
}

/**
 * TASK - Generate pot-files for WordPress localization via gulp
 */
function generateWpPot() {
    return  src(['./*.php', './propxls/*.php', './templates/**/*.twig'])
        .pipe(
            wppot({
                domain: config.pot.domain,
                package: config.pot.package
            })
        )
        .pipe(dest('./languages/'+config.pot.domain+'.pot'))
        .pipe(notify({ message: '\n\n✅  ===> TASK: wppot — completed!\n', onLast: true }));
}

/**
 * TASK - Browsersync init and reload tasks
 */
function startBrowsersync() {
    browserSync.init({
        proxy: {
            target: config.browsersync.target
        }
    });
    return browserSync;
}

function reloadBrowsersync(done) {
    browserSync.reload();
    done();
}

/**
 * TASK - Watch files for changes
 */
function watchFiles() {
    watch("./assets/src/scss/**/*.scss", buildCss);
    watch("./assets/src/js/**/*.js", buildJs);
    watch("./templates/**/*.twig", reloadBrowsersync);
    watch("./*.php", reloadBrowsersync);
}

/**
 * TASK - Copy and optimize image assets
 */
function processImages(done) {
    return src( config.paths.assets_src+'/img/**/*')
        .pipe(
            imageMin([
                imageMin.gifsicle({interlaced: true}), 
                imageMin.jpegtran({progressive: true}),
                imageMin.optipng({optimizationLevel: 5}),
                imageMin.svgo({
                    plugins: [
                        {removeViewBox: true},
                        {cleanupIDs: false}
                    ]
                })
            ])
        )
        .pipe( dest(config.paths.assets_dist+'/img') );
}

/**
 * GULP - Export Tasks
 */
exports.js        = buildJs;
exports.css       = buildCss;
exports.css_min   = buildMinCss;
exports.uglify_js = uglifyJs;
exports.reload    = reloadBrowsersync;
exports.wppot     = generateWpPot;
exports.images    = processImages;
exports.dev       = parallel( startBrowsersync, watchFiles );
exports.default   = series( buildCss, buildJs );