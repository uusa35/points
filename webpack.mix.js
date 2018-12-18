const mix = require('laravel-mix').mix;

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.js('resources/assets/js/app.js', 'public/js').version()
    .sass('resources/assets/sass/app.scss', 'public/css').version();
// backend
mix.styles([
    './node_modules/font-awesome/css/font-awesome.min.css',
    '../metronic_v4.5.6/theme/assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
    '../metronic_v4.5.6/theme/assets/global/plugins/bootstrap/css/bootstrap.min.css',
    '../metronic_v4.5.6/theme/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',

    '../metronic_v4.5.6/theme/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css',
    '../metronic_v4.5.6/theme/assets/global/plugins/morris/morris.css"',
    '../metronic_v4.5.6/theme/assets/global/plugins/fullcalendar/fullcalendar.min.css"',
    '../metronic_v4.5.6/theme/assets/global/plugins/jqvmap/jqvmap/jqvmap.css"',


    '../metronic_v4.5.6/theme/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css',
    '../metronic_v4.5.6/theme/assets/global/plugins/jquery-multi-select/css/multi-select.css',
    '../metronic_v4.5.6/theme/assets/global/plugins/select2/css/select2.min.css',
    '../metronic_v4.5.6/theme/assets/global/plugins/select2/css/select2-bootstrap.min.css',
    '../metronic_v4.5.6/theme//assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css',
    '../metronic_v4.5.6/theme//assets/global/plugins/jquery-minicolors/jquery.minicolors.css',


    '../metronic_v4.5.6/theme/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css',
    '../metronic_v4.5.6/theme/assets/global/plugins/datatables/datatables.min.css',
    '../metronic_v4.5.6/theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css',
    '../metronic_v4.5.6/theme/assets/global/plugins/cubeportfolio/css/cubeportfolio.css',

    '../metronic_v4.5.6/theme/assets/global/css/components.min.css',
    '../metronic_v4.5.6/theme/assets/global/css/plugins.min.css',
    '../metronic_v4.5.6/theme/assets/pages/css/portfolio.min.css',
    '../metronic_v4.5.6/theme/assets/pages/css/profile.min.css',
    '../metronic_v4.5.6/theme/assets/pages/css/pricing.min.css',
    '../metronic_v4.5.6/theme/assets/pages/css/blog.min.css',
    '../metronic_v4.5.6/theme/assets/layouts/layout2/css/layout.min.css',
    // '../metronic_v4.5.6/theme/assets/layouts/layout/css/themes/darkblue.min.css',
    '../metronic_v4.5.6/theme/assets/layouts/layout2/css/themes/blue.min.css',
    // '../metronic_v4.5.6/theme/assets/layouts/layout2/css/themes/light.min.css',
    // '../metronic_v4.5.6/theme/assets/layouts/layout2/css/themes/grey.min.css',
    '../metronic_v4.5.6/theme/assets/layouts/layout2/css/custom.min.css',
    './resources/assets/css/backend-custom.css'

], 'public/css/backend.css').version();

mix.styles([
    './node_modules/font-awesome/css/font-awesome.min.css',
    '../metronic_v4.5.6/theme_rtl/assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
    '../metronic_v4.5.6/theme_rtl/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css',
    '../metronic_v4.5.6/theme_rtl/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css',

    '../metronic_v4.5.6/theme_rtl/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css',
    '../metronic_v4.5.6/theme_rtl/assets/global/plugins/morris/morris.css"',
    '../metronic_v4.5.6/theme_rtl/assets/global/plugins/fullcalendar/fullcalendar.min.css"',
    '../metronic_v4.5.6/theme_rtl/assets/global/plugins/jqvmap/jqvmap/jqvmap.css"',


    '../metronic_v4.5.6/theme_rtl/assets/global/plugins/bootstrap-select/css/bootstrap-select-rtl.min.css',
    '../metronic_v4.5.6/theme_rtl/assets/global/plugins/jquery-multi-select/css/multi-select-rtl.css',
    '../metronic_v4.5.6/theme_rtl/assets/global/plugins/select2/css/select2.min-rtl.css',
    '../metronic_v4.5.6/theme_rtl/assets/global/plugins/select2/css/select2-bootstrap.min.css',
    '../metronic_v4.5.6/theme_rtl//assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css',
    '../metronic_v4.5.6/theme_rtl//assets/global/plugins/jquery-minicolors/jquery.minicolors.css',


    '../metronic_v4.5.6/theme_rtl/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css',
    '../metronic_v4.5.6/theme_rtl/assets/global/plugins/datatables/datatables.min.css',
    '../metronic_v4.5.6/theme_rtl/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css',

    '../metronic_v4.5.6/theme_rtl/assets/global/plugins/cubeportfolio/css/cubeportfolio.css',
    '../metronic_v4.5.6/theme_rtl/assets/global/css/components-rtl.min.css',
    '../metronic_v4.5.6/theme_rtl/assets/global/css/plugins-rtl.min.css',
    '../metronic_v4.5.6/theme_rtl/assets/pages/css/profile.min.css',
    '../metronic_v4.5.6/theme_rtl/assets/pages/css/portfolio.min.css',
    '../metronic_v4.5.6/theme-rtl/assets/pages/css/blog.min.css',
    '../metronic_v4.5.6/theme_rtl/assets/pages/css/pricing.min.css',
    '../metronic_v4.5.6/theme_rtl/assets/layouts/layout2/css/layout-rtl.min.css',
    // '../metronic_v4.5.6/theme_rtl/assets/layouts/layout/css/themes/darkblue-rtl.min.css',
    '../metronic_v4.5.6/theme_rtl/assets/layouts/layout2/css/themes/blue-rtl.min.css',
    // '../metronic_v4.5.6/theme_rtl/assets/layouts/layout2/css/themes/light.min.css',
    // '../metronic_v4.5.6/theme_rtl/assets/layouts/layout2/css/themes/grey.min.css',
    '../metronic_v4.5.6/theme_rtl/assets/layouts/layout2/css/custom-rtl.min.css',
    './resources/assets/css/backend-custom.css',
    'resources/assets/css/backend-custom-ar.css',
], 'public/css/backend-rtl.css').version();


