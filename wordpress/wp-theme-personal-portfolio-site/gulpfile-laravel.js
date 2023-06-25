const babel = require("gulp-babel");
const watch = require("gulp-watch");
const gulp = require("gulp");
const stylint = require("gulp-stylint");
const rename = require("gulp-rename");
const concat = require("gulp-concat");
const terser = require("gulp-terser");
const cleancss = require("gulp-clean-css");
const stylus = require("gulp-stylus");
const livereload = require("gulp-livereload");
const log = require("fancy-log");
const poststylus = require("poststylus");
const autoprefixer = require("autoprefixer");
const gcmq = require("gulp-group-css-media-queries");
const rucksack = require("rucksack-css");
const plumber = require("gulp-plumber");
const colors = require("ansi-colors");
const sourcemaps = require("gulp-sourcemaps");

/** Variables */
const source = "dev/";
const dest = "public/";

gulp.task("vendorjs", () =>
    gulp
        .src([
            "node_modules/babel-polyfill/dist/polyfill.js",
            `${source}js/vendor/*.js`
        ])
        .pipe(terser())
        .pipe(concat("vendor.min.js"))
        .pipe(gulp.dest(`${dest}js`))
        .on("error", e => {
            log.error(colors.red(`[ERROR] VendorJS was failed: ${e}`));
        })
);

gulp.task("vendorcss", () =>
    gulp
        .src([`${source}css/vendor/*.css`])
        .pipe(concat("vendor.min.css"))
        .pipe(
            cleancss({
                compatibility: "ie8",
                level: {
                    1: {},
                    2: {}
                }
            })
        )
        .pipe(gulp.dest(`${dest}css`))
        .on("error", e => {
            log.error(colors.red(`[ERROR] VendorCSS was failed: ${e}`));
        })
);

gulp.task("js", () =>
    gulp
        .src(`${source}js/*.js`)
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(concat("main.min.js"))
        .pipe(
            babel({
                presets: [
                    [
                        "env",
                        {
                            targets: {
                                browsers: ["last 2 versions", "ie >= 9"]
                            }
                        }
                    ]
                ]
            })
        )
        .pipe(terser())
        .pipe(sourcemaps.write("."))
        .pipe(gulp.dest(`${dest}js`))
        .on("error", e => {
            log.error(colors.red(`[ERROR] JS build was failed: ${e}`));
        })
        .pipe(livereload())
);

gulp.task("lint", () =>
    gulp
        .src([`${source}css/layout/*.styl`, `${source}css/modules/**/*.styl`])
        .pipe(stylint())
        .pipe(stylint.reporter())
);

const processors = [
    autoprefixer({
        browsers: [
            "ie >= 9",
            "ie_mob >= 10",
            "ff >= 30",
            "chrome >= 34",
            "safari >= 6",
            "opera >= 23",
            "ios >= 6",
            "android >= 4.4",
            "bb >= 10"
        ],
        cascade: false
    }),
    rucksack,
    gcmq
];

gulp.task("css", () =>
    gulp
        .src(`${source}css/style.styl`)
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(
            stylus({
                use: [poststylus(processors)],
                "include css": false
            })
        )
        .pipe(rename({ suffix: ".min" }))
        .pipe(
            cleancss({
                compatibility: "ie8",
                level: {
                    1: {},
                    2: {}
                }
            })
        )
        .pipe(sourcemaps.write("."))
        .pipe(gulp.dest(`${dest}css`))
        .on("error", e => {
            log.error(colors.red(`[ERROR] CSS build was failed: ${e}`));
        })
        .pipe(livereload())
);

/* Watchers */
gulp.task("watch", () => {
    watch(`${source}css/**/*.styl`, gulp.series("css"));

    watch(`${source}js/**/*.js`, gulp.series("js"));

    watch(`${dest}css/*.css`, file => {
        log.info(colors.blue("[INFO] Style has been changed!"));
        livereload.changed(file.path);
    });

    watch('resources/views/**/*.php', file => {
        log.info(colors.green("[INFO] BLADE has been changed!"));
        livereload.changed(file.path);
    });

    livereload.listen();
});

/* Default task */
gulp.task("buildVendors", gulp.parallel("vendorcss", "vendorjs"));
gulp.task("default", gulp.parallel("css", "js"));
