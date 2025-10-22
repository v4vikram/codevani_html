<?php
/**
 * Codevani Theme Functions
 *
 * @package Codevani
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define theme constants
define('CODEVANI_VERSION', '1.0.0');
define('CODEVANI_THEME_DIR', get_template_directory());
define('CODEVANI_THEME_URL', get_template_directory_uri());

/**
 * Theme Setup
 */
function codevani_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));
    add_theme_support('custom-logo', array(
        'height'      => 120,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('custom-background');
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('responsive-embeds');
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    
    // Add support for editor styles
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'codevani'),
        'footer'  => __('Footer Menu', 'codevani'),
    ));
    
    // Add image sizes
    add_image_size('codevani-hero', 1200, 800, true);
    add_image_size('codevani-portfolio', 600, 400, true);
    add_image_size('codevani-blog', 800, 500, true);
    add_image_size('codevani-team', 400, 400, true);
}
add_action('after_setup_theme', 'codevani_setup');

/**
 * Enqueue Scripts and Styles
 */
function codevani_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('codevani-style', get_stylesheet_uri(), array(), CODEVANI_VERSION);
    
    // Enqueue Tailwind CSS
    wp_enqueue_style('tailwind-css', 'https://cdn.tailwindcss.com', array(), '3.3.0');
    
    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css', array(), '7.0.1');
    
    // Enqueue jQuery
    wp_enqueue_script('jquery');
    
    // Enqueue jQuery Validation
    wp_enqueue_script('jquery-validation', 'https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js', array('jquery'), '1.19.5', true);
    
    // Enqueue theme JavaScript
    wp_enqueue_script('codevani-script', CODEVANI_THEME_URL . '/assets/js/app.js', array('jquery'), CODEVANI_VERSION, true);
    
    // Localize script for AJAX
    wp_localize_script('codevani-script', 'codevani_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('codevani_nonce'),
    ));
    
    // Enqueue comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'codevani_scripts');

/**
 * Register Widget Areas
 */
function codevani_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'codevani'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'codevani'),
        'before_widget' => '<section id="%1$s" class="widget glass-effect rounded-3xl p-6 mb-6 %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title text-xl font-bold mb-4 gradient-text">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget 1', 'codevani'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in the first footer column.', 'codevani'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="font-bold mb-4">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget 2', 'codevani'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in the second footer column.', 'codevani'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="font-bold mb-4">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget 3', 'codevani'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in the third footer column.', 'codevani'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="font-bold mb-4">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget 4', 'codevani'),
        'id'            => 'footer-4',
        'description'   => __('Add widgets here to appear in the fourth footer column.', 'codevani'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="font-bold mb-4">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'codevani_widgets_init');

/**
 * Custom Post Types
 */
