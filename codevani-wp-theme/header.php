<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    
    <?php wp_head(); ?>
    
    <!-- Preload critical resources -->
    <link rel="preload" href="<?php echo CODEVANI_THEME_URL; ?>/assets/css/app.css" as="style">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo CODEVANI_THEME_URL; ?>/assets/img/favicon.png">
    
    <!-- Theme Color -->
    <meta name="theme-color" content="#000">
    
    <!-- Open Graph / Social Sharing -->
    <?php if (is_front_page()) : ?>
    <meta property="og:title" content="<?php bloginfo('name'); ?> | <?php bloginfo('description'); ?>">
    <meta property="og:description" content="<?php echo get_theme_mod('hero_subtitle', 'Transform your digital presence with stunning web applications, UI/UX design, and SEO-optimized solutions tailored to grow your business.'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo home_url(); ?>">
    <meta property="og:image" content="<?php echo CODEVANI_THEME_URL; ?>/assets/img/logo.png">
    
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php bloginfo('name'); ?> | <?php bloginfo('description'); ?>">
    <meta name="twitter:description" content="<?php echo get_theme_mod('hero_subtitle', 'Transform your digital presence with stunning web applications, UI/UX design, and SEO-optimized solutions tailored to grow your business.'); ?>">
    <meta name="twitter:image" content="<?php echo CODEVANI_THEME_URL; ?>/assets/img/logo.png">
    <?php endif; ?>
    
    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo esc_url(get_permalink()); ?>">
    
    <!-- JSON-LD Schema -->
    <?php if (is_front_page()) : ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [
            {
                "@type": "Organization",
                "@id": "<?php echo home_url('/#organization'); ?>",
                "name": "<?php bloginfo('name'); ?>",
                "url": "<?php echo home_url(); ?>",
                "logo": "<?php echo CODEVANI_THEME_URL; ?>/assets/img/logo.png",
                "sameAs": [
                    <?php 
                    $social_links = array();
                    if (get_theme_mod('social_instagram')) $social_links[] = '"' . get_theme_mod('social_instagram') . '"';
                    if (get_theme_mod('social_linkedin')) $social_links[] = '"' . get_theme_mod('social_linkedin') . '"';
                    if (get_theme_mod('social_twitter')) $social_links[] = '"' . get_theme_mod('social_twitter') . '"';
                    echo implode(', ', $social_links);
                    ?>
                ],
                "contactPoint": {
                    "@type": "ContactPoint",
                    "telephone": "<?php echo get_theme_mod('contact_phone', '+91-8287940985'); ?>",
                    "contactType": "Customer Service",
                    "areaServed": "IN",
                    "availableLanguage": ["English", "Hindi"]
                }
            },
            {
                "@type": "WebSite",
                "name": "<?php bloginfo('name'); ?>",
                "url": "<?php echo home_url(); ?>",
                "potentialAction": {
                    "@type": "SearchAction",
                    "target": "<?php echo home_url('/?s={search_term_string}'); ?>",
                    "query-input": "required name=search_term_string"
                }
            }
        ]
    }
    </script>
    <?php endif; ?>
</head>

<body <?php body_class('bg-black text-white overflow-x-hidden'); ?>>
<?php wp_body_open(); ?>

<!-- Top Navigation for Desktop -->
<nav class="hidden md:flex fixed top-4 left-1/2 -translate-x-1/2 z-50 w-11/12 max-w-3xl">
    <div class="w-full bg-zinc-900/95 backdrop-blur-md rounded-full px-8 py-3 border border-zinc-800 shadow-2xl">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="text-2xl font-bold">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <a href="<?php echo home_url(); ?>" class="gradient-text flex items-center">
                            <img src="<?php echo CODEVANI_THEME_URL; ?>/assets/img/logo.svg" style="width: 120px" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>">
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="flex gap-10 items-center">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'      => 'flex gap-10 items-center',
                    'container'       => false,
                    'fallback_cb'     => 'codevani_fallback_menu',
                    'walker'          => new Codevani_Walker_Nav_Menu(),
                ));
                ?>
                <a href="<?php echo home_url('/contact'); ?>" class="bg-white text-black px-6 py-2 rounded-full font-medium text-sm hover:bg-gray-200 transition">
                    <?php _e('Let\'s Talk', 'codevani'); ?>
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Mobile Header -->
<div class="md:hidden fixed top-0 left-0 right-0 z-50 bg-zinc-900/95 backdrop-blur-md border-b border-zinc-800">
    <div class="flex items-center justify-between px-4 py-4">
        <div class="text-xl font-bold">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo home_url(); ?>" class="gradient-text">
                    <?php bloginfo('name'); ?>
                </a>
            <?php endif; ?>
        </div>
        <button class="mobile-menu-toggle text-gray-400 hover:text-white transition" aria-label="<?php _e('Toggle mobile menu', 'codevani'); ?>">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </div>
</div>

<!-- Mobile Menu Overlay -->
<div class="mobile-menu-overlay fixed inset-0 bg-black/50 backdrop-blur-sm z-40 hidden">
    <div class="mobile-menu bg-zinc-900 w-80 h-full p-6">
        <div class="flex items-center justify-between mb-8">
            <div class="text-xl font-bold gradient-text">
                <?php bloginfo('name'); ?>
            </div>
            <button class="mobile-menu-close text-gray-400 hover:text-white transition">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_class'      => 'space-y-4',
            'container'       => false,
            'fallback_cb'     => 'codevani_fallback_menu',
            'walker'          => new Codevani_Mobile_Walker_Nav_Menu(),
        ));
        ?>
        <div class="mt-8">
            <a href="<?php echo home_url('/contact'); ?>" class="bg-gradient-to-r from-orange-400 to-purple-500 px-6 py-3 rounded-full font-semibold text-lg hover:shadow-lg hover:shadow-purple-500/50 transition w-full block text-center">
                <?php _e('Let\'s Talk', 'codevani'); ?>
            </a>
        </div>
    </div>
</div>

<?php
/**
 * Fallback menu function
 */
function codevani_fallback_menu() {
    echo '<ul class="flex gap-10 items-center">';
    echo '<li><a href="' . home_url() . '" class="text-gray-400 hover:text-white transition text-sm">' . __('Home', 'codevani') . '</a></li>';
    echo '<li><a href="' . home_url('/portfolio') . '" class="text-gray-400 hover:text-white transition text-sm">' . __('Projects', 'codevani') . '</a></li>';
    echo '<li><a href="' . home_url('/about') . '" class="text-gray-400 hover:text-white transition text-sm">' . __('About', 'codevani') . '</a></li>';
    echo '<li><a href="' . home_url('/blog') . '" class="text-gray-400 hover:text-white transition text-sm">' . __('Blog', 'codevani') . '</a></li>';
    echo '</ul>';
}

/**
 * Custom Walker for Desktop Navigation
 */
class Codevani_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';
        
        $output .= '<li' . $id . $class_names .'>';
        
        $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';
        
        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a class="text-gray-400 hover:text-white transition text-sm"' . $attributes .'>';
        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}

/**
 * Custom Walker for Mobile Navigation
 */
class Codevani_Mobile_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';
        
        $output .= '<li' . $id . $class_names .'>';
        
        $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';
        
        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a class="block text-gray-400 hover:text-white transition text-lg py-2"' . $attributes .'>';
        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}
?>
