<?php
/**
 * The header template file
 *
 * @package MissionGranted
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <?php
    // Open Graph and Twitter Card Meta Tags
    // Note: RankMath will override these if configured
    if (!function_exists('rank_math_the_breadcrumbs')) {
        missiongranted_social_meta_tags();
    }
    ?>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link sr-only" href="#main-content"><?php esc_html_e('Skip to content', 'missiongranted'); ?></a>

    <div id="card-nav-root"></div>