mix.scripts([
        '../metronic_v4.5.6/theme_rtl/assets/global/plugins/respond.min.js',
        '../metronic_v4.5.6/theme/assets/global/plugins/excanvas.min.js',
        '../metronic_v4.5.6/theme/assets/global/plugins/jquery.min.js',
        '../metronic_v4.5.6/theme/assets/global/plugins/bootstrap/js/bootstrap.min.js',

        '../metronic_v4.5.6/theme/assets/global/plugins/datatables/datatables.min.js',
        '../metronic_v4.5.6/theme/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js',
        '../metronic_v4.5.6/theme/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js',
        '../metronic_v4.5.6/theme/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js',
        '../metronic_v4.5.6/theme/assets/global/plugins/select2/js/select2.full.min.js',

        '../metronic_v4.5.6/theme/assets/global/plugins/js.cookie.min.js',
        '../metronic_v4.5.6/theme/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
        '../metronic_v4.5.6/theme/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        '../metronic_v4.5.6/theme/assets/global/plugins/jquery.blockui.min.js',
        '../metronic_v4.5.6/theme/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
        '../metronic_v4.5.6/theme/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js',
        '../metronic_v4.5.6/theme/assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js',
        '../metronic_v4.5.6/theme/assets/global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js',
        '../metronic_v4.5.6/theme/assets/global/scripts/app.min.js',

        '../metronic_v4.5.6/theme/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js',
        '../metronic_v4.5.6/theme/assets/global/plugins/jquery.sparkline.min.js',
        '../metronic_v4.5.6/theme/assets/pages/scripts/profile.min.js',
        '../metronic_v4.5.6/theme/assets/pages/scripts/portfolio-4.min.js',
        '../metronic_v4.5.6/theme/assets/pages/scripts/portfolio-1.min.js',

        '../metronic_v4.5.6/theme/assets/pages/scripts/components-multi-select.min.js',
        '../metronic_v4.5.6/theme/assets/pages/scripts/components-color-pickers.min.js',
        '../metronic_v4.5.6/theme/assets/layouts/layout2/scripts/layout.min.js',
        '../metronic_v4.5.6/theme/assets/layouts/layout2/scripts/demo.min.js',
        '../metronic_v4.5.6/theme/assets/layouts/global/scripts/quick-sidebar.min.js',
    ],
    'public/js/backend.js').version();

// mix.scripts('./node_modules/tinymce/tinymce.min.js', 'public/js/tinymce.min.js').version();
mix.scripts('resources/assets/js/backend-custom.js', 'public/js/backend-custom.js');
mix.copyDirectory('../metronic_v4.5.6/theme/assets/global/plugins/simple-line-icons/fonts', 'public/css/fonts');
mix.copyDirectory('./../metronic_v4.5.6/theme/assets/global/plugins/datatables/images', 'public/plugins/datatables/images');
mix.copyDirectory('./../metronic_v4.5.6/theme/assets/global/plugins/cubeportfolio/img', 'public/img');
mix.copyDirectory('./../metronic_v4.5.6/theme/assets/layouts/layout2/img', 'public/img');
mix.copyDirectory('./node_modules/font-awesome/fonts', 'public/fonts');
mix.copyDirectory('./node_modules/tinymce/plugins', 'public/js/plugins');
mix.copyDirectory('./node_modules/tinymce/skins', 'public/js/skins');
mix.copyDirectory('./node_modules/tinymce/themes', 'public/js/themes');

