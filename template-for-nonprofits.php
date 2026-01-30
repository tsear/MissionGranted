<?php
/**
 * Template Name: For Nonprofits
 *
 * @package MissionGranted
 * @since 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main nonprofits-page">
    <?php
    get_template_part('template-parts/pages/nonprofits/nonprofits-hero');
    get_template_part('template-parts/pages/nonprofits/nonprofits-challenge');
    get_template_part('template-parts/pages/nonprofits/nonprofits-solution');
    get_template_part('template-parts/pages/nonprofits/nonprofits-consulting');
    get_template_part('template-parts/pages/nonprofits/nonprofits-industries');
    get_template_part('template-parts/pages/nonprofits/nonprofits-cta');
    ?>
</main>

<?php
get_footer();
