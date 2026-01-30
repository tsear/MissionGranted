<section class="solutions-solutions-grid">
    <div class="solutions-solutions-grid__container">
        <div class="solutions-solutions-grid__header">
            <h2 class="solutions-solutions-grid__title">
                <?php echo esc_html(get_theme_mod('features_title', 'Everything You Need to Win Grants')); ?>
            </h2>
            <p class="solutions-solutions-grid__subtitle">
                <?php echo esc_html(get_theme_mod('features_subtitle', 'Powerful tools designed specifically for nonprofits')); ?>
            </p>
        </div>
        <div class="solutions-solutions-grid__grid">
            <?php
            $features = array(
                array('icon' => '🔍', 'title' => 'Grant Discovery', 'desc' => 'AI-powered matching with 10,000+ grants'),
                array('icon' => '✍️', 'title' => 'Smart Applications', 'desc' => 'Templates and auto-fill save hours of work'),
                array('icon' => '📊', 'title' => 'Analytics Dashboard', 'desc' => 'Track success rates and optimize strategy'),
                array('icon' => '🤝', 'title' => 'Team Collaboration', 'desc' => 'Work together seamlessly in real-time'),
                array('icon' => '⏰', 'title' => 'Deadline Tracking', 'desc' => 'Never miss another grant deadline'),
                array('icon' => '🔒', 'title' => 'Secure & Compliant', 'desc' => 'Bank-level security and data protection')
            );
            foreach ($features as $feature) :
            ?>
            <div class="solutions-solutions-grid__item">
                <div class="solutions-solutions-grid__icon"><?php echo $feature['icon']; ?></div>
                <h3 class="solutions-solutions-grid__item-title"><?php echo esc_html($feature['title']); ?></h3>
                <p class="solutions-solutions-grid__item-desc"><?php echo esc_html($feature['desc']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
