<?php
/**
 * Custom Post Types and Taxonomies
 *
 * @package Codevani
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Custom Post Types
 */
function codevani_register_custom_post_types() {
    
    // Portfolio Post Type
    register_post_type('portfolio', array(
        'labels' => array(
            'name' => __('Portfolio', 'codevani'),
            'singular_name' => __('Portfolio Item', 'codevani'),
            'menu_name' => __('Portfolio', 'codevani'),
            'add_new' => __('Add New', 'codevani'),
            'add_new_item' => __('Add New Portfolio Item', 'codevani'),
            'edit_item' => __('Edit Portfolio Item', 'codevani'),
            'new_item' => __('New Portfolio Item', 'codevani'),
            'view_item' => __('View Portfolio Item', 'codevani'),
            'search_items' => __('Search Portfolio Items', 'codevani'),
            'not_found' => __('No portfolio items found', 'codevani'),
            'not_found_in_trash' => __('No portfolio items found in trash', 'codevani'),
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'portfolio'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions'),
        'taxonomies' => array('portfolio_category'),
    ));

    // Team Post Type
    register_post_type('team', array(
        'labels' => array(
            'name' => __('Team Members', 'codevani'),
            'singular_name' => __('Team Member', 'codevani'),
            'menu_name' => __('Team', 'codevani'),
            'add_new' => __('Add New', 'codevani'),
            'add_new_item' => __('Add New Team Member', 'codevani'),
            'edit_item' => __('Edit Team Member', 'codevani'),
            'new_item' => __('New Team Member', 'codevani'),
            'view_item' => __('View Team Member', 'codevani'),
            'search_items' => __('Search Team Members', 'codevani'),
            'not_found' => __('No team members found', 'codevani'),
            'not_found_in_trash' => __('No team members found in trash', 'codevani'),
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'team'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions'),
    ));

    // Services Post Type
    register_post_type('services', array(
        'labels' => array(
            'name' => __('Services', 'codevani'),
            'singular_name' => __('Service', 'codevani'),
            'menu_name' => __('Services', 'codevani'),
            'add_new' => __('Add New', 'codevani'),
            'add_new_item' => __('Add New Service', 'codevani'),
            'edit_item' => __('Edit Service', 'codevani'),
            'new_item' => __('New Service', 'codevani'),
            'view_item' => __('View Service', 'codevani'),
            'search_items' => __('Search Services', 'codevani'),
            'not_found' => __('No services found', 'codevani'),
            'not_found_in_trash' => __('No services found in trash', 'codevani'),
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'services'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 7,
        'menu_icon' => 'dashicons-admin-tools',
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions'),
    ));

    // Testimonials Post Type
    register_post_type('testimonials', array(
        'labels' => array(
            'name' => __('Testimonials', 'codevani'),
            'singular_name' => __('Testimonial', 'codevani'),
            'menu_name' => __('Testimonials', 'codevani'),
            'add_new' => __('Add New', 'codevani'),
            'add_new_item' => __('Add New Testimonial', 'codevani'),
            'edit_item' => __('Edit Testimonial', 'codevani'),
            'new_item' => __('New Testimonial', 'codevani'),
            'view_item' => __('View Testimonial', 'codevani'),
            'search_items' => __('Search Testimonials', 'codevani'),
            'not_found' => __('No testimonials found', 'codevani'),
            'not_found_in_trash' => __('No testimonials found in trash', 'codevani'),
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'testimonials'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 8,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions'),
    ));
}
add_action('init', 'codevani_register_custom_post_types');

/**
 * Register Custom Taxonomies
 */
function codevani_register_custom_taxonomies() {
    
    // Portfolio Categories
    register_taxonomy('portfolio_category', 'portfolio', array(
        'labels' => array(
            'name' => __('Portfolio Categories', 'codevani'),
            'singular_name' => __('Portfolio Category', 'codevani'),
            'menu_name' => __('Categories', 'codevani'),
            'all_items' => __('All Categories', 'codevani'),
            'edit_item' => __('Edit Category', 'codevani'),
            'view_item' => __('View Category', 'codevani'),
            'update_item' => __('Update Category', 'codevani'),
            'add_new_item' => __('Add New Category', 'codevani'),
            'new_item_name' => __('New Category Name', 'codevani'),
            'search_items' => __('Search Categories', 'codevani'),
            'popular_items' => __('Popular Categories', 'codevani'),
            'separate_items_with_commas' => __('Separate categories with commas', 'codevani'),
            'add_or_remove_items' => __('Add or remove categories', 'codevani'),
            'choose_from_most_used' => __('Choose from most used categories', 'codevani'),
            'not_found' => __('No categories found', 'codevani'),
        ),
        'hierarchical' => true,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_rest' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'portfolio-category'),
    ));

    // Service Categories
    register_taxonomy('service_category', 'services', array(
        'labels' => array(
            'name' => __('Service Categories', 'codevani'),
            'singular_name' => __('Service Category', 'codevani'),
            'menu_name' => __('Categories', 'codevani'),
            'all_items' => __('All Categories', 'codevani'),
            'edit_item' => __('Edit Category', 'codevani'),
            'view_item' => __('View Category', 'codevani'),
            'update_item' => __('Update Category', 'codevani'),
            'add_new_item' => __('Add New Category', 'codevani'),
            'new_item_name' => __('New Category Name', 'codevani'),
            'search_items' => __('Search Categories', 'codevani'),
            'popular_items' => __('Popular Categories', 'codevani'),
            'separate_items_with_commas' => __('Separate categories with commas', 'codevani'),
            'add_or_remove_items' => __('Add or remove categories', 'codevani'),
            'choose_from_most_used' => __('Choose from most used categories', 'codevani'),
            'not_found' => __('No categories found', 'codevani'),
        ),
        'hierarchical' => true,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_rest' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'service-category'),
    ));
}
add_action('init', 'codevani_register_custom_taxonomies');

/**
 * Add Custom Meta Boxes
 */
function codevani_add_custom_meta_boxes() {
    
    // Portfolio Meta Box
    add_meta_box(
        'portfolio_details',
        __('Portfolio Details', 'codevani'),
        'codevani_portfolio_meta_box_callback',
        'portfolio',
        'normal',
        'high'
    );

    // Team Meta Box
    add_meta_box(
        'team_details',
        __('Team Member Details', 'codevani'),
        'codevani_team_meta_box_callback',
        'team',
        'normal',
        'high'
    );

    // Service Meta Box
    add_meta_box(
        'service_details',
        __('Service Details', 'codevani'),
        'codevani_service_meta_box_callback',
        'services',
        'normal',
        'high'
    );

    // Testimonial Meta Box
    add_meta_box(
        'testimonial_details',
        __('Testimonial Details', 'codevani'),
        'codevani_testimonial_meta_box_callback',
        'testimonials',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'codevani_add_custom_meta_boxes');

/**
 * Portfolio Meta Box Callback
 */
function codevani_portfolio_meta_box_callback($post) {
    wp_nonce_field('codevani_portfolio_meta_box', 'codevani_portfolio_meta_box_nonce');
    
    $portfolio_url = get_post_meta($post->ID, 'portfolio_url', true);
    $portfolio_client = get_post_meta($post->ID, 'portfolio_client', true);
    $portfolio_date = get_post_meta($post->ID, 'portfolio_date', true);
    $portfolio_technologies = get_post_meta($post->ID, 'portfolio_technologies', true);
    $portfolio_features = get_post_meta($post->ID, 'portfolio_features', true);
    $portfolio_stats = get_post_meta($post->ID, 'portfolio_stats', true);
    $portfolio_gallery = get_post_meta($post->ID, 'portfolio_gallery', true);
    ?>
    <table class="form-table">
        <tr>
            <th scope="row"><label for="portfolio_url"><?php _e('Project URL', 'codevani'); ?></label></th>
            <td><input type="url" id="portfolio_url" name="portfolio_url" value="<?php echo esc_attr($portfolio_url); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="portfolio_client"><?php _e('Client Name', 'codevani'); ?></label></th>
            <td><input type="text" id="portfolio_client" name="portfolio_client" value="<?php echo esc_attr($portfolio_client); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="portfolio_date"><?php _e('Project Date', 'codevani'); ?></label></th>
            <td><input type="date" id="portfolio_date" name="portfolio_date" value="<?php echo esc_attr($portfolio_date); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="portfolio_technologies"><?php _e('Technologies Used', 'codevani'); ?></label></th>
            <td><input type="text" id="portfolio_technologies" name="portfolio_technologies" value="<?php echo esc_attr($portfolio_technologies); ?>" class="regular-text" placeholder="<?php _e('React, Node.js, MongoDB (comma separated)', 'codevani'); ?>" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="portfolio_features"><?php _e('Key Features', 'codevani'); ?></label></th>
            <td><textarea id="portfolio_features" name="portfolio_features" rows="5" class="large-text"><?php echo esc_textarea($portfolio_features); ?></textarea><br>
            <small><?php _e('Enter each feature on a new line', 'codevani'); ?></small></td>
        </tr>
        <tr>
            <th scope="row"><label for="portfolio_stats"><?php _e('Project Stats', 'codevani'); ?></label></th>
            <td><textarea id="portfolio_stats" name="portfolio_stats" rows="3" class="large-text"><?php echo esc_textarea($portfolio_stats); ?></textarea><br>
            <small><?php _e('JSON format: [{"label":"Duration","value":"3 months"},{"label":"Team Size","value":"5 members"}]', 'codevani'); ?></small></td>
        </tr>
        <tr>
            <th scope="row"><label for="portfolio_gallery"><?php _e('Gallery Images', 'codevani'); ?></label></th>
            <td>
                <input type="hidden" id="portfolio_gallery" name="portfolio_gallery" value="<?php echo esc_attr($portfolio_gallery); ?>" />
                <button type="button" class="button" id="upload_gallery_button"><?php _e('Select Images', 'codevani'); ?></button>
                <div id="gallery_preview"></div>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Team Meta Box Callback
 */
function codevani_team_meta_box_callback($post) {
    wp_nonce_field('codevani_team_meta_box', 'codevani_team_meta_box_nonce');
    
    $team_position = get_post_meta($post->ID, 'team_position', true);
    $team_linkedin = get_post_meta($post->ID, 'team_linkedin', true);
    $team_twitter = get_post_meta($post->ID, 'team_twitter', true);
    $team_github = get_post_meta($post->ID, 'team_github', true);
    ?>
    <table class="form-table">
        <tr>
            <th scope="row"><label for="team_position"><?php _e('Position', 'codevani'); ?></label></th>
            <td><input type="text" id="team_position" name="team_position" value="<?php echo esc_attr($team_position); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="team_linkedin"><?php _e('LinkedIn URL', 'codevani'); ?></label></th>
            <td><input type="url" id="team_linkedin" name="team_linkedin" value="<?php echo esc_attr($team_linkedin); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="team_twitter"><?php _e('Twitter URL', 'codevani'); ?></label></th>
            <td><input type="url" id="team_twitter" name="team_twitter" value="<?php echo esc_attr($team_twitter); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="team_github"><?php _e('GitHub URL', 'codevani'); ?></label></th>
            <td><input type="url" id="team_github" name="team_github" value="<?php echo esc_attr($team_github); ?>" class="regular-text" /></td>
        </tr>
    </table>
    <?php
}

/**
 * Service Meta Box Callback
 */
function codevani_service_meta_box_callback($post) {
    wp_nonce_field('codevani_service_meta_box', 'codevani_service_meta_box_nonce');
    
    $service_price = get_post_meta($post->ID, 'service_price', true);
    $service_duration = get_post_meta($post->ID, 'service_duration', true);
    $service_features = get_post_meta($post->ID, 'service_features', true);
    ?>
    <table class="form-table">
        <tr>
            <th scope="row"><label for="service_price"><?php _e('Starting Price', 'codevani'); ?></label></th>
            <td><input type="text" id="service_price" name="service_price" value="<?php echo esc_attr($service_price); ?>" class="regular-text" placeholder="<?php _e('₹50,000', 'codevani'); ?>" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="service_duration"><?php _e('Duration', 'codevani'); ?></label></th>
            <td><input type="text" id="service_duration" name="service_duration" value="<?php echo esc_attr($service_duration); ?>" class="regular-text" placeholder="<?php _e('2-4 weeks', 'codevani'); ?>" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="service_features"><?php _e('Service Features', 'codevani'); ?></label></th>
            <td><textarea id="service_features" name="service_features" rows="5" class="large-text"><?php echo esc_textarea($service_features); ?></textarea><br>
            <small><?php _e('Enter each feature on a new line', 'codevani'); ?></small></td>
        </tr>
    </table>
    <?php
}

/**
 * Testimonial Meta Box Callback
 */
function codevani_testimonial_meta_box_callback($post) {
    wp_nonce_field('codevani_testimonial_meta_box', 'codevani_testimonial_meta_box_nonce');
    
    $testimonial_client = get_post_meta($post->ID, 'testimonial_client', true);
    $testimonial_position = get_post_meta($post->ID, 'testimonial_position', true);
    $testimonial_company = get_post_meta($post->ID, 'testimonial_company', true);
    $testimonial_rating = get_post_meta($post->ID, 'testimonial_rating', true);
    ?>
    <table class="form-table">
        <tr>
            <th scope="row"><label for="testimonial_client"><?php _e('Client Name', 'codevani'); ?></label></th>
            <td><input type="text" id="testimonial_client" name="testimonial_client" value="<?php echo esc_attr($testimonial_client); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="testimonial_position"><?php _e('Position', 'codevani'); ?></label></th>
            <td><input type="text" id="testimonial_position" name="testimonial_position" value="<?php echo esc_attr($testimonial_position); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="testimonial_company"><?php _e('Company', 'codevani'); ?></label></th>
            <td><input type="text" id="testimonial_company" name="testimonial_company" value="<?php echo esc_attr($testimonial_company); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="testimonial_rating"><?php _e('Rating', 'codevani'); ?></label></th>
            <td>
                <select id="testimonial_rating" name="testimonial_rating">
                    <option value="5" <?php selected($testimonial_rating, '5'); ?>><?php _e('5 Stars', 'codevani'); ?></option>
                    <option value="4" <?php selected($testimonial_rating, '4'); ?>><?php _e('4 Stars', 'codevani'); ?></option>
                    <option value="3" <?php selected($testimonial_rating, '3'); ?>><?php _e('3 Stars', 'codevani'); ?></option>
                    <option value="2" <?php selected($testimonial_rating, '2'); ?>><?php _e('2 Stars', 'codevani'); ?></option>
                    <option value="1" <?php selected($testimonial_rating, '1'); ?>><?php _e('1 Star', 'codevani'); ?></option>
                </select>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Save Meta Box Data
 */
function codevani_save_meta_box_data($post_id) {
    
    // Portfolio meta box
    if (isset($_POST['codevani_portfolio_meta_box_nonce']) && wp_verify_nonce($_POST['codevani_portfolio_meta_box_nonce'], 'codevani_portfolio_meta_box')) {
        $fields = array('portfolio_url', 'portfolio_client', 'portfolio_date', 'portfolio_technologies', 'portfolio_features', 'portfolio_stats', 'portfolio_gallery');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
            }
        }
    }
    
    // Team meta box
    if (isset($_POST['codevani_team_meta_box_nonce']) && wp_verify_nonce($_POST['codevani_team_meta_box_nonce'], 'codevani_team_meta_box')) {
        $fields = array('team_position', 'team_linkedin', 'team_twitter', 'team_github');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
            }
        }
    }
    
    // Service meta box
    if (isset($_POST['codevani_service_meta_box_nonce']) && wp_verify_nonce($_POST['codevani_service_meta_box_nonce'], 'codevani_service_meta_box')) {
        $fields = array('service_price', 'service_duration', 'service_features');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
            }
        }
    }
    
    // Testimonial meta box
    if (isset($_POST['codevani_testimonial_meta_box_nonce']) && wp_verify_nonce($_POST['codevani_testimonial_meta_box_nonce'], 'codevani_testimonial_meta_box')) {
        $fields = array('testimonial_client', 'testimonial_position', 'testimonial_company', 'testimonial_rating');
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
            }
        }
    }
}
add_action('save_post', 'codevani_save_meta_box_data');

/**
 * Add Image Sizes
 */
function codevani_add_image_sizes() {
    add_image_size('codevani-hero', 1200, 800, true);
    add_image_size('codevani-portfolio', 600, 400, true);
    add_image_size('codevani-blog', 800, 500, true);
    add_image_size('codevani-team', 400, 400, true);
}
add_action('after_setup_theme', 'codevani_add_image_sizes');
