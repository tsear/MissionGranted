<section class="testimonials-section">
    <div class="testimonials-section__container">
        <div class="testimonials-section__header">
            <h2 class="testimonials-section__title">
                <?php echo esc_html(get_theme_mod('testimonials_title', 'Trusted by Nonprofits Nationwide')); ?>
            </h2>
            <p class="testimonials-section__subtitle">
                <?php echo esc_html(get_theme_mod('testimonials_subtitle', 'See how Mission Granted helps organizations secure more funding')); ?>
            </p>
        </div>
        <div class="testimonials-section__grid">
            <?php
            $testimonials_query = new WP_Query(array(
                'post_type' => 'testimonial',
                'posts_per_page' => 3,
                'orderby' => 'date',
                'order' => 'DESC'
            ));
            
            if ($testimonials_query->have_posts()) :
                while ($testimonials_query->have_posts()) : $testimonials_query->the_post();
                    $author = get_post_meta(get_the_ID(), '_testimonial_author', true);
                    $company = get_post_meta(get_the_ID(), '_testimonial_company', true);
                    $rating = get_post_meta(get_the_ID(), '_testimonial_rating', true);
            ?>
            <div class="testimonials-section__card">
                <?php if ($rating) : ?>
                <div class="testimonials-section__rating">
                    <?php for ($i = 0; $i < intval($rating); $i++) : ?>
                    <span class="testimonials-section__star">★</span>
                    <?php endfor; ?>
                </div>
                <?php endif; ?>
                <div class="testimonials-section__content">
                    <?php the_content(); ?>
                </div>
                <div class="testimonials-section__author">
                    <strong class="testimonials-section__name"><?php echo esc_html($author); ?></strong>
                    <?php if ($company) : ?>
                    <span class="testimonials-section__company"><?php echo esc_html($company); ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <?php 
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>
