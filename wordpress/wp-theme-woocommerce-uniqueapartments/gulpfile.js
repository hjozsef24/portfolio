require('v8-compile-cache');
const http = require('http');
const babel = require('gulp-babel');
const watch = require('gulp-watch');
const gulp = require('gulp');
const stylint = require('gulp-stylint');
const rename = require('gulp-rename');
const concat = require('gulp-concat');
const terser = require('gulp-terser');
const stylus = require('gulp-stylus');
const livereload = require('gulp-livereload');
const log = require('fancy-log');
const autoprefixer = require('autoprefixer');
const plumber = require('gulp-plumber');
const colors = require('ansi-colors');
const sourcemaps = require('gulp-sourcemaps');
const { tmpdir } = require('os');
const path = require('path');
const fs = require('fs');
const fancyLog = require('fancy-log');
const chalk = require('chalk');

const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const postcssPresetEnv = require('postcss-preset-env');
const cache = require('gulp-cache');

const tap = require('gulp-tap');

const noop = function () { };

/** Variables */
const source = 'dev/';
const dest = '';

let watchMode = false;

const paths = {
    phps: [`${dest}**/*.php`, '!node_modules/**/*'],
    htmls: [`${dest}**/*.html`, '!node_modules/**/*']
};

const errorPluginStub = function () {
    const ErrorPlugin = (function () {
        ErrorPlugin.identifier = 'error';
        ErrorPlugin.version = '1.0';

        function ErrorPlugin(window, host) {
            this.window = window;
            this.host = host;
        }

        ErrorPlugin.prototype.block = false;
        ErrorPlugin.prototype.reload = function (path, options) {
            if (path && path.substr(0, 6) === 'error:') {
                this.block = true;
                setTimeout(function () {
                    this.block = false;
                }.bind(this), 3000);
                console.log(path.substr(6));
                document.write("<pre>" + path.substr(6) + "</pre>");
                return true;
            }

            return this.block;
        };

        ErrorPlugin.prototype.analyze = function () { };

        return ErrorPlugin;
    })();

    window.LiveReload.addPlugin(ErrorPlugin);
};

function customErrorHandler(error) {
    if (watchMode) {
        livereload.changed(`error:${error.toString()}`);
    }
    fancyLog(chalk.cyan('Plumber') + chalk.red(' found unhandled error:\n'), error.toString());
}

gulp.task('vendorjs', () =>
    gulp
        .src(['node_modules/@babel/polyfill/dist/polyfill.js', `${source}js/vendor/*.js`])
        .pipe(cache(terser()))
        .pipe(concat('vendor.min.js'))
        .pipe(gulp.dest(`${dest}assets/js`))
        .on('error', e => {
            log.error(colors.red(`[ERROR] VendorJS was failed: ${e}`));
        })
);

gulp.task('delayed_vendorjs', () =>
    gulp
        .src([`${source}js/delayed/vendor/*.js`])
        .pipe(cache(terser()))
        .pipe(concat('vendor.min.js'))
        .pipe(gulp.dest(`${dest}assets/js/delayed`))
        .on('error', e => {
            log.error(colors.red(`[ERROR] Delayed VendorJS was failed: ${e}`));
        })
);

gulp.task('vendorcss', () =>
    gulp
        .src([`${source}css/vendor/*.css`])
        .pipe(concat('vendor.min.css'))
        .pipe(cache(postcss([autoprefixer(), cssnano()])))
        .pipe(gulp.dest(`${dest}assets/css`))
        .on('error', e => {
            log.error(colors.red(`[ERROR] VendorCSS was failed: ${e}`));
        })
);

gulp.task('js', () =>
    gulp
        .src(`${source}js/*.js`)
        .pipe(plumber({ errorHandler: customErrorHandler }))
        .pipe(sourcemaps.init())
        .pipe(
            cache(
                babel({
                    presets: ['@babel/preset-env']
                })
            )
        )
        .pipe(concat('main.min.js'))
        .pipe(watchMode ? tap(noop) : cache(terser()))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(`${dest}assets/js`))
        .on('error', e => {
            log.error(colors.red(`[ERROR] JS build was failed: ${e}`));
        })
        .pipe(livereload())
);

