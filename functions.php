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
    // Bundled Tailwind CSS
    wp_enqueue_style('missiongranted-tailwind', get_template_directory_uri() . '/assets/css/tailwind.min.css', array(), MISSIONGRANTED_VERSION);
    
    // Bundled Flowbite CSS
    wp_enqueue_style('flowbite-css', get_template_directory_uri() . '/assets/css/flowbite.min.css', array(), '2.2.1');
    
    // Main stylesheet (compiled from SCSS - custom components and legacy styles)
    wp_enqueue_style('missiongranted-style', get_stylesheet_uri(), array('missiongranted-tailwind', 'flowbite-css'), MISSIONGRANTED_VERSION);
    
    // Google Fonts
    wp_enqueue_style('missiongranted-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@600;700;800&display=swap', array(), null);
    
    // CardNav Bundle - Loaded on ALL pages for global navigation
    $cardnav_file = get_template_directory() . '/assets/js/bundle-cardnav.min.js';
    if (file_exists($cardnav_file)) {
        wp_enqueue_script(
            'missiongranted-cardnav', 
            get_template_directory_uri() . '/assets/js/bundle-cardnav.min.js', 
            array(), 
            MISSIONGRANTED_VERSION . '.' . filemtime($cardnav_file), 
            true
        );
    }
    
    // Homepage Bundle - Loaded ONLY on homepage template
    if (is_page_template('template-home.php')) {
        $homepage_file = get_template_directory() . '/assets/js/bundle-homepage.min.js';
        if (file_exists($homepage_file)) {
            wp_enqueue_script(
                'missiongranted-homepage', 
                get_template_directory_uri() . '/assets/js/bundle-homepage.min.js', 
                array(), 
                MISSIONGRANTED_VERSION . '.' . filemtime($homepage_file), 
                true
            );
        }
    }
    
    // Bundled Flowbite JS
    wp_enqueue_script('flowbite-js', get_template_directory_uri() . '/assets/js/flowbite.min.js', array(), '2.2.1', true);
    
    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    
    // Localize script for AJAX and theme data (attach to CardNav since it's always loaded)
    wp_localize_script('missiongranted-cardnav', 'missionGrantedData', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('missiongranted-nonce'),
        'themeUrl' => get_template_directory_uri(),
    ));
}
add_action('wp_enqueue_scripts', 'missiongranted_scripts');

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