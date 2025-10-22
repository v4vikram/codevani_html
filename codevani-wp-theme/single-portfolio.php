<?php
/**
 * The template for displaying single portfolio items
 *
 * @package Codevani
 */

get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
<!-- Portfolio Hero -->
<section class="min-h-[80vh] flex items-center justify-center px-4 pt-32 md:pt-24 pb-safe">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <?php
                $portfolio_categories = get_the_terms(get_the_ID(), 'portfolio_category');
                if ($portfolio_categories && !is_wp_error($portfolio_categories)) :
                ?>
                    <div class="flex flex-wrap gap-3 mb-6">
                        <?php foreach ($portfolio_categories as $category) : ?>
                            <span class="bg-purple-100 text-purple-700 px-4 py-2 rounded-full text-sm font-medium">
                                <?php echo esc_html($category->name); ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                    <?php the_title(); ?>
                </h1>
                
                <?php if (get_the_excerpt()) : ?>
                <p class="text-xl md:text-2xl text-gray-400 mb-8">
                    <?php the_excerpt(); ?>
                </p>
                <?php endif; ?>
                
                <div class="flex flex-wrap gap-4 mb-8">
                    <?php
                    $portfolio_url = get_post_meta(get_the_ID(), 'portfolio_url', true);
                    $portfolio_client = get_post_meta(get_the_ID(), 'portfolio_client', true);
                    $portfolio_date = get_post_meta(get_the_ID(), 'portfolio_date', true);
                    ?>
                    
                    <?php if ($portfolio_url) : ?>
                        <a href="<?php echo esc_url($portfolio_url); ?>" class="bg-gradient-to-r from-orange-400 to-purple-500 px-8 py-4 rounded-full font-semibold text-lg hover:shadow-lg hover:shadow-purple-500/50 transition" target="_blank" rel="noopener">
                            <i class="fas fa-external-link-alt mr-2"></i> <?php _e('View Live Site', 'codevani'); ?>
                        </a>
                    <?php endif; ?>
                    
                    <a href="<?php echo home_url('/contact'); ?>" class="glass-effect px-8 py-4 rounded-full font-semibold text-lg hover:bg-white/10 transition">
                        <i class="fas fa-envelope mr-2"></i> <?php _e('Get Quote', 'codevani'); ?>
                    </a>
                </div>
                
                <!-- Project Details -->
                <div class="grid grid-cols-2 gap-6">
                    <?php if ($portfolio_client) : ?>
                        <div class="glass-effect rounded-2xl p-4">
                            <h3 class="font-semibold text-lg mb-2"><?php _e('Client', 'codevani'); ?></h3>
                            <p class="text-gray-400"><?php echo esc_html($portfolio_client); ?></p>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($portfolio_date) : ?>
                        <div class="glass-effect rounded-2xl p-4">
                            <h3 class="font-semibold text-lg mb-2"><?php _e('Project Date', 'codevani'); ?></h3>
                            <p class="text-gray-400"><?php echo esc_html($portfolio_date); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="glass-effect rounded-3xl p-8 lg:p-12">
                <div class="aspect-square bg-gradient-to-br from-orange-400 to-purple-500 rounded-2xl flex items-center justify-center overflow-hidden">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('codevani-hero', array('class' => 'w-full h-full object-cover')); ?>
                    <?php else : ?>
                        <i class="fas fa-image text-8xl text-white opacity-20"></i>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Project Overview -->
