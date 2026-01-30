<?php
/**
 * Template Name: Homepage
 *
 * @package MissionGranted
 * @since 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main">
    <?php
    get_template_part('template-parts/pages/homepage/homepage-hero');
    get_template_part('template-parts/pages/homepage/homepage-stats');
    get_template_part('template-parts/pages/homepage/homepage-features-grid');
    get_template_part('template-parts/pages/homepage/homepage-features-showcase');
    get_template_part('template-parts/pages/homepage/homepage-testimonials');
    get_template_part('template-parts/pages/homepage/homepage-cta-banner');
    ?>
</main>

<?php
get_footer();