gulp.task('delayed_js', () =>
    gulp
        .src(`${source}js/delayed/**/*.js`)
        .pipe(plumber({ errorHandler: customErrorHandler }))
        .pipe(sourcemaps.init())
        .pipe(
            cache(
                babel({
                    presets: ['@babel/preset-env']
                })
            )
        )
        .pipe(concat('main.min.js'))
        .pipe(watchMode ? tap(noop) : cache(terser()))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(`${dest}assets/js/delayed`))
        .on('error', e => {
            log.error(colors.red(`[ERROR] Delayed JS build was failed: ${e}`));
        })
        .pipe(livereload())
);

gulp.task('lint', () =>
    gulp
        .src([`${source}css/layout/*.styl`, `${source}css/modules/**/*.styl`])
        .pipe(stylint())
        .pipe(stylint.reporter())
);

gulp.task('css', () =>
    gulp
        .src(`${source}css/style.styl`)
        .pipe(plumber({ errorHandler: customErrorHandler }))
        .pipe(sourcemaps.init())
        .pipe(
            stylus({
                'include css': false
            })
        )
        .pipe(postcss([postcssPresetEnv({ stage: 2 })]))
        .pipe(rename({ suffix: '.min' }))
        .pipe(watchMode ? tap(noop) : cache(postcss([cssnano()])))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(`${dest}assets/css`))
        .on('error', e => {
            log.error(colors.red(`[ERROR] CSS build was failed: ${e}`));
        })
        .pipe(livereload())
        .on('end', function () {
            livereload.reload()
        })
);

function prepareLivereloadCustom() {
    const tmpFile = path.join(tmpdir(), 'liver.js');
    const reloadOriginal = fs.readFileSync(require.resolve('livereload-js/dist/livereload.js'));
    const myplugin = '(' + errorPluginStub.toString() + ')()';
    fs.writeFileSync(tmpFile, reloadOriginal + '\n' + myplugin);
    return tmpFile;
}

prepareLivereloadCustom();

/* Watchers */
gulp.task('watch', () => {
    watchMode = true;
    watch(`${source}css/**/*.styl`, gulp.series('css'));

    watch(`${source}js/*.js`, gulp.series('js'));
    watch(`${source}js/delayed/**/*.js`, gulp.series('delayed_js'));

    watch(`${dest}assets/css/*.css`, file => {
        log.info(colors.blue('[INFO] Style has been changed!'));
        livereload.changed(file.path);
    });

    watch(paths.htmls, file => {
        log.info(colors.green('[INFO] HTML has been changed!'));
        livereload.changed(file.path);
    });

    watch(paths.phps, file => {
        log.info(colors.yellow('[INFO] PHP has been changed!'));
        livereload.changed(file.path);
    });

    // hack to make livereload work with CORS
    const staticLivereload = prepareLivereloadCustom();
    const Server = require('tiny-lr').Server;
    class TinyServer extends Server {
        livereload(req, res) {
            res.setHeader('Content-Type', 'application/javascript');
            res.setHeader('Access-Control-Allow-Origin', '*');
            fs.createReadStream(staticLivereload).pipe(res);
        }
    }
    require('tiny-lr').Server = TinyServer;
    // hack end
    livereload.listen({
        livereload: staticLivereload
    });
});

/* Default task */
gulp.task('buildVendors', gulp.parallel(['vendorjs', 'delayed_vendorjs', 'vendorcss']));
gulp.task('buildAll', gulp.parallel(['vendorjs', 'delayed_vendorjs', 'vendorcss', 'js', 'delayed_js', 'css']));
gulp.task('default', gulp.parallel(['lint', 'css', 'js', 'delayed_js']));
gulp.task('cacheClear', () => cache.clearAll());