function codevani_register_post_types() {
    // Portfolio/Projects Post Type
    register_post_type('portfolio', array(
        'labels' => array(
            'name'               => __('Portfolio', 'codevani'),
            'singular_name'      => __('Portfolio Item', 'codevani'),
            'add_new'            => __('Add New', 'codevani'),
            'add_new_item'       => __('Add New Portfolio Item', 'codevani'),
            'edit_item'          => __('Edit Portfolio Item', 'codevani'),
            'new_item'           => __('New Portfolio Item', 'codevani'),
            'view_item'          => __('View Portfolio Item', 'codevani'),
            'search_items'       => __('Search Portfolio', 'codevani'),
            'not_found'          => __('No portfolio items found', 'codevani'),
            'not_found_in_trash' => __('No portfolio items found in trash', 'codevani'),
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'portfolio'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest'       => true,
    ));
    
    // Team Members Post Type
    register_post_type('team', array(
        'labels' => array(
            'name'               => __('Team Members', 'codevani'),
            'singular_name'      => __('Team Member', 'codevani'),
            'add_new'            => __('Add New', 'codevani'),
            'add_new_item'       => __('Add New Team Member', 'codevani'),
            'edit_item'          => __('Edit Team Member', 'codevani'),
            'new_item'           => __('New Team Member', 'codevani'),
            'view_item'          => __('View Team Member', 'codevani'),
            'search_items'       => __('Search Team Members', 'codevani'),
            'not_found'          => __('No team members found', 'codevani'),
            'not_found_in_trash' => __('No team members found in trash', 'codevani'),
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'team'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest'       => true,
    ));
    
    // Services Post Type
    register_post_type('services', array(
        'labels' => array(
            'name'               => __('Services', 'codevani'),
            'singular_name'      => __('Service', 'codevani'),
            'add_new'            => __('Add New', 'codevani'),
            'add_new_item'       => __('Add New Service', 'codevani'),
            'edit_item'          => __('Edit Service', 'codevani'),
            'new_item'           => __('New Service', 'codevani'),
            'view_item'          => __('View Service', 'codevani'),
            'search_items'       => __('Search Services', 'codevani'),
            'not_found'          => __('No services found', 'codevani'),
            'not_found_in_trash' => __('No services found in trash', 'codevani'),
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'services'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-admin-tools',
        'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest'       => true,
    ));
}
add_action('init', 'codevani_register_post_types');

/**
 * Custom Taxonomies
 */
function codevani_register_taxonomies() {
    // Portfolio Categories
    register_taxonomy('portfolio_category', 'portfolio', array(
        'labels' => array(
            'name'              => __('Portfolio Categories', 'codevani'),
            'singular_name'     => __('Portfolio Category', 'codevani'),
            'search_items'      => __('Search Categories', 'codevani'),
            'all_items'         => __('All Categories', 'codevani'),
            'parent_item'       => __('Parent Category', 'codevani'),
            'parent_item_colon' => __('Parent Category:', 'codevani'),
            'edit_item'         => __('Edit Category', 'codevani'),
            'update_item'       => __('Update Category', 'codevani'),
            'add_new_item'      => __('Add New Category', 'codevani'),
            'new_item_name'     => __('New Category Name', 'codevani'),
            'menu_name'         => __('Categories', 'codevani'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'portfolio-category'),
        'show_in_rest'      => true,
    ));
    
    // Blog Categories (extend default)
    register_taxonomy('blog_category', 'post', array(
        'labels' => array(
            'name'              => __('Blog Categories', 'codevani'),
            'singular_name'     => __('Blog Category', 'codevani'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'blog-category'),
        'show_in_rest'      => true,
    ));
}
add_action('init', 'codevani_register_taxonomies');

/**
 * Contact Form Handler
 */
function codevani_handle_contact_form() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'codevani_nonce')) {
        wp_die('Security check failed');
    }
    
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $message = sanitize_textarea_field($_POST['message']);
    
    // Validate required fields
    if (empty($name) || empty($email) || empty($phone)) {
        wp_send_json_error('Please fill all required fields.');
        return;
    }
    
    // Validate email
    if (!is_email($email)) {
        wp_send_json_error('Please enter a valid email address.');
        return;
    }
    
    // Send email
    $to = get_option('admin_email');
    $subject = sprintf(__('New Contact Message from %s', 'codevani'), $name);
    $body = sprintf(
        __("Name: %s\nEmail: %s\nPhone: %s\nMessage: %s", 'codevani'),
        $name,
        $email,
        $phone,
        $message
    );
    $headers = array('From: ' . $email);
    
    if (wp_mail($to, $subject, $body, $headers)) {
        wp_send_json_success(__('Thank you! Your message has been sent successfully.', 'codevani'));
    } else {
        wp_send_json_error(__('Failed to send message. Please try again later.', 'codevani'));
    }
}
add_action('wp_ajax_contact_form', 'codevani_handle_contact_form');
add_action('wp_ajax_nopriv_contact_form', 'codevani_handle_contact_form');

/**
 * Customizer Settings
 */
function codevani_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('codevani_hero', array(
        'title'    => __('Hero Section', 'codevani'),
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('hero_title', array(
        'default'           => __('Codevani | Web & App Development', 'codevani'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label'   => __('Hero Title', 'codevani'),
        'section' => 'codevani_hero',
        'type'    => 'text',
    ));
    
    $wp_customize->add_setting('hero_subtitle', array(
        'default'           => __('Transform your digital presence with stunning web applications, UI/UX design, and SEO-optimized solutions tailored to grow your business.', 'codevani'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('hero_subtitle', array(
        'label'   => __('Hero Subtitle', 'codevani'),
        'section' => 'codevani_hero',
        'type'    => 'textarea',
    ));
    
    // Contact Information
    $wp_customize->add_section('codevani_contact', array(
        'title'    => __('Contact Information', 'codevani'),
        'priority' => 35,
    ));
    
    $wp_customize->add_setting('contact_phone', array(
        'default'           => '+91-8287940985',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_phone', array(
        'label'   => __('Phone Number', 'codevani'),
        'section' => 'codevani_contact',
        'type'    => 'text',
    ));
    
    $wp_customize->add_setting('contact_email', array(
        'default'           => 'hello@codevani.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email', array(
        'label'   => __('Email Address', 'codevani'),
        'section' => 'codevani_contact',
        'type'    => 'email',
    ));
    
    // Social Media
    $wp_customize->add_section('codevani_social', array(
        'title'    => __('Social Media', 'codevani'),
        'priority' => 40,
    ));
    
    $social_networks = array(
        'twitter'   => __('Twitter', 'codevani'),
        'instagram' => __('Instagram', 'codevani'),
        'linkedin'  => __('LinkedIn', 'codevani'),
        'facebook'  => __('Facebook', 'codevani'),
    );
    
    foreach ($social_networks as $network => $label) {
        $wp_customize->add_setting("social_{$network}", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        
        $wp_customize->add_control("social_{$network}", array(
            'label'   => $label . ' URL',
            'section' => 'codevani_social',
            'type'    => 'url',
        ));
    }
}
add_action('customize_register', 'codevani_customize_register');

/**
 * Excerpt Length
 */
function codevani_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'codevani_excerpt_length');

/**
 * Excerpt More
 */
function codevani_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'codevani_excerpt_more');

/**
 * Add Schema.org markup
 */
function codevani_schema_markup() {
    if (is_front_page()) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@graph' => array(
                array(
                    '@type' => 'Organization',
                    '@id' => home_url('/#organization'),
                    'name' => get_bloginfo('name'),
                    'url' => home_url(),
                    'logo' => get_theme_mod('custom_logo') ? wp_get_attachment_url(get_theme_mod('custom_logo')) : '',
                    'contactPoint' => array(
                        '@type' => 'ContactPoint',
                        'telephone' => get_theme_mod('contact_phone', '+91-8287940985'),
                        'contactType' => 'Customer Service',
                        'areaServed' => 'IN',
                        'availableLanguage' => array('English', 'Hindi')
                    )
                )
            )
        );
        
        echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
    }
}
add_action('wp_head', 'codevani_schema_markup');

/**
 * Security Enhancements
 */
// Remove WordPress version from head
remove_action('wp_head', 'wp_generator');

// Remove Windows Live Writer manifest link
remove_action('wp_head', 'wlwmanifest_link');

// Remove RSD link
remove_action('wp_head', 'rsd_link');

// Remove shortlink
remove_action('wp_head', 'wp_shortlink_wp_head');

/**
 * Performance Optimizations
 */
// Remove unnecessary scripts and styles
function codevani_remove_unnecessary_assets() {
    // Remove emoji scripts
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    
    // Remove block library CSS if not using blocks
    if (!is_admin()) {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
    }
}
add_action('init', 'codevani_remove_unnecessary_assets');

/**
 * Load text domain for translations
 */
function codevani_load_textdomain() {
    load_theme_textdomain('codevani', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'codevani_load_textdomain');

/**
 * Include custom post types and taxonomies
 */
require get_template_directory() . '/inc/custom-post-types.php';
