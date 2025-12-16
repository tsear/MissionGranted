<?php
/**
 * The footer template file
 *
 * @package MissionGranted
 * @since 1.0.0
 */
?>

    <footer class="site-footer">
        <div class="container">
            <div class="footer-content">
                <?php
                // Display footer widgets if they exist
                for ($i = 1; $i <= 4; $i++) {
                    if (is_active_sidebar('footer-' . $i)) {
                        echo '<div class="footer-column">';
                        dynamic_sidebar('footer-' . $i);
                        echo '</div>';
                    }
                }
                
                // Default footer content if no widgets
                if (!is_active_sidebar('footer-1') && !is_active_sidebar('footer-2') && 
                    !is_active_sidebar('footer-3') && !is_active_sidebar('footer-4')) :
                ?>
                    <div class="footer-column">
                        <div class="footer-widget">
                            <h4><?php bloginfo('name'); ?></h4>
                            <p><?php bloginfo('description'); ?></p>
                        </div>
                    </div>
                    
                    <div class="footer-column">
                        <div class="footer-widget">
                            <h4><?php esc_html_e('Quick Links', 'missiongranted'); ?></h4>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer',
                                'menu_class'     => 'footer-menu',
                                'container'      => false,
                                'fallback_cb'    => false,
                            ));
                            ?>
                        </div>
                    </div>
                    
                    <div class="footer-column">
                        <div class="footer-widget">
                            <h4><?php esc_html_e('Contact', 'missiongranted'); ?></h4>
                            <p><?php esc_html_e('Get in touch with our team to learn more about Mission Granted.', 'missiongranted'); ?></p>
                        </div>
                    </div>
                    
                    <div class="footer-column">
                        <div class="footer-widget">
                            <h4><?php esc_html_e('Stay Connected', 'missiongranted'); ?></h4>
                            <p><?php esc_html_e('Subscribe to our newsletter for updates and grant management tips.', 'missiongranted'); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'missiongranted'); ?></p>
                <p><?php esc_html_e('A product by Smart Grant Solutions', 'missiongranted'); ?></p>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