<section class="py-20 px-4 pb-safe">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2">
                <h2 class="text-4xl md:text-5xl font-bold mb-8">
                    <?php _e('Project', 'codevani'); ?> <span class="gradient-text"><?php _e('Overview', 'codevani'); ?></span>
                </h2>
                <div class="prose prose-lg max-w-none text-gray-400">
                    <?php the_content(); ?>
                </div>
            </div>
            
            <div class="space-y-6">
                <!-- Technologies Used -->
                <?php
                $portfolio_technologies = get_post_meta(get_the_ID(), 'portfolio_technologies', true);
                if ($portfolio_technologies) :
                ?>
                <div class="glass-effect rounded-3xl p-6">
                    <h3 class="text-2xl font-bold mb-4"><?php _e('Technologies Used', 'codevani'); ?></h3>
                    <div class="flex flex-wrap gap-2">
                        <?php 
                        $tech_array = explode(',', $portfolio_technologies);
                        foreach ($tech_array as $tech) : 
                            $tech = trim($tech);
                        ?>
                            <span class="inline-block bg-purple-500/20 text-purple-300 px-3 py-2 rounded-full text-sm"><?php echo esc_html($tech); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Project Features -->
                <?php
                $portfolio_features = get_post_meta(get_the_ID(), 'portfolio_features', true);
                if ($portfolio_features) :
                ?>
                <div class="glass-effect rounded-3xl p-6">
                    <h3 class="text-2xl font-bold mb-4"><?php _e('Key Features', 'codevani'); ?></h3>
                    <ul class="space-y-2">
                        <?php 
                        $features_array = explode("\n", $portfolio_features);
                        foreach ($features_array as $feature) : 
                            $feature = trim($feature);
                            if ($feature) :
                        ?>
                            <li class="flex items-center gap-2">
                                <i class="fas fa-check text-green-400"></i>
                                <span class="text-gray-400"><?php echo esc_html($feature); ?></span>
                            </li>
                        <?php 
                            endif;
                        endforeach; 
                        ?>
                    </ul>
                </div>
                <?php endif; ?>
                
                <!-- Project Stats -->
                <?php
                $portfolio_stats = get_post_meta(get_the_ID(), 'portfolio_stats', true);
                if ($portfolio_stats) :
                    $stats_array = json_decode($portfolio_stats, true);
                    if ($stats_array) :
                ?>
                <div class="glass-effect rounded-3xl p-6">
                    <h3 class="text-2xl font-bold mb-4"><?php _e('Project Stats', 'codevani'); ?></h3>
                    <div class="space-y-4">
                        <?php foreach ($stats_array as $stat) : ?>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400"><?php echo esc_html($stat['label']); ?></span>
                                <span class="font-semibold gradient-text"><?php echo esc_html($stat['value']); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php 
                    endif;
                endif; 
                ?>
                
                <!-- Share Project -->
                <div class="glass-effect rounded-3xl p-6">
                    <h3 class="text-2xl font-bold mb-4"><?php _e('Share Project', 'codevani'); ?></h3>
                    <div class="flex gap-3">
                        <button class="flex-1 bg-blue-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-blue-700 transition" onclick="shareOnFacebook()">
                            <i class="fab fa-facebook mr-2"></i> <?php _e('Facebook', 'codevani'); ?>
                        </button>
                        <button class="flex-1 bg-sky-500 text-white px-4 py-2 rounded-lg font-medium hover:bg-sky-600 transition" onclick="shareOnTwitter()">
                            <i class="fab fa-twitter mr-2"></i> <?php _e('Twitter', 'codevani'); ?>
                        </button>
                        <button class="flex-1 bg-blue-700 text-white px-4 py-2 rounded-lg font-medium hover:bg-blue-800 transition" onclick="shareOnLinkedIn()">
                            <i class="fab fa-linkedin mr-2"></i> <?php _e('LinkedIn', 'codevani'); ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Project Gallery -->
<?php
$portfolio_gallery = get_post_meta(get_the_ID(), 'portfolio_gallery', true);
if ($portfolio_gallery) :
    $gallery_images = explode(',', $portfolio_gallery);
