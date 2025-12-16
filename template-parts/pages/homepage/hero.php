<section class="hero-section">
    <div id="hero-aurora-root"></div>
    <div class="hero-section__container">
        <div class="hero-section__content">
            <h1 class="hero-section__title">
                <span style="white-space: nowrap;">Grant-Funded Finances,</span><br>Simplified.
            </h1>
            <p class="hero-section__subtitle">
                <?php echo wp_kses(get_theme_mod('hero_subtitle', 'MissionGranted is the fuel powering the finances behind matters most, <strong><em>Your Mission.</em></strong>'), array('strong' => array(), 'em' => array())); ?>
            </p>
            <div class="hero-section__actions">
                <a href="<?php echo esc_url(get_theme_mod('hero_primary_cta_url', '#signup')); ?>" class="btn btn--primary btn--lg">
                    <?php echo esc_html(get_theme_mod('hero_primary_cta_text', 'Start Free Trial')); ?>
                </a>
                <a href="<?php echo esc_url(get_theme_mod('hero_secondary_cta_url', '#demo')); ?>" class="btn btn--outline btn--lg">
                    <?php echo esc_html(get_theme_mod('hero_secondary_cta_text', 'Watch Demo')); ?>
                </a>
            </div>
        </div>
        <div class="hero-section__visual">
            <?php if (get_theme_mod('hero_image')) : ?>
                <img src="<?php echo esc_url(get_theme_mod('hero_image')); ?>" alt="<?php echo esc_attr(get_theme_mod('hero_title')); ?>">
            <?php endif; ?>
        </div>
    </div>
</section>
