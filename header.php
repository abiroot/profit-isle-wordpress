<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ProfitIsle
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<span class="position-absolute trigger">
        <!-- hidden trigger to apply 'stuck' styles -->
</span>
<?php wp_body_open(); ?>
<div id="page" class="site">

    <header id="masthead" class="site-header">
        <div class="home-header-container">
            <nav id="navbar_top" class="navbar navbar-expand-lg fixed-top">
                <div class="container">
                    <div class="navbar-brand">
                        <?php
                        the_custom_logo();
                        ?>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse text-center" id="navbarNav">
                        <?php
                        wp_nav_menu(
                            array(
                                'container' => false,
                                'theme_location' => 'primary-menu',
                                'menu_id' => 'primary-menu',
                                'menu_class' => 'navbar-nav ms-auto',
                                'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                                'walker' => new WP_Bootstrap_Navwalker(),
                            )
                        );
                        ?>
                        <div class="menu-buttons">
                            <a class="btn btn-hover ms-3 bold-800 white-color" href="../findout/app.html">
                                Request Demo
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header><!-- #masthead -->
