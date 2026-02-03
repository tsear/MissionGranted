<?php
/**
 * Template Name: For Funders
 *
 * @package MissionGranted
 * @since 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main funders-page">
    <?php
    get_template_part('template-parts/pages/funders/funders-hero');
    get_template_part('template-parts/pages/funders/funders-value-props');
    get_template_part('template-parts/pages/funders/funders-types');
    get_template_part('template-parts/pages/funders/funders-cohort-model');
    get_template_part('template-parts/pages/funders/funders-approach');
    get_template_part('template-parts/pages/funders/funders-cta');
    ?>
</main>

<?php
get_footer();
