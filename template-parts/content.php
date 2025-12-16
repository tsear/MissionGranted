<?php
/**
 * Template part for displaying posts
 *
 * @package MissionGranted
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;
        ?>
        <div class="entry-meta">
            <span class="posted-on"><?php echo get_the_date(); ?></span>
            <span class="byline"><?php echo esc_html__('by', 'missiongranted') . ' ' . get_the_author(); ?></span>
        </div>
    </header>

    <?php if (has_post_thumbnail() && !is_singular()) : ?>
    <div class="post-thumbnail">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('missiongranted-featured'); ?>
        </a>
    </div>
    <?php endif; ?>

    <div class="entry-content">
        <?php
        if (is_singular()) :
            the_content();
            
            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'missiongranted'),
                'after'  => '</div>',
            ));
        else :
            the_excerpt();
        endif;
        ?>
    </div>

    <?php if (!is_singular()) : ?>
    <footer class="entry-footer">
        <a href="<?php the_permalink(); ?>" class="read-more">
            <?php echo esc_html__('Read More', 'missiongranted'); ?> &rarr;
        </a>
    </footer>
    <?php endif; ?>
</article>
