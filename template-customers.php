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
    get_template_part('template-parts/pages/customers/customers-hero');
    get_template_part('template-parts/pages/customers/customers-help');
    get_template_part('template-parts/pages/customers/customers-updates');
    get_template_part('template-parts/pages/customers/customers-account');
    ?>
</main>

<?php
get_footer();
