<?php
/**
 * Template Name: Pricing
 *
 * @package MissionGranted
 * @since 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main">
    <?php
    get_template_part('template-parts/pages/page-hero');
    get_template_part('template-parts/pages/pricing/pricing-cards');
    get_template_part('template-parts/pages/homepage/testimonials');
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
            <?php else : ?>
                <p><?php esc_html_e('Choose the plan that fits your organization\'s needs', 'missiongranted'); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="section pricing-section">
        <div class="container">
            <div class="pricing-grid">
                <!-- Starter Plan -->
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3><?php esc_html_e('Starter', 'missiongranted'); ?></h3>
                        <div class="pricing-price">
                            <span class="currency">$</span>
                            <span class="amount">99</span>
                            <span class="period"><?php esc_html_e('/month', 'missiongranted'); ?></span>
                        </div>
                        <p><?php esc_html_e('Perfect for small nonprofits getting started', 'missiongranted'); ?></p>
                    </div>
                    
                    <ul class="pricing-features">
                        <li>✓ <?php esc_html_e('Up to 3 team members', 'missiongranted'); ?></li>
                        <li>✓ <?php esc_html_e('10 active grant applications', 'missiongranted'); ?></li>
                        <li>✓ <?php esc_html_e('Grant discovery database', 'missiongranted'); ?></li>
                        <li>✓ <?php esc_html_e('Basic reporting', 'missiongranted'); ?></li>
                        <li>✓ <?php esc_html_e('Email support', 'missiongranted'); ?></li>
                        <li>✓ <?php esc_html_e('1 GB storage', 'missiongranted'); ?></li>
                    </ul>
                    
                    <div class="pricing-cta">
                        <a href="#" class="btn btn-outline btn-lg">
                            <?php esc_html_e('Start Free Trial', 'missiongranted'); ?>
                        </a>
                    </div>
                </div>

                <!-- Professional Plan (Featured) -->
                <div class="pricing-card pricing-card-featured">
                    <div class="pricing-badge"><?php esc_html_e('Most Popular', 'missiongranted'); ?></div>
                    <div class="pricing-header">
                        <h3><?php esc_html_e('Professional', 'missiongranted'); ?></h3>
                        <div class="pricing-price">
                            <span class="currency">$</span>
                            <span class="amount">299</span>
                            <span class="period"><?php esc_html_e('/month', 'missiongranted'); ?></span>
                        </div>
                        <p><?php esc_html_e('For growing organizations with active grant programs', 'missiongranted'); ?></p>
                    </div>
                    
                    <ul class="pricing-features">
                        <li>✓ <?php esc_html_e('Up to 10 team members', 'missiongranted'); ?></li>
                        <li>✓ <?php esc_html_e('Unlimited grant applications', 'missiongranted'); ?></li>
                        <li>✓ <?php esc_html_e('Advanced grant matching', 'missiongranted'); ?></li>
                        <li>✓ <?php esc_html_e('Custom templates & workflows', 'missiongranted'); ?></li>
                        <li>✓ <?php esc_html_e('Advanced analytics & reports', 'missiongranted'); ?></li>
                        <li>✓ <?php esc_html_e('Priority support', 'missiongranted'); ?></li>
                        <li>✓ <?php esc_html_e('10 GB storage', 'missiongranted'); ?></li>
                        <li>✓ <?php esc_html_e('API access', 'missiongranted'); ?></li>
                    </ul>
                    
                    <div class="pricing-cta">
                        <a href="#" class="btn btn-primary btn-lg">
                            <?php esc_html_e('Start Free Trial', 'missiongranted'); ?>
                        </a>
                    </div>
                </div>

                <!-- Enterprise Plan -->
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3><?php esc_html_e('Enterprise', 'missiongranted'); ?></h3>
                        <div class="pricing-price">
                            <span class="amount" style="font-size: 2rem;"><?php esc_html_e('Custom', 'missiongranted'); ?></span>
                        </div>
                        <p><?php esc_html_e('For large organizations with complex needs', 'missiongranted'); ?></p>
                    </div>
                    
                    <ul class="pricing-features">
                        <li>✓ <?php esc_html_e('Unlimited team members', 'missiongranted'); ?></li>
                        <li>✓ <?php esc_html_e('Everything in Professional', 'missiongranted'); ?></li>
                        <li>✓ <?php esc_html_e('Dedicated account manager', 'missiongranted'); ?></li>
                        <li>✓ <?php esc_html_e('Custom integrations', 'missiongranted'); ?></li>
                        <li>✓ <?php esc_html_e('White-label options', 'missiongranted'); ?></li>
                        <li>✓ <?php esc_html_e('24/7 phone support', 'missiongranted'); ?></li>
                        <li>✓ <?php esc_html_e('Unlimited storage', 'missiongranted'); ?></li>
                        <li>✓ <?php esc_html_e('Custom training & onboarding', 'missiongranted'); ?></li>
                        <li>✓ <?php esc_html_e('SLA guarantee', 'missiongranted'); ?></li>
                    </ul>
                    
                    <div class="pricing-cta">
                        <a href="#" class="btn btn-outline btn-lg">
                            <?php esc_html_e('Contact Sales', 'missiongranted'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="section section-light">
        <div class="container">
            <div class="text-center">
                <h2><?php esc_html_e('Frequently Asked Questions', 'missiongranted'); ?></h2>
            </div>
            
            <div class="faq-container">
                <div class="faq-item">
                    <h4><?php esc_html_e('Can I switch plans later?', 'missiongranted'); ?></h4>
                    <p><?php esc_html_e('Absolutely! You can upgrade or downgrade your plan at any time. Changes will be reflected in your next billing cycle.', 'missiongranted'); ?></p>
                </div>
                
                <div class="faq-item">
                    <h4><?php esc_html_e('Is there a free trial?', 'missiongranted'); ?></h4>
                    <p><?php esc_html_e('Yes, we offer a 14-day free trial for all plans. No credit card required to start your trial.', 'missiongranted'); ?></p>
                </div>
                
                <div class="faq-item">
                    <h4><?php esc_html_e('What payment methods do you accept?', 'missiongranted'); ?></h4>
                    <p><?php esc_html_e('We accept all major credit cards, ACH transfers, and can arrange invoicing for annual subscriptions.', 'missiongranted'); ?></p>
                </div>
                
                <div class="faq-item">
                    <h4><?php esc_html_e('Do you offer discounts for annual payments?', 'missiongranted'); ?></h4>
                    <p><?php esc_html_e('Yes! Save 20% when you pay annually. Contact our sales team for multi-year discounts.', 'missiongranted'); ?></p>
                </div>
                
                <div class="faq-item">
                    <h4><?php esc_html_e('What kind of support is included?', 'missiongranted'); ?></h4>
                    <p><?php esc_html_e('All plans include email support. Professional plans get priority support, and Enterprise customers receive 24/7 phone support with a dedicated account manager.', 'missiongranted'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Page Content -->
    <?php
    while (have_posts()) :
        the_post();
        if (get_the_content()) :
    ?>
    <section class="section">
        <div class="container">
            <div class="page-content">
                <?php the_content(); ?>
            </div>
        </div>
    </section>
    <?php
        endif;
    endwhile;
    ?>

    <!-- CTA Section -->
    <section class="section cta-section">
        <div class="container text-center">
            <h2><?php esc_html_e('Not Sure Which Plan is Right?', 'missiongranted'); ?></h2>
            <p><?php esc_html_e('Let us help you find the perfect fit for your organization', 'missiongranted'); ?></p>
            <a href="#" class="btn btn-primary btn-lg">
                <?php esc_html_e('Talk to an Expert', 'missiongranted'); ?>
            </a>
        </div>
    </section>
</main>

<?php
get_footer();
