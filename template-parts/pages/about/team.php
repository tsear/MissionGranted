<section class="team-section">
    <div class="team-section__container">
        <div class="team-section__header">
            <h2 class="team-section__title">
                <?php echo esc_html(get_theme_mod('team_title', 'Meet Our Team')); ?>
            </h2>
            <p class="team-section__subtitle">
                <?php echo esc_html(get_theme_mod('team_subtitle', 'The people behind Mission Granted')); ?>
            </p>
        </div>
        <div class="team-section__grid">
            <?php
            $team_query = new WP_Query(array(
                'post_type' => 'team',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ));
            
            if ($team_query->have_posts()) :
                while ($team_query->have_posts()) : $team_query->the_post();
                    $position = get_post_meta(get_the_ID(), '_team_position', true);
                    $email = get_post_meta(get_the_ID(), '_team_email', true);
                    $linkedin = get_post_meta(get_the_ID(), '_team_linkedin', true);
                    $twitter = get_post_meta(get_the_ID(), '_team_twitter', true);
            ?>
            <div class="team-section__card">
                <?php if (has_post_thumbnail()) : ?>
                <div class="team-section__photo">
                    <?php the_post_thumbnail('medium'); ?>
                </div>
                <?php endif; ?>
                <div class="team-section__info">
                    <h3 class="team-section__name"><?php the_title(); ?></h3>
                    <?php if ($position) : ?>
                    <p class="team-section__position"><?php echo esc_html($position); ?></p>
                    <?php endif; ?>
                    <div class="team-section__bio">
                        <?php the_excerpt(); ?>
                    </div>
                    <?php if ($linkedin || $twitter || $email) : ?>
                    <div class="team-section__social">
                        <?php if ($linkedin) : ?>
                        <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener">LinkedIn</a>
                        <?php endif; ?>
                        <?php if ($twitter) : ?>
                        <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener">Twitter</a>
                        <?php endif; ?>
                        <?php if ($email) : ?>
                        <a href="mailto:<?php echo esc_attr($email); ?>">Email</a>
                        <?php endif; ?>
                    </div>
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
