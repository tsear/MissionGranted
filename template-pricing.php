<?php
/**
 * Template Name: Pricing & Billing
 *
 * @package MissionGranted
 * @since 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main bg-white">
    <?php
    // Custom pricing hero
    get_template_part('template-parts/pages/pricing/pricing-hero');
    
    // Interactive pricing calculator
    get_template_part('template-parts/pages/pricing/pricing-calculator');
    
    // Plan comparison cards
    get_template_part('template-parts/pages/pricing/pricing-pricing-cards');
    
    // FAQ section
    get_template_part('template-parts/pages/pricing/pricing-faq');
    
    // CTA banner
    get_template_part('template-parts/pages/homepage/homepage-cta-banner');
    ?>
</main>

<?php
get_footer();
