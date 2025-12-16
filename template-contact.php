<?php
/**
 * Template Name: Contact
 *
 * @package MissionGranted
 * @since 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main">
    <?php
    get_template_part('template-parts/pages/page-hero');
    get_template_part('template-parts/pages/contact/contact-form');
    ?>
</main>

<?php
get_footer();
