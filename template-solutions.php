<?php
/**
 * Template Name: Solutions
 *
 * @package MissionGranted
 * @since 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main">
    <?php
    get_template_part('template-parts/pages/page-hero');
    get_template_part('template-parts/pages/solutions/solutions-showcase');
    get_template_part('template-parts/pages/solutions/solutions-grid');
    get_template_part('template-parts/pages/homepage/cta-banner');
    ?>
</main>

<?php
get_footer();
