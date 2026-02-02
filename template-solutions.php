<?php
/**
 * Template Name: Solutions
 * Description: Hub page for industry-specific financial grant management solutions
 *
 * @package MissionGranted
 * @since 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main">
    <?php
    // Industry Solutions Cards
    get_template_part('template-parts/pages/solutions/solutions-industry-cards');
    
    // Shared Platform Features
    get_template_part('template-parts/pages/solutions/solutions-platform-features');
    
    // Comparison Overview
    get_template_part('template-parts/pages/solutions/solutions-comparison');
    
    // CTA Section
    get_template_part('template-parts/pages/solutions/solutions-cta');
    ?>
</main>

<?php
get_footer();
