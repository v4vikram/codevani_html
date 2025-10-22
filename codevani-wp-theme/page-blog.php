<?php
/**
 * The template for displaying blog posts
 *
 * @package Codevani
 */

get_header(); ?>

<!-- Hero Section -->
<section class="min-h-[60vh] flex items-center justify-center px-4 pt-32 md:pt-24 pb-safe">
    <div class="max-w-6xl mx-auto text-center">
        <div class="mb-8 animate-float">
            <div class="inline-block glass-effect rounded-3xl p-8">
                <i class="fas fa-blog text-6xl gradient-text"></i>
            </div>
        </div>
        <h1 class="text-4xl sm:text-5xl md:text-7xl font-bold mb-6">
            <?php _e('Our', 'codevani'); ?> <span class="gradient-text"><?php _e('Blog', 'codevani'); ?></span>
        </h1>
        <p class="text-xl md:text-2xl text-gray-400 max-w-3xl mx-auto mb-8">
            <?php _e('Insights, tutorials, and industry news from our expert team', 'codevani'); ?>
        </p>

        <!-- Search Bar -->
        <div class="w-xl max-w-2xl mx-auto">
            <div class="glass-effect rounded-full p-2 flex items-center">
                <form role="search" method="get" class="search-form flex w-full" action="<?php echo esc_url(home_url('/')); ?>">
                    <input type="search" class="search-input bg-transparent flex-1 px-6 py-3 focus:outline-none text-white" placeholder="<?php _e('Search articles...', 'codevani'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                    <button type="submit" class="bg-gradient-to-r from-orange-400 to-purple-500 px-6 py-3 rounded-full font-semibold hover:shadow-lg transition">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-12 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="flex flex-wrap gap-3 justify-center">
            <a href="<?php echo home_url('/blog'); ?>" class="category-badge glass-effect px-3 md:px-5 py-3 text-sm rounded-full font-medium hover:text-white transition <?php echo is_home() ? 'bg-purple-500/20 text-purple-300' : ''; ?>">
                <?php _e('All Posts', 'codevani'); ?>
            </a>
            <?php
            $categories = get_categories(array(
                'orderby' => 'name',
                'order'   => 'ASC',
                'number'  => 5
            ));
            
            foreach ($categories as $category) :
                $is_active = is_category($category->term_id);
            ?>
                <a href="<?php echo get_category_link($category->term_id); ?>" class="category-badge glass-effect px-3 md:px-5 py-3 text-sm rounded-full font-medium hover:text-white transition <?php echo $is_active ? 'bg-purple-500/20 text-purple-300' : ''; ?>">
                    <?php echo esc_html($category->name); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Featured Post -->
<?php
$featured_query = new WP_Query(array(
    'posts_per_page' => 1,
    'meta_key' => 'featured_post',
    'meta_value' => 'yes',
    'post_status' => 'publish'
));

if (!$featured_query->have_posts()) {
    $featured_query = new WP_Query(array(
        'posts_per_page' => 1,
        'post_status' => 'publish'
    ));
}

if ($featured_query->have_posts()) :
    $featured_query->the_post();
?>
<section class="py-12 px-4 pb-safe">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold mb-8">
            <?php _e('Featured', 'codevani'); ?> <span class="gradient-text"><?php _e('Article', 'codevani'); ?></span>
        </h2>
        
        <div class="featured-card blog-card glass-effect rounded-3xl overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                <div class="h-80 lg:h-auto bg-gradient-to-br from-purple-600 to-pink-600 flex items-center justify-center overflow-hidden">
                    <div class="blog-image w-full h-full flex items-center justify-center">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('codevani-blog', array('class' => 'w-full h-full object-cover opacity-10')); ?>
                        <?php endif; ?>
                        <i class="fas fa-image text-8xl text-white/30"></i>
                    </div>
                </div>
                <div class="p-8 lg:p-12 flex flex-col justify-center">
                    <div class="flex gap-3 mb-4">
                        <?php
                        $post_categories = get_the_category();
                        if ($post_categories) :
                            foreach ($post_categories as $category) :
                        ?>
                            <span class="glass-effect px-4 py-1 rounded-full text-sm text-purple-400">
                                <?php echo esc_html($category->name); ?>
                            </span>
                        <?php 
                            endforeach;
                        endif;
                        ?>
                        <span class="glass-effect px-4 py-1 rounded-full text-sm text-gray-400">
                            <i class="far fa-clock mr-1"></i> <?php echo do_shortcode('[rt_reading_time]'); ?> <?php _e('min read', 'codevani'); ?>
                        </span>
                    </div>
                    <h3 class="text-3xl font-bold mb-4">
                        <a href="<?php the_permalink(); ?>" class="hover:text-purple-400 transition">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    <p class="text-gray-400 mb-6 text-lg">
                        <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                    </p>
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-orange-400 to-purple-500 flex items-center justify-center">
                            <?php echo get_avatar(get_the_author_meta('ID'), 32, '', '', array('class' => 'rounded-full')); ?>
                        </div>
                        <div>
                            <p class="font-semibold"><?php the_author(); ?></p>
                            <p class="text-gray-400 text-sm"><?php echo get_the_date(); ?></p>
                        </div>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 text-purple-400 hover:text-purple-300 transition font-semibold">
                        <?php _e('Read Full Article', 'codevani'); ?>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
