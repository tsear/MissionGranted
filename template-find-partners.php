<?php
/**
 * Template Name: Find Partners
 * Description: Partner directory and RFP generator page
 *
 * @package MissionGranted
 * @since 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main">
    <?php
    // Hero
    get_template_part('template-parts/pages/partners/partners-hero');
    
    // Partner Directory Grid (with shortcode support)
    get_template_part('template-parts/pages/partners/partners-directory');
    
    // RFP Generator (with shortcode support)
    get_template_part('template-parts/pages/partners/partners-generator');
    
    // Product Info
    get_template_part('template-parts/pages/partners/partners-product-info');
    
    // CTA Section
    get_template_part('template-parts/pages/partners/partners-cta');
    ?>
</main>

<?php
get_footer();
