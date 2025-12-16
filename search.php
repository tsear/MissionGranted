<?php
/**
 * The template for displaying search results
 *
 * @package MissionGranted
 * @since 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main">
    <section class="section">
        <div class="container">
            <header class="page-header">
                <h1 class="page-title">
                    <?php
                    printf(
                        esc_html__('Search Results for: %s', 'missiongranted'),
                        '<span>' . get_search_query() . '</span>'
                    );
                    ?>
                </h1>
            </header>

            <?php if (have_posts()) : ?>
                <div class="search-results">
                    <?php
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/content', 'search');
                    endwhile;

                    the_posts_pagination(array(
                        'mid_size'  => 2,
                        'prev_text' => esc_html__('Previous', 'missiongranted'),
                        'next_text' => esc_html__('Next', 'missiongranted'),
                    ));
                    ?>
                </div>
            <?php else : ?>
                <?php get_template_part('template-parts/content', 'none'); ?>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php
get_footer();
