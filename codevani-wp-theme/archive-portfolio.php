<?php
/**
 * The template for displaying portfolio archive
 *
 * @package Codevani
 */

get_header(); ?>

<!-- Hero Section -->
<section class="min-h-[60vh] flex items-center justify-center px-4 pt-32 md:pt-24 pb-safe">
    <div class="max-w-6xl mx-auto text-center">
        <div class="mb-8 animate-float">
            <div class="inline-block glass-effect rounded-3xl p-8">
                <i class="fas fa-layer-group text-6xl gradient-text"></i>
            </div>
        </div>
        <h1 class="text-4xl sm:text-5xl md:text-7xl font-bold mb-6">
            <?php _e('Our', 'codevani'); ?> <span class="gradient-text"><?php _e('Portfolio', 'codevani'); ?></span>
        </h1>
        <p class="text-xl md:text-2xl text-gray-400 max-w-3xl mx-auto mb-8">
            <?php _e('Explore our collection of successful projects and see how we\'ve helped businesses achieve their digital goals.', 'codevani'); ?>
        </p>
    </div>
</section>

<!-- Portfolio Filter -->
<section class="py-12 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="flex flex-wrap gap-3 justify-center">
            <button class="portfolio-filter glass-effect px-3 md:px-5 py-3 text-sm rounded-full font-medium hover:text-white transition active" data-filter="all">
                <?php _e('All Projects', 'codevani'); ?>
            </button>
            <?php
            $portfolio_categories = get_terms(array(
                'taxonomy' => 'portfolio_category',
                'hide_empty' => true,
            ));
            
            if ($portfolio_categories && !is_wp_error($portfolio_categories)) :
                foreach ($portfolio_categories as $category) :
            ?>
                <button class="portfolio-filter glass-effect px-3 md:px-5 py-3 text-sm rounded-full font-medium hover:text-white transition" data-filter="<?php echo esc_attr($category->slug); ?>">
                    <?php echo esc_html($category->name); ?>
                </button>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<!-- Portfolio Grid -->
<section class="py-12 px-4 pb-safe">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="portfolio-grid">
            <?php
            $portfolio_query = new WP_Query(array(
                'post_type' => 'portfolio',
                'posts_per_page' => -1,
                'post_status' => 'publish'
            ));

            if ($portfolio_query->have_posts()) :
                while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
                    $portfolio_image = get_the_post_thumbnail_url(get_the_ID(), 'codevani-portfolio');
                    $portfolio_categories = get_the_terms(get_the_ID(), 'portfolio_category');
                    $portfolio_url = get_post_meta(get_the_ID(), 'portfolio_url', true);
                    $portfolio_client = get_post_meta(get_the_ID(), 'portfolio_client', true);
                    $portfolio_technologies = get_post_meta(get_the_ID(), 'portfolio_technologies', true);
                    
                    $gradient_colors = array(
                        'from-purple-600 to-pink-600',
                        'from-blue-600 to-cyan-600',
                        'from-orange-600 to-red-600',
                        'from-green-600 to-teal-600',
                        'from-indigo-600 to-purple-600',
                        'from-pink-600 to-rose-600'
                    );
                    $random_gradient = $gradient_colors[array_rand($gradient_colors)];
                    
                    $category_classes = '';
                    if ($portfolio_categories && !is_wp_error($portfolio_categories)) {
                        foreach ($portfolio_categories as $category) {
                            $category_classes .= ' ' . $category->slug;
                        }
                    }
            ?>
                <article class="portfolio-item glass-effect rounded-3xl overflow-hidden group cursor-pointer<?php echo $category_classes; ?>" data-categories="<?php echo $category_classes; ?>">
                    <div class="h-64 bg-gradient-to-br <?php echo $random_gradient; ?> flex items-center justify-center overflow-hidden relative">
                        <?php if ($portfolio_image) : ?>
                            <img src="<?php echo esc_url($portfolio_image); ?>" alt="<?php the_title_attribute(); ?>" class="object-cover h-full w-full opacity-10">
                        <?php endif; ?>
                        <i class="fas fa-image text-6xl text-white/30 absolute"></i>
                        
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="text-center">
                                <a href="<?php the_permalink(); ?>" class="bg-white text-black px-6 py-3 rounded-full font-semibold hover:bg-gray-200 transition mr-2">
                                    <?php _e('View Details', 'codevani'); ?>
                                </a>
                                <?php if ($portfolio_url) : ?>
                                    <a href="<?php echo esc_url($portfolio_url); ?>" class="glass-effect px-6 py-3 rounded-full font-semibold hover:bg-white/10 transition" target="_blank" rel="noopener">
                                        <?php _e('Live Site', 'codevani'); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2"><?php the_title(); ?></h3>
                        <?php if ($portfolio_client) : ?>
                            <p class="text-purple-400 text-sm mb-2"><?php echo esc_html($portfolio_client); ?></p>
                        <?php endif; ?>
                        <p class="text-gray-400 text-sm mb-4"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        
                        <?php if ($portfolio_categories && !is_wp_error($portfolio_categories)) : ?>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <?php foreach ($portfolio_categories as $category) : ?>
                                    <span class="inline-block bg-purple-500/20 text-purple-300 px-2 py-1 rounded text-xs"><?php echo esc_html($category->name); ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($portfolio_technologies) : ?>
                            <div class="flex flex-wrap gap-1">
                                <?php 
                                $tech_array = explode(',', $portfolio_technologies);
                                foreach ($tech_array as $tech) : 
                                    $tech = trim($tech);
                                ?>
                                    <span class="inline-block bg-gray-500/20 text-gray-300 px-2 py-1 rounded text-xs"><?php echo esc_html($tech); ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-400 text-lg"><?php _e('No portfolio items found.', 'codevani'); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 px-4 pb-safe">
    <div class="max-w-4xl mx-auto text-center">
        <div class="glass-effect rounded-3xl p-12">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                <?php _e('Ready to Start Your', 'codevani'); ?> <span class="gradient-text"><?php _e('Project?', 'codevani'); ?></span>
            </h2>
            <p class="text-gray-400 text-lg mb-8 max-w-2xl mx-auto">
                <?php _e('Let\'s discuss your ideas and create something amazing together. Get in touch with us today!', 'codevani'); ?>
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?php echo home_url('/contact'); ?>" class="bg-gradient-to-r from-orange-400 to-purple-500 px-8 py-4 rounded-full font-semibold text-lg hover:shadow-lg hover:shadow-purple-500/50 transition">
                    <?php _e('Start Your Project', 'codevani'); ?>
                </a>
                <a href="<?php echo home_url('/services'); ?>" class="glass-effect px-8 py-4 rounded-full font-semibold text-lg hover:bg-white/10 transition">
                    <?php _e('Our Services', 'codevani'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.portfolio-filter');
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active', 'bg-purple-500/20', 'text-purple-300'));
            this.classList.add('active', 'bg-purple-500/20', 'text-purple-300');
            
            // Filter portfolio items
            portfolioItems.forEach(item => {
                if (filter === 'all' || item.classList.contains(filter)) {
                    item.style.display = 'block';
                    item.style.animation = 'fadeIn 0.5s ease-in-out';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
});

// Add CSS animation
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
`;
document.head.appendChild(style);
</script>

<?php get_footer(); ?>
