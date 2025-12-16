<section class="pricing-cards-section">
    <div class="pricing-cards-section__container">
        <div class="pricing-cards-section__header">
            <h2 class="pricing-cards-section__title">
                <?php echo esc_html(get_theme_mod('pricing_title', 'Simple, Transparent Pricing')); ?>
            </h2>
            <p class="pricing-cards-section__subtitle">
                <?php echo esc_html(get_theme_mod('pricing_subtitle', 'Choose the plan that fits your organization')); ?>
            </p>
        </div>
        <div class="pricing-cards-section__grid">
            <?php
            $plans = array(
                array(
                    'name' => 'Starter',
                    'price' => '$49',
                    'period' => 'per month',
                    'features' => array('Up to 3 users', '50 grant applications/year', 'Basic analytics', 'Email support'),
                    'cta' => 'Start Free Trial',
                    'featured' => false
                ),
                array(
                    'name' => 'Professional',
                    'price' => '$149',
                    'period' => 'per month',
                    'features' => array('Up to 10 users', 'Unlimited applications', 'Advanced analytics', 'Priority support', 'Custom templates'),
                    'cta' => 'Start Free Trial',
                    'featured' => true
                ),
                array(
                    'name' => 'Enterprise',
                    'price' => 'Custom',
                    'period' => 'contact us',
                    'features' => array('Unlimited users', 'Dedicated account manager', 'Custom integrations', 'SLA guarantee', 'Training & onboarding'),
                    'cta' => 'Contact Sales',
                    'featured' => false
                )
            );
            foreach ($plans as $plan) :
                $featured_class = $plan['featured'] ? 'pricing-cards-section__card--featured' : '';
            ?>
            <div class="pricing-cards-section__card <?php echo $featured_class; ?>">
                <?php if ($plan['featured']) : ?>
                <div class="pricing-cards-section__badge">Most Popular</div>
                <?php endif; ?>
                <h3 class="pricing-cards-section__plan-name"><?php echo esc_html($plan['name']); ?></h3>
                <div class="pricing-cards-section__price">
                    <span class="pricing-cards-section__amount"><?php echo esc_html($plan['price']); ?></span>
                    <span class="pricing-cards-section__period"><?php echo esc_html($plan['period']); ?></span>
                </div>
                <ul class="pricing-cards-section__features">
                    <?php foreach ($plan['features'] as $feature) : ?>
                    <li><?php echo esc_html($feature); ?></li>
                    <?php endforeach; ?>
                </ul>
                <a href="#signup" class="btn <?php echo $plan['featured'] ? 'btn--primary' : 'btn--outline'; ?> btn--full">
                    <?php echo esc_html($plan['cta']); ?>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
