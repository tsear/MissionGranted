<section class="homepage-hero">
    <div id="hero-aurora-root"></div>
    <div class="homepage-hero__container">
        <div class="homepage-hero__content">
            <h1 class="homepage-hero__title">
                <span style="white-space: nowrap;">Grant-Funded Finances,</span><br>Simplified.
            </h1>
            <p class="homepage-hero__subtitle">
                <?php echo wp_kses(get_theme_mod('hero_subtitle', 'MissionGranted is the fuel powering the finances behind matters most, <strong><em>Your Mission.</em></strong>'), array('strong' => array(), 'em' => array())); ?>
            </p>
            <div class="homepage-hero__actions">
                <a href="<?php echo esc_url(get_theme_mod('hero_primary_cta_url', '#signup')); ?>" class="btn btn--primary btn--lg">
                    <?php echo esc_html(get_theme_mod('hero_primary_cta_text', 'Start Free Trial')); ?>
                </a>
                <a href="<?php echo esc_url(get_theme_mod('hero_secondary_cta_url', '#demo')); ?>" class="btn btn--outline btn--lg">
                    <?php echo esc_html(get_theme_mod('hero_secondary_cta_text', 'Watch Demo')); ?>
                </a>
            </div>
        </div>
        <div class="homepage-hero__visual">
            <div id="product-video-root"></div>
        </div>
    </div>
</section>
