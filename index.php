<?php
/**
 * The main template file
 *
 * @package MissionGranted
 * @since 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main">
    <div class="container">
        <div class="content-area">
            <?php
            if (have_posts()) :
                // Start the Loop
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content', get_post_format());
                endwhile;

                // Pagination
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => esc_html__('Previous', 'missiongranted'),
                    'next_text' => esc_html__('Next', 'missiongranted'),
                ));
            else :
                get_template_part('template-parts/content', 'none');
            endif;
            ?>
        </div>
    </div>
</main>

<?php
get_footer();
