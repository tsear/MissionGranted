<?php
/**
 * Template Name: About
 *
 * @package MissionGranted
 * @since 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main">
    <?php
    get_template_part('template-parts/pages/page-hero');
    get_template_part('template-parts/pages/about/team');
    get_template_part('template-parts/pages/homepage/stats');
    get_template_part('template-parts/pages/homepage/cta-banner');
    ?>
</main>

<?php
get_footer();
    <section class="hero">
        <div class="container">
            <h1><?php the_title(); ?></h1>
            <?php if (has_excerpt()) : ?>
                <p><?php the_excerpt(); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Page Content -->
    <?php
    while (have_posts()) :
        the_post();
    ?>
    <section class="section">
        <div class="container">
            <div class="page-content">
                <?php the_content(); ?>
            </div>
        </div>
    </section>
    <?php
    endwhile;
    ?>

    <!-- Team Section -->
    <?php
    $team_members = new WP_Query(array(
        'post_type'      => 'team',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    ));

    if ($team_members->have_posts()) :
    ?>
    <section class="section section-light team-section">
        <div class="container">
            <div class="text-center">
                <h2><?php esc_html_e('Meet Our Team', 'missiongranted'); ?></h2>
                <p><?php esc_html_e('Passionate professionals dedicated to empowering nonprofits', 'missiongranted'); ?></p>
            </div>
            
            <div class="team-grid">
                <?php
                while ($team_members->have_posts()) :
                    $team_members->the_post();
                    $position = get_post_meta(get_the_ID(), '_team_position', true);
                    $email = get_post_meta(get_the_ID(), '_team_email', true);
                    $linkedin = get_post_meta(get_the_ID(), '_team_linkedin', true);
                ?>
                <div class="team-card">
                    <?php if (has_post_thumbnail()) : ?>
                    <div class="team-photo">
                        <?php the_post_thumbnail('missiongranted-thumbnail'); ?>
                    </div>
                    <?php endif; ?>
                    
                    <div class="team-info">
                        <h3><?php the_title(); ?></h3>
                        <?php if ($position) : ?>
                        <p class="team-position"><?php echo esc_html($position); ?></p>
                        <?php endif; ?>
                        
                        <div class="team-bio">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <div class="team-social">
                            <?php if ($email) : ?>
                            <a href="mailto:<?php echo esc_attr($email); ?>" title="<?php esc_attr_e('Email', 'missiongranted'); ?>">
                                📧
                            </a>
                            <?php endif; ?>
                            
                            <?php if ($linkedin) : ?>
                            <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener" title="<?php esc_attr_e('LinkedIn', 'missiongranted'); ?>">
                                💼
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Mission & Values Section -->
    <section class="section">
        <div class="container">
            <div class="text-center">
                <h2><?php esc_html_e('Our Mission & Values', 'missiongranted'); ?></h2>
            </div>
            
            <div class="feature-grid">
                <div class="feature-card">
                    <div class="feature-icon">🎯</div>
                    <h3><?php esc_html_e('Our Mission', 'missiongranted'); ?></h3>
                    <p><?php esc_html_e('To empower nonprofits with technology that simplifies grant management, enabling them to focus on their mission and create greater impact in their communities.', 'missiongranted'); ?></p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">💡</div>
                    <h3><?php esc_html_e('Innovation', 'missiongranted'); ?></h3>
                    <p><?php esc_html_e('We continuously evolve our platform with cutting-edge technology to stay ahead of the changing needs of the nonprofit sector.', 'missiongranted'); ?></p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🤝</div>
                    <h3><?php esc_html_e('Partnership', 'missiongranted'); ?></h3>
                    <p><?php esc_html_e('We view our clients as partners in change, working together to overcome challenges and achieve meaningful results.', 'missiongranted'); ?></p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">✨</div>
                    <h3><?php esc_html_e('Excellence', 'missiongranted'); ?></h3>
                    <p><?php esc_html_e('We hold ourselves to the highest standards in everything we do, from product quality to customer service.', 'missiongranted'); ?></p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🌍</div>
                    <h3><?php esc_html_e('Impact', 'missiongranted'); ?></h3>
                    <p><?php esc_html_e('We measure our success by the positive impact our clients make in the world through the funding they secure.', 'missiongranted'); ?></p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">🔒</div>
                    <h3><?php esc_html_e('Integrity', 'missiongranted'); ?></h3>
                    <p><?php esc_html_e('We operate with transparency, honesty, and respect in all our relationships and business practices.', 'missiongranted'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section section-light cta-section">
        <div class="container text-center">
            <h2><?php esc_html_e('Join Us in Empowering Nonprofits', 'missiongranted'); ?></h2>
            <p><?php esc_html_e('Discover how Mission Granted can help your organization secure more funding', 'missiongranted'); ?></p>
            <a href="<?php echo esc_url(get_theme_mod('missiongranted_cta_url', '#')); ?>" class="btn btn-primary btn-lg">
                <?php echo esc_html(get_theme_mod('missiongranted_cta_text', 'Get Started Free')); ?>
            </a>
        </div>
    </section>
</main>

<?php
get_footer();
