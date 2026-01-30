<?php
/**
 * Template Name: Pricing & Billing
 *
 * @package MissionGranted
 * @since 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main">
    <?php
    get_template_part('template-parts/pages/page-hero');
    get_template_part('template-parts/pages/pricing/pricing-pricing-cards');
    get_template_part('template-parts/pages/homepage/homepage-testimonials');
    get_template_part('template-parts/pages/homepage/homepage-cta-banner');
    ?>
</main>

<?php
get_footer();
