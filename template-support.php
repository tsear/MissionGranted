<?php
/**
 * Template Name: Support
 *
 * @package MissionGranted
 * @since 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main support-page">
    <?php
    get_template_part('template-parts/pages/support/support-hero');
    get_template_part('template-parts/pages/support/support-resources');
    get_template_part('template-parts/pages/support/support-community');
    get_template_part('template-parts/pages/support/support-faq');
    get_template_part('template-parts/pages/support/support-cta');
    ?>
</main>

<?php
get_footer();
