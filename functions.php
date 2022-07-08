<?php

/**
 * ProfitIsle functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ProfitIsle
 */

if (!defined('_PRI_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_PRI_VERSION', '1.3.2');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function profit_isle_setup()
{
    /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on ProfitIsle, use a find and replace
        * to change 'profit-isle' to the name of your theme in all the template files.
        */
    load_theme_textdomain('profit-isle', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
    add_theme_support('title-tag');

    /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'primary-menu' => esc_html__('Primary', 'profit-isle'),
            'footer-menu' => esc_html__('Footer', 'profit-isle'),
        )
    );

    /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'profit_isle_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        )
    );
}

add_action('after_setup_theme', 'profit_isle_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function profit_isle_content_width()
{
    $GLOBALS['content_width'] = apply_filters('profit_isle_content_width', 640);
}

add_action('after_setup_theme', 'profit_isle_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function profit_isle_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'profit-isle'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'profit-isle'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}

add_action('widgets_init', 'profit_isle_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function profit_isle_scripts()
{
    //	Bootstrap
    wp_enqueue_style('parent-twitter-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css", array(), "5.0.2");
    wp_enqueue_script('parent-twitter-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js", array('jquery'), "5.0.2", true);


    wp_enqueue_style('profit-isle-header-style', get_template_directory_uri() . '/css/header.css', array(), _PRI_VERSION);
    wp_enqueue_style('profit-isle-footer-style', get_template_directory_uri() . '/css/footer.css', array(), _PRI_VERSION);
    wp_enqueue_style('profit-isle-style', get_stylesheet_uri(), array(), _PRI_VERSION);
//    wp_style_add_data('profit-isle-style', 'rtl', 'replace');

    wp_enqueue_script('profit-isle-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _PRI_VERSION, true);
    wp_enqueue_script('profit-isle-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), _PRI_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'profit_isle_scripts');

/**
 * Load Custom WP Bakery Elements
 */
require get_template_directory() . '/vc-elements/main.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Load custom helper classes
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
require get_template_directory() . '/inc/AbirootCLI/class-abiroot-cli.php';
require get_template_directory() . '/inc/meta-box-class/my-meta-box-class.php';


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 *  Allows the upload of SVG images
 */
function hd_svg_mime_type($mimes = array())
{
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'hd_svg_mime_type');
define('ALLOW_UNFILTERED_UPLOADS', true);


/**
 * Check if the given string is valid base 64 encoded.
 *
 * @param string $string The string to check.
 * @return bool Return `true` if valid, `false` for otherwise.
 */
function isBase64Encoded($string): bool
{
    if (!is_string($string)) {
        // if check value is not string.
        // base64_decode require this argument to be string, if not then just return `false`.
        // don't use type hint because `false` value will be converted to empty string.
        return false;
    }

    $decoded = base64_decode($string, true);
    if (false === $decoded) {
        return false;
    }

    if (json_encode([$decoded]) === false) {
        return false;
    }

    return true;
}// isBase64Encoded


function getLocationInfoByIp(){
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = @$_SERVER['REMOTE_ADDR'];
    $result  = array('country'=>'', 'city'=>'');
    if(filter_var($client, FILTER_VALIDATE_IP)){
        $ip = $client;
    }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        $ip = $forward;
    }else{
        $ip = $remote;
    }
    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
    if($ip_data && $ip_data->geoplugin_countryName != null){
        $result['country'] = $ip_data->geoplugin_countryCode;
        $result['city'] = $ip_data->geoplugin_city;
    }
    return $result;
}


/**
 * Registers our command when cli get's initialized.
 *
 * @since  1.0.0
 * @author Ayman Abi Aoun
 */
function abr_cli_register_commands() {
    WP_CLI::add_command( 'abiroot', 'ABIROOT_CLI' );
}

add_action( 'cli_init', 'abr_cli_register_commands' );
