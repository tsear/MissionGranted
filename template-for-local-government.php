<?php
/**
 * Template Name: For Local Government
 *
 * @package MissionGranted
 * @since 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main local-government-page">
    <?php
    get_template_part('template-parts/pages/local-government/local-government-hero');
    get_template_part('template-parts/pages/local-government/local-government-features');
    get_template_part('template-parts/pages/local-government/local-government-challenges');
    get_template_part('template-parts/pages/local-government/local-government-consulting');
    get_template_part('template-parts/pages/local-government/local-government-use-cases');
    get_template_part('template-parts/pages/local-government/local-government-cta');
    ?>
</main>

<?php
get_footer();
