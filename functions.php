<?php
/**
 * Mission Granted Theme Functions
 *
 * @package MissionGranted
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Theme Version
define('MISSIONGRANTED_VERSION', '1.0.0');

/**
 * Theme Setup
 */
function missiongranted_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');
    
    // Let WordPress manage the document title
    add_theme_support('title-tag');
    
    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1200, 630, true);
    
    // Add custom image sizes
    add_image_size('missiongranted-featured', 800, 450, true);
    add_image_size('missiongranted-thumbnail', 400, 300, true);
    add_image_size('missiongranted-hero', 1920, 800, true);
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'missiongranted'),
        'footer' => esc_html__('Footer Menu', 'missiongranted'),
    ));
    
    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    
    // Add theme support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Add support for responsive embeds
    add_theme_support('responsive-embeds');
    
    // Add support for editor styles
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');
    
    // Add support for wide alignment
    add_theme_support('align-wide');
    
    // Add support for custom background
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));
}
add_action('after_setup_theme', 'missiongranted_setup');

/**
 * Set the content width
 */
function missiongranted_content_width() {
    $GLOBALS['content_width'] = apply_filters('missiongranted_content_width', 1200);
}
add_action('after_setup_theme', 'missiongranted_content_width', 0);

/**
 * Register Widget Areas
 */
function missiongranted_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'missiongranted'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here to appear in your sidebar.', 'missiongranted'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    // Footer widget areas
    for ($i = 1; $i <= 4; $i++) {
        register_sidebar(array(
            'name'          => sprintf(esc_html__('Footer Widget Area %d', 'missiongranted'), $i),
            'id'            => 'footer-' . $i,
            'description'   => sprintf(esc_html__('Add widgets to footer column %d', 'missiongranted'), $i),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ));
    }
}
add_action('widgets_init', 'missiongranted_widgets_init');

/**
 * Enqueue Scripts and Styles
 */
function missiongranted_scripts() {
    // Tailwind CSS + Flowbite CDN
    wp_enqueue_style('tailwind-css', 'https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css', array(), '3.4.1');
    wp_enqueue_style('flowbite-css', 'https://cdn.jsdelivr.net/npm/flowbite@2.2.1/dist/flowbite.min.css', array(), '2.2.1');
    
    // Main stylesheet (compiled from SCSS)
    wp_enqueue_style('missiongranted-style', get_stylesheet_uri(), array('tailwind-css', 'flowbite-css'), MISSIONGRANTED_VERSION);
    
    // Google Fonts
    wp_enqueue_style('missiongranted-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@600;700;800&display=swap', array(), null);
    
    // Main JavaScript file (bundled)
    $js_file = file_exists(get_template_directory() . '/assets/js/bundle.min.js') 
        ? '/assets/js/bundle.min.js' 
        : '/assets/js/main.js';
    wp_enqueue_script('missiongranted-main', get_template_directory_uri() . $js_file, array('jquery'), MISSIONGRANTED_VERSION . '.' . filemtime(get_template_directory() . $js_file), true);
    
    // Flowbite JS
    wp_enqueue_script('flowbite-js', 'https://cdn.jsdelivr.net/npm/flowbite@2.2.1/dist/flowbite.min.js', array(), '2.2.1', true);
    
    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    
    // Localize script for AJAX and theme data
    wp_localize_script('missiongranted-main', 'missionGrantedData', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('missiongranted-nonce'),
        'themeUrl' => get_template_directory_uri(),
    ));
}
add_action('wp_enqueue_scripts', 'missiongranted_scripts');

/**
 * Custom Post Types
 */
