<?php
/**
 * Template Name: Resources
 * Description: Hub page for pricing, support, and partner resources
 *
 * @package MissionGranted
 * @since 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main">
    <?php
    // Resources Cards
    get_template_part('template-parts/pages/resources/resources-cards');
    
    // Additional Info Section
    get_template_part('template-parts/pages/resources/resources-info');
    
    // CTA Section
    get_template_part('template-parts/pages/resources/resources-cta');
    ?>
</main>

<?php
get_footer();
