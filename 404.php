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
    <section class="hero">
        <div class="container text-center">
            <h1><?php esc_html_e('404', 'missiongranted'); ?></h1>
            <p><?php esc_html_e('Oops! The page you\'re looking for doesn\'t exist.', 'missiongranted'); ?></p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="error-404-content text-center">
                <h2><?php esc_html_e('Let\'s get you back on track', 'missiongranted'); ?></h2>
                
                <div class="error-404-search">
                    <?php get_search_form(); ?>
                </div>

                <div class="error-404-links">
                    <h3><?php esc_html_e('Quick Links', 'missiongranted'); ?></h3>
                    <div class="feature-grid" style="max-width: 800px; margin: 0 auto;">
                        <div class="feature-card">
                            <h4><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'missiongranted'); ?></a></h4>
                            <p><?php esc_html_e('Return to our homepage', 'missiongranted'); ?></p>
                        </div>
                        <div class="feature-card">
                            <h4><a href="<?php echo esc_url(home_url('/features')); ?>"><?php esc_html_e('Features', 'missiongranted'); ?></a></h4>
                            <p><?php esc_html_e('Explore our platform features', 'missiongranted'); ?></p>
                        </div>
                        <div class="feature-card">
                            <h4><a href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Contact Us', 'missiongranted'); ?></a></h4>
                            <p><?php esc_html_e('Get in touch with our team', 'missiongranted'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