function missiongranted_register_post_types() {
    // Testimonials Post Type
    register_post_type('testimonial', array(
        'labels' => array(
            'name'               => esc_html__('Testimonials', 'missiongranted'),
            'singular_name'      => esc_html__('Testimonial', 'missiongranted'),
            'add_new'            => esc_html__('Add New', 'missiongranted'),
            'add_new_item'       => esc_html__('Add New Testimonial', 'missiongranted'),
            'edit_item'          => esc_html__('Edit Testimonial', 'missiongranted'),
            'new_item'           => esc_html__('New Testimonial', 'missiongranted'),
            'view_item'          => esc_html__('View Testimonial', 'missiongranted'),
            'search_items'       => esc_html__('Search Testimonials', 'missiongranted'),
            'not_found'          => esc_html__('No testimonials found', 'missiongranted'),
            'not_found_in_trash' => esc_html__('No testimonials found in Trash', 'missiongranted'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-format-quote',
        'supports'     => array('title', 'editor', 'thumbnail'),
        'rewrite'      => array('slug' => 'testimonials'),
    ));
    
    // Team Members Post Type
    register_post_type('team', array(
        'labels' => array(
            'name'               => esc_html__('Team Members', 'missiongranted'),
            'singular_name'      => esc_html__('Team Member', 'missiongranted'),
            'add_new'            => esc_html__('Add New', 'missiongranted'),
            'add_new_item'       => esc_html__('Add New Team Member', 'missiongranted'),
            'edit_item'          => esc_html__('Edit Team Member', 'missiongranted'),
            'new_item'           => esc_html__('New Team Member', 'missiongranted'),
            'view_item'          => esc_html__('View Team Member', 'missiongranted'),
            'search_items'       => esc_html__('Search Team', 'missiongranted'),
            'not_found'          => esc_html__('No team members found', 'missiongranted'),
            'not_found_in_trash' => esc_html__('No team members found in Trash', 'missiongranted'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-groups',
        'supports'     => array('title', 'editor', 'thumbnail'),
        'rewrite'      => array('slug' => 'team'),
    ));
    
    // Case Studies Post Type
    register_post_type('case_study', array(
        'labels' => array(
            'name'               => esc_html__('Case Studies', 'missiongranted'),
            'singular_name'      => esc_html__('Case Study', 'missiongranted'),
            'add_new'            => esc_html__('Add New', 'missiongranted'),
            'add_new_item'       => esc_html__('Add New Case Study', 'missiongranted'),
            'edit_item'          => esc_html__('Edit Case Study', 'missiongranted'),
            'new_item'           => esc_html__('New Case Study', 'missiongranted'),
            'view_item'          => esc_html__('View Case Study', 'missiongranted'),
            'search_items'       => esc_html__('Search Case Studies', 'missiongranted'),
            'not_found'          => esc_html__('No case studies found', 'missiongranted'),
            'not_found_in_trash' => esc_html__('No case studies found in Trash', 'missiongranted'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-portfolio',
        'supports'     => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite'      => array('slug' => 'case-studies'),
    ));
}
add_action('init', 'missiongranted_register_post_types');

/**
 * Custom Meta Boxes
 */
function missiongranted_add_meta_boxes() {
    // Testimonial Meta Box
    add_meta_box(
        'testimonial_details',
        esc_html__('Testimonial Details', 'missiongranted'),
        'missiongranted_testimonial_meta_box',
        'testimonial',
        'normal',
        'high'
    );
    
    // Team Member Meta Box
    add_meta_box(
        'team_details',
        esc_html__('Team Member Details', 'missiongranted'),
        'missiongranted_team_meta_box',
        'team',
        'normal',
        'high'
    );
    
    // Case Study Meta Box
    add_meta_box(
        'case_study_details',
        esc_html__('Case Study Details', 'missiongranted'),
        'missiongranted_case_study_meta_box',
        'case_study',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'missiongranted_add_meta_boxes');

/**
 * Testimonial Meta Box Callback
 */
function missiongranted_testimonial_meta_box($post) {
    wp_nonce_field('missiongranted_testimonial_meta', 'missiongranted_testimonial_nonce');
    $author = get_post_meta($post->ID, '_testimonial_author', true);
    $company = get_post_meta($post->ID, '_testimonial_company', true);
    $rating = get_post_meta($post->ID, '_testimonial_rating', true);
    ?>
    <p>
        <label for="testimonial_author"><?php esc_html_e('Author Name:', 'missiongranted'); ?></label><br>
        <input type="text" id="testimonial_author" name="testimonial_author" value="<?php echo esc_attr($author); ?>" class="widefat">
    </p>
    <p>
        <label for="testimonial_company"><?php esc_html_e('Company/Organization:', 'missiongranted'); ?></label><br>
        <input type="text" id="testimonial_company" name="testimonial_company" value="<?php echo esc_attr($company); ?>" class="widefat">
    </p>
    <p>
        <label for="testimonial_rating"><?php esc_html_e('Rating (1-5):', 'missiongranted'); ?></label><br>
        <select id="testimonial_rating" name="testimonial_rating">
            <?php for ($i = 1; $i <= 5; $i++) : ?>
                <option value="<?php echo $i; ?>" <?php selected($rating, $i); ?>><?php echo $i; ?> Star<?php echo $i > 1 ? 's' : ''; ?></option>
            <?php endfor; ?>
        </select>
    </p>
    <?php
}

/**
 * Team Member Meta Box Callback
 */
function missiongranted_team_meta_box($post) {
    wp_nonce_field('missiongranted_team_meta', 'missiongranted_team_nonce');
    $position = get_post_meta($post->ID, '_team_position', true);
    $email = get_post_meta($post->ID, '_team_email', true);
    $linkedin = get_post_meta($post->ID, '_team_linkedin', true);
    ?>
    <p>
        <label for="team_position"><?php esc_html_e('Position/Title:', 'missiongranted'); ?></label><br>
        <input type="text" id="team_position" name="team_position" value="<?php echo esc_attr($position); ?>" class="widefat">
    </p>
    <p>
        <label for="team_email"><?php esc_html_e('Email:', 'missiongranted'); ?></label><br>
        <input type="email" id="team_email" name="team_email" value="<?php echo esc_attr($email); ?>" class="widefat">
    </p>
    <p>
        <label for="team_linkedin"><?php esc_html_e('LinkedIn URL:', 'missiongranted'); ?></label><br>
        <input type="url" id="team_linkedin" name="team_linkedin" value="<?php echo esc_attr($linkedin); ?>" class="widefat">
    </p>
    <?php
}

/**
 * Case Study Meta Box Callback
 */
function missiongranted_case_study_meta_box($post) {
    wp_nonce_field('missiongranted_case_study_meta', 'missiongranted_case_study_nonce');
    $client = get_post_meta($post->ID, '_case_study_client', true);
    $industry = get_post_meta($post->ID, '_case_study_industry', true);
    $results = get_post_meta($post->ID, '_case_study_results', true);
    ?>
    <p>
        <label for="case_study_client"><?php esc_html_e('Client Name:', 'missiongranted'); ?></label><br>
        <input type="text" id="case_study_client" name="case_study_client" value="<?php echo esc_attr($client); ?>" class="widefat">
    </p>
    <p>
        <label for="case_study_industry"><?php esc_html_e('Industry:', 'missiongranted'); ?></label><br>
        <input type="text" id="case_study_industry" name="case_study_industry" value="<?php echo esc_attr($industry); ?>" class="widefat">
    </p>
    <p>
        <label for="case_study_results"><?php esc_html_e('Key Results:', 'missiongranted'); ?></label><br>
        <textarea id="case_study_results" name="case_study_results" rows="4" class="widefat"><?php echo esc_textarea($results); ?></textarea>
    </p>
    <?php
}

/**
 * Save Meta Box Data
 */
function missiongranted_save_meta_boxes($post_id) {
    // Testimonials
    if (isset($_POST['missiongranted_testimonial_nonce']) && wp_verify_nonce($_POST['missiongranted_testimonial_nonce'], 'missiongranted_testimonial_meta')) {
        if (isset($_POST['testimonial_author'])) {
            update_post_meta($post_id, '_testimonial_author', sanitize_text_field($_POST['testimonial_author']));
        }
        if (isset($_POST['testimonial_company'])) {
            update_post_meta($post_id, '_testimonial_company', sanitize_text_field($_POST['testimonial_company']));
        }
        if (isset($_POST['testimonial_rating'])) {
            update_post_meta($post_id, '_testimonial_rating', absint($_POST['testimonial_rating']));
        }
    }
    
    // Team Members
    if (isset($_POST['missiongranted_team_nonce']) && wp_verify_nonce($_POST['missiongranted_team_nonce'], 'missiongranted_team_meta')) {
        if (isset($_POST['team_position'])) {
            update_post_meta($post_id, '_team_position', sanitize_text_field($_POST['team_position']));
        }
        if (isset($_POST['team_email'])) {
            update_post_meta($post_id, '_team_email', sanitize_email($_POST['team_email']));
        }
        if (isset($_POST['team_linkedin'])) {
            update_post_meta($post_id, '_team_linkedin', esc_url_raw($_POST['team_linkedin']));
        }
    }
    
    // Case Studies
    if (isset($_POST['missiongranted_case_study_nonce']) && wp_verify_nonce($_POST['missiongranted_case_study_nonce'], 'missiongranted_case_study_meta')) {
        if (isset($_POST['case_study_client'])) {
            update_post_meta($post_id, '_case_study_client', sanitize_text_field($_POST['case_study_client']));
        }
        if (isset($_POST['case_study_industry'])) {
            update_post_meta($post_id, '_case_study_industry', sanitize_text_field($_POST['case_study_industry']));
        }
        if (isset($_POST['case_study_results'])) {
            update_post_meta($post_id, '_case_study_results', sanitize_textarea_field($_POST['case_study_results']));
        }
    }
}
add_action('save_post', 'missiongranted_save_meta_boxes');

/**
 * Customizer Options
 */
function missiongranted_customize_register($wp_customize) {
    // Add SaaS Settings Section
    $wp_customize->add_section('missiongranted_saas_settings', array(
        'title'    => esc_html__('Mission Granted SaaS Settings', 'missiongranted'),
        'priority' => 30,
    ));
    
    // CTA Button Text
    $wp_customize->add_setting('missiongranted_cta_text', array(
        'default'           => 'Get Started Free',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('missiongranted_cta_text', array(
        'label'   => esc_html__('CTA Button Text', 'missiongranted'),
        'section' => 'missiongranted_saas_settings',
        'type'    => 'text',
    ));
    
    // CTA Button URL
    $wp_customize->add_setting('missiongranted_cta_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('missiongranted_cta_url', array(
        'label'   => esc_html__('CTA Button URL', 'missiongranted'),
        'section' => 'missiongranted_saas_settings',
        'type'    => 'url',
    ));
    
    // Primary Color
    $wp_customize->add_setting('missiongranted_primary_color', array(
        'default'           => '#0066CC',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'missiongranted_primary_color', array(
        'label'   => esc_html__('Primary Color', 'missiongranted'),
        'section' => 'missiongranted_saas_settings',
    )));
}
add_action('customize_register', 'missiongranted_customize_register');

/**
 * Add custom CSS for customizer colors
 */
function missiongranted_customizer_css() {
    $primary_color = get_theme_mod('missiongranted_primary_color', '#0066CC');
    ?>
    <style type="text/css">
        :root {
            --color-primary: <?php echo esc_attr($primary_color); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'missiongranted_customizer_css');

/**
 * Social Media Meta Tags (Open Graph & Twitter Cards)
 * Note: These serve as fallbacks if RankMath is not active
 */
function missiongranted_social_meta_tags() {
    // Get page data
    $title = get_the_title();
    $description = get_the_excerpt();
    $url = get_permalink();
    $site_name = get_bloginfo('name');
    $image = '';
    
    // Use featured image if available
    if (has_post_thumbnail()) {
        $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
    } else {
        // Fallback to site logo or default
        $custom_logo_id = get_theme_mod('custom_logo');
        if ($custom_logo_id) {
            $image = wp_get_attachment_image_url($custom_logo_id, 'full');
        }
    }
    
    // Homepage overrides
    if (is_front_page()) {
        $title = $site_name . ' - ' . get_bloginfo('description');
        $description = get_bloginfo('description');
        $url = home_url('/');
    }
    
    // Archive pages
    if (is_archive()) {
        $title = get_the_archive_title() . ' - ' . $site_name;
        $description = get_the_archive_description();
    }
    
    // Search results
    if (is_search()) {
        $title = 'Search Results for "' . get_search_query() . '" - ' . $site_name;
        $description = 'Search results for ' . get_search_query();
    }
    
    // 404 page
    if (is_404()) {
        $title = 'Page Not Found - ' . $site_name;
        $description = 'The page you are looking for could not be found.';
        $url = home_url('/404');
    }
    
    // Sanitize
    $title = esc_attr(wp_strip_all_tags($title));
    $description = esc_attr(wp_strip_all_tags($description));
    $url = esc_url($url);
    $image = esc_url($image);
    
    ?>
    <!-- Open Graph Meta Tags -->
    <meta property="og:type" content="<?php echo is_single() ? 'article' : 'website'; ?>">
    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:description" content="<?php echo $description; ?>">
    <meta property="og:url" content="<?php echo $url; ?>">
    <meta property="og:site_name" content="<?php echo esc_attr($site_name); ?>">
    <?php if ($image) : ?>
    <meta property="og:image" content="<?php echo $image; ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="<?php echo $title; ?>">
    <?php endif; ?>
    <meta property="og:locale" content="<?php echo get_locale(); ?>">
    
    <?php if (is_single()) : ?>
    <meta property="article:published_time" content="<?php echo get_the_date('c'); ?>">
    <meta property="article:modified_time" content="<?php echo get_the_modified_date('c'); ?>">
    <meta property="article:author" content="<?php echo esc_attr(get_the_author()); ?>">
    <?php endif; ?>
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $title; ?>">
    <meta name="twitter:description" content="<?php echo $description; ?>">
    <?php if ($image) : ?>
    <meta name="twitter:image" content="<?php echo $image; ?>">
    <meta name="twitter:image:alt" content="<?php echo $title; ?>">
    <?php endif; ?>
    
    <?php
    // Add Twitter handle if set in Customizer
    $twitter_handle = get_theme_mod('missiongranted_twitter_handle');
    if ($twitter_handle) :
    ?>
    <meta name="twitter:site" content="@<?php echo esc_attr(ltrim($twitter_handle, '@')); ?>">
    <meta name="twitter:creator" content="@<?php echo esc_attr(ltrim($twitter_handle, '@')); ?>">
    <?php endif; ?>
    
    <!-- Additional Meta Tags -->
    <meta name="description" content="<?php echo $description; ?>">
    <link rel="canonical" href="<?php echo $url; ?>">
    
    <?php
}

/**
 * Add Twitter handle to Customizer
 */
add_action('customize_register', 'missiongranted_social_customizer');
function missiongranted_social_customizer($wp_customize) {
    // Add to existing SaaS Settings section
    $wp_customize->add_setting('missiongranted_twitter_handle', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('missiongranted_twitter_handle', array(
        'label'       => esc_html__('Twitter Handle', 'missiongranted'),
        'description' => esc_html__('Enter your Twitter username (without @)', 'missiongranted'),
        'section'     => 'missiongranted_saas_settings',
        'type'        => 'text',
    ));
}

/**
 * Excerpt Length
 */
function missiongranted_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'missiongranted_excerpt_length');

/**
 * Excerpt More
 */
function missiongranted_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'missiongranted_excerpt_more');

/**
 * AJAX Contact Form Handler
 */
function missiongranted_handle_contact_form() {
    // Verify nonce
    check_ajax_referer('missiongranted-nonce', 'nonce');
    
    // Sanitize inputs
    $name = sanitize_text_field($_POST['name'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $subject = sanitize_text_field($_POST['subject'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');
    
    // Validate
    $errors = array();
    
    if (empty($name)) {
        $errors['name'] = 'Name is required';
    }
    
    if (empty($email) || !is_email($email)) {
        $errors['email'] = 'Valid email is required';
    }
    
    if (empty($subject)) {
        $errors['subject'] = 'Subject is required';
    }
    
    if (empty($message)) {
        $errors['message'] = 'Message is required';
    }
    
    // Return errors if any
    if (!empty($errors)) {
        wp_send_json_error(array(
            'message' => 'Please correct the errors below',
            'errors' => $errors
        ));
    }
    
    // Fire action hook for HubSpot or other integrations to handle
    do_action('missiongranted_contact_form_submitted', array(
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $message
    ));
    
    wp_send_json_success(array(
        'message' => 'Thank you! Your message has been sent successfully. We\'ll get back to you soon.'
    ));
}
add_action('wp_ajax_contact_form', 'missiongranted_handle_contact_form');
add_action('wp_ajax_nopriv_contact_form', 'missiongranted_handle_contact_form');

/**
 * AJAX Demo Request Handler
 */
function missiongranted_handle_demo_request() {
    // Verify nonce
    check_ajax_referer('missiongranted-nonce', 'nonce');
    
    // Sanitize inputs
    $name = sanitize_text_field($_POST['name'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $organization = sanitize_text_field($_POST['organization'] ?? '');
    $phone = sanitize_text_field($_POST['phone'] ?? '');
    
    // Validate
    $errors = array();
    
    if (empty($name)) {
        $errors['name'] = 'Name is required';
    }
    
    if (empty($email) || !is_email($email)) {
        $errors['email'] = 'Valid email is required';
    }
    
    if (empty($organization)) {
        $errors['organization'] = 'Organization is required';
    }
    
    // Return errors if any
    if (!empty($errors)) {
        wp_send_json_error(array(
            'message' => 'Please correct the errors below',
            'errors' => $errors
        ));
    }
    
    // Fire action hook for HubSpot or other integrations to handle
    do_action('missiongranted_demo_request_submitted', array(
        'name' => $name,
        'email' => $email,
        'organization' => $organization,
        'phone' => $phone
    ));
    
    wp_send_json_success(array(
        'message' => 'Thank you! We\'ll contact you shortly to schedule your demo.'
    ));
}
add_action('wp_ajax_demo_request', 'missiongranted_handle_demo_request');
add_action('wp_ajax_nopriv_demo_request', 'missiongranted_handle_demo_request');