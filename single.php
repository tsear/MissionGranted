<?php
/**
 * The template for displaying all single posts
 *
 * @package MissionGranted
 * @since 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main">
    <div class="container">
        <div class="content-wrapper">
            <?php
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', get_post_type());

                // Social Sharing Buttons
                get_template_part('template-parts/social-sharing');

                // Post navigation
                the_post_navigation(array(
                    'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'missiongranted') . '</span> <span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'missiongranted') . '</span> <span class="nav-title">%title</span>',
                ));

                // Comments
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
            endwhile;
            ?>
        </div>
    </div>
</main>

<?php
get_footer();
