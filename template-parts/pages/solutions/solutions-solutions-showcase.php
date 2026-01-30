<section class="solutions-solutions-showcase">
    <div class="solutions-solutions-showcase__container">
        <?php
        $showcases = array(
            array(
                'title' => 'Discover Grants That Match Your Mission',
                'desc' => 'Our AI-powered search engine analyzes your nonprofit profile and matches you with relevant grants from foundations, government agencies, and corporate programs.',
                'reverse' => false
            ),
            array(
                'title' => 'Streamline Your Application Process',
                'desc' => 'Save time with reusable templates, collaborative editing, and automatic deadline reminders. Our platform guides you through every step.',
                'reverse' => true
            ),
            array(
                'title' => 'Track Performance & Optimize Success',
                'desc' => 'Get actionable insights with real-time analytics. See which grants convert best, track your win rate, and make data-driven decisions.',
                'reverse' => false
            )
        );
        foreach ($showcases as $index => $showcase) :
            $modifier = $showcase['reverse'] ? 'solutions-solutions-showcase__row--reverse' : '';
        ?>
        <div class="solutions-solutions-showcase__row <?php echo $modifier; ?>">
            <div class="solutions-solutions-showcase__content">
                <h2 class="solutions-solutions-showcase__title"><?php echo esc_html($showcase['title']); ?></h2>
                <p class="solutions-solutions-showcase__desc"><?php echo esc_html($showcase['desc']); ?></p>
            </div>
            <div class="solutions-solutions-showcase__visual">
                <?php if (get_theme_mod("feature_showcase_{$index}_image")) : ?>
                    <img src="<?php echo esc_url(get_theme_mod("feature_showcase_{$index}_image")); ?>" alt="<?php echo esc_attr($showcase['title']); ?>">
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
