<?php
/**
 * Template Name: About MissionGranted
 * Description: About MissionGranted - Product Overview
 */

get_header(); ?>

<main id="main-content" class="bg-white">
    <?php
    // Hero
    get_template_part('template-parts/pages/about/about-hero');
    
    // Product Overview
    get_template_part('template-parts/pages/about/about-product-overview');
    
    // Stats
    get_template_part('template-parts/pages/about/about-platform-capabilities');
    
    // Product Video
    get_template_part('template-parts/pages/about/about-product-video');
    
    // Mission & Why We Built This
    get_template_part('template-parts/pages/about/about-mission');
    
    // Smart Grant Solutions
    get_template_part('template-parts/pages/about/about-smart-grant-solutions');
    
    // CTA
    get_template_part('template-parts/pages/about/about-cta');
    ?>
</main>

<?php get_footer();
