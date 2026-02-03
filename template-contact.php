<?php
/**
 * Template Name: Contact
 *
 * @package MissionGranted
 * @since 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main bg-white">
    <?php
    get_template_part('template-parts/pages/contact/contact-hero');
    get_template_part('template-parts/pages/contact/contact-contact-form');
    ?>
</main>

<?php
get_footer();