?>
<section class="py-20 px-4 pb-safe">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-4xl md:text-5xl font-bold mb-12 text-center">
            <?php _e('Project', 'codevani'); ?> <span class="gradient-text"><?php _e('Gallery', 'codevani'); ?></span>
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($gallery_images as $image_id) : 
                $image_url = wp_get_attachment_url($image_id);
                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
            ?>
                <div class="glass-effect rounded-3xl overflow-hidden group cursor-pointer">
                    <div class="aspect-square overflow-hidden">
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Related Projects -->
<section class="py-20 px-4 pb-safe bg-gradient-to-b from-black to-purple-900/20">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-4xl md:text-5xl font-bold mb-12 text-center">
            <?php _e('Related', 'codevani'); ?> <span class="gradient-text"><?php _e('Projects', 'codevani'); ?></span>
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            $related_projects = get_posts(array(
                'post_type' => 'portfolio',
                'posts_per_page' => 3,
                'post__not_in' => array(get_the_ID()),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'portfolio_category',
                        'field'    => 'term_id',
                        'terms'    => wp_get_post_terms(get_the_ID(), 'portfolio_category', array('fields' => 'ids')),
                    ),
                ),
            ));
            
            if ($related_projects) :
                foreach ($related_projects as $project) :
                    setup_postdata($project);
                    $project_image = get_the_post_thumbnail_url($project->ID, 'codevani-portfolio');
                    $project_categories = get_the_terms($project->ID, 'portfolio_category');
                    
                    $gradient_colors = array(
                        'from-purple-600 to-pink-600',
                        'from-blue-600 to-cyan-600',
                        'from-orange-600 to-red-600'
                    );
                    $random_gradient = $gradient_colors[array_rand($gradient_colors)];
            ?>
                <article class="glass-effect rounded-3xl overflow-hidden group cursor-pointer">
                    <div class="h-64 bg-gradient-to-br <?php echo $random_gradient; ?> flex items-center justify-center overflow-hidden">
                        <?php if ($project_image) : ?>
                            <img src="<?php echo esc_url($project_image); ?>" alt="<?php echo esc_attr($project->post_title); ?>" class="object-cover h-full w-full opacity-10">
                        <?php endif; ?>
                        <i class="fas fa-image text-6xl text-white/30 absolute"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">
                            <a href="<?php echo get_permalink($project->ID); ?>" class="hover:text-purple-400 transition">
                                <?php echo esc_html($project->post_title); ?>
                            </a>
                        </h3>
                        <p class="text-gray-400 text-sm mb-4"><?php echo wp_trim_words($project->post_excerpt, 15); ?></p>
                        <?php if ($project_categories && !is_wp_error($project_categories)) : ?>
                            <div class="flex flex-wrap gap-2">
                                <?php foreach ($project_categories as $category) : ?>
                                    <span class="inline-block bg-purple-500/20 text-purple-300 px-2 py-1 rounded text-xs"><?php echo esc_html($category->name); ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </article>
            <?php
                endforeach;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 px-4 pb-safe">
    <div class="max-w-4xl mx-auto text-center">
        <div class="glass-effect rounded-3xl p-12">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                <?php _e('Like What You See?', 'codevani'); ?>
            </h2>
            <p class="text-gray-400 text-lg mb-8 max-w-2xl mx-auto">
                <?php _e('Let\'s discuss your project and create something amazing together. Get in touch with us today!', 'codevani'); ?>
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?php echo home_url('/contact'); ?>" class="bg-gradient-to-r from-orange-400 to-purple-500 px-8 py-4 rounded-full font-semibold text-lg hover:shadow-lg hover:shadow-purple-500/50 transition">
                    <?php _e('Start Your Project', 'codevani'); ?>
                </a>
                <a href="<?php echo home_url('/portfolio'); ?>" class="glass-effect px-8 py-4 rounded-full font-semibold text-lg hover:bg-white/10 transition">
                    <?php _e('View More Projects', 'codevani'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<script>
// Social sharing functions
function shareOnFacebook() {
    const url = encodeURIComponent(window.location.href);
    const title = encodeURIComponent(document.title);
    window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank', 'width=600,height=400');
}

function shareOnTwitter() {
    const url = encodeURIComponent(window.location.href);
    const title = encodeURIComponent(document.title);
    window.open(`https://twitter.com/intent/tweet?url=${url}&text=${title}`, '_blank', 'width=600,height=400');
}

function shareOnLinkedIn() {
    const url = encodeURIComponent(window.location.href);
    const title = encodeURIComponent(document.title);
    window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${url}`, '_blank', 'width=600,height=400');
}
</script>

<?php endwhile; ?>

<?php get_footer(); ?>
