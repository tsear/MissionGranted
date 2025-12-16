<?php
/**
 * The template for displaying all pages
 *
 * @package MissionGranted
 * @since 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main">
    <section class="section">
        <div class="container">
            <?php
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    </header>

                    <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('missiongranted-featured'); ?>
                    </div>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php
                        the_content();

                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'missiongranted'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>
                </article>

                <?php
                // Comments
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
            endwhile;
            ?>
        </div>
    </section>
</main>

<?php
get_footer();