wp_reset_postdata();
endif;
?>

<!-- Recent Posts -->
<section class="py-12 px-4 pb-safe">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold mb-8">
            <?php _e('Recent', 'codevani'); ?> <span class="gradient-text"><?php _e('Posts', 'codevani'); ?></span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            $blog_query = new WP_Query(array(
                'posts_per_page' => 6,
                'post_status' => 'publish',
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1
            ));

            if ($blog_query->have_posts()) :
                while ($blog_query->have_posts()) : $blog_query->the_post();
                    $gradient_colors = array(
                        'from-blue-600 to-cyan-600',
                        'from-green-600 to-teal-600',
                        'from-orange-600 to-red-600',
                        'from-indigo-600 to-purple-600',
                        'from-pink-600 to-rose-600',
                        'from-yellow-600 to-orange-600'
                    );
                    $random_gradient = $gradient_colors[array_rand($gradient_colors)];
            ?>
                <article class="blog-card glass-effect rounded-3xl overflow-hidden">
                    <div class="h-56 bg-gradient-to-br <?php echo $random_gradient; ?> flex items-center justify-center overflow-hidden">
                        <div class="blog-image w-full h-full flex items-center justify-center">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('codevani-blog', array('class' => 'w-full h-full object-cover opacity-10')); ?>
                            <?php endif; ?>
                            <i class="fas fa-image text-6xl text-white/30"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex gap-2 mb-3">
                            <?php
                            $post_categories = get_the_category();
                            if ($post_categories) :
                                foreach (array_slice($post_categories, 0, 1) as $category) :
                            ?>
                                <span class="glass-effect px-3 py-1 rounded-full text-xs text-purple-400">
                                    <?php echo esc_html($category->name); ?>
                                </span>
                            <?php 
                                endforeach;
                            endif;
                            ?>
                            <span class="glass-effect px-3 py-1 rounded-full text-xs text-gray-400">
                                <?php echo do_shortcode('[rt_reading_time]'); ?> <?php _e('min', 'codevani'); ?>
                            </span>
                        </div>
                        <h3 class="text-xl font-bold mb-3">
                            <a href="<?php the_permalink(); ?>" class="hover:text-purple-400 transition">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <p class="text-gray-400 text-sm mb-4">
                            <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-orange-400 to-purple-500 flex items-center justify-center">
                                    <?php echo get_avatar(get_the_author_meta('ID'), 24, '', '', array('class' => 'rounded-full')); ?>
                                </div>
                                <span class="text-sm text-gray-400"><?php the_author(); ?></span>
                            </div>
                            <span class="text-xs text-gray-500"><?php echo get_the_date('M j, Y'); ?></span>
                        </div>
                    </div>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-400 text-lg"><?php _e('No posts found.', 'codevani'); ?></p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <?php if ($blog_query->max_num_pages > 1) : ?>
            <div class="text-center mt-12">
                <?php
                echo paginate_links(array(
                    'total' => $blog_query->max_num_pages,
                    'current' => max(1, get_query_var('paged')),
                    'format' => '?paged=%#%',
                    'show_all' => false,
                    'type' => 'list',
                    'end_size' => 2,
                    'mid_size' => 1,
                    'prev_text' => '<i class="fas fa-chevron-left"></i>',
                    'next_text' => '<i class="fas fa-chevron-right"></i>',
                    'add_args' => false,
                    'add_fragment' => '',
                ));
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-20 px-4 pb-safe">
    <div class="max-w-4xl mx-auto">
        <div class="glass-effect rounded-3xl p-8 md:p-12 text-center">
            <div class="inline-block glass-effect rounded-3xl p-6 mb-6">
                <i class="fas fa-envelope text-4xl gradient-text"></i>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                <?php _e('Subscribe to Our', 'codevani'); ?> <span class="gradient-text"><?php _e('Newsletter', 'codevani'); ?></span>
            </h2>
            <p class="text-gray-400 text-lg mb-8 max-w-2xl mx-auto">
                <?php _e('Get the latest articles, tutorials, and industry insights delivered directly to your inbox every week.', 'codevani'); ?>
            </p>
            <div class="max-w-xl mx-auto">
                <form class="glass-effect rounded-full p-2 flex flex-col sm:flex-row gap-2" action="#" method="post">
                    <input type="email" name="newsletter_email" placeholder="<?php _e('Enter your email', 'codevani'); ?>" class="bg-transparent flex-1 px-6 py-3 focus:outline-none text-white" required>
                    <button type="submit" class="bg-gradient-to-r from-orange-400 to-purple-500 px-8 py-3 rounded-full font-semibold hover:shadow-lg transition whitespace-nowrap">
                        <?php _e('Subscribe Now', 'codevani'); ?>
                    </button>
                </form>
                <p class="text-gray-500 text-sm mt-4">
                    <?php _e('No spam. Unsubscribe anytime.', 'codevani'); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
