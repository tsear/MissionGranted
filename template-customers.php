<?php
/**
 * Template Name: Customers
 *
 * @package MissionGranted
 * @since 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main customers-page">
    <?php
    get_template_part('template-parts/pages/page-hero');
    get_template_part('template-parts/pages/customers/customers-resources');
    get_template_part('template-parts/pages/customers/customers-quick-links');
    get_template_part('template-parts/pages/customers/customers-cta');
    ?>
</main>

<?php
get_footer();
