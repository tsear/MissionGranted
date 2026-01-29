<?php
/**
 * The template for displaying 404 pages
 *
 * @package MissionGranted
 * @since 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main">
    <div class="error-404" style="padding-top: 8rem;">
        <div class="error-404__content">
            <div class="error-404__code" aria-hidden="true">404</div>
            <h1 class="error-404__title"><?php esc_html_e('Page Not Found', 'missiongranted'); ?></h1>
            <p class="error-404__message">
                <?php esc_html_e('Sorry, we couldn\'t find the page you\'re looking for. It might have been moved, deleted, or never existed.', 'missiongranted'); ?>
            </p>

            <div class="error-404__links" style="justify-content: center;">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn--primary">
                    <?php esc_html_e('Back to Home', 'missiongranted'); ?>
                </a>
            </div>

            <?php
            // Show popular pages or recent posts
            $recent_posts = wp_get_recent_posts(array('numberposts' => 3, 'post_status' => 'publish'));
            if ($recent_posts) :
            ?>
            <div class="error-404__suggestions" style="margin-top: 3rem;">
                <h2 style="font-size: 1.25rem; margin-bottom: 1.5rem; color: #6b7280;">
                    <?php esc_html_e('Or check out these recent posts:', 'missiongranted'); ?>
                </h2>
                <div class="suggestions-grid" style="display: grid; gap: 1rem; max-width: 500px; margin: 0 auto; text-align: left;">
                    <?php foreach ($recent_posts as $post) : ?>
                    <a href="<?php echo get_permalink($post['ID']); ?>" style="padding: 1rem; border: 1px solid #e5e5e5; border-radius: 8px; text-decoration: none; transition: border-color 0.2s;">
                        <h3 style="font-size: 1rem; margin-bottom: 0.25rem; color: #111827;">
                            <?php echo esc_html($post['post_title']); ?>
                        </h3>
                        <time style="font-size: 0.875rem; color: #6b7280;">
                            <?php echo get_the_date('', $post['ID']); ?>
                        </time>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php
get_footer();
