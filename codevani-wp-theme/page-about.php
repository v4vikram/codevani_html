<?php
/**
 * Template Name: About Page
 * 
 * @package Codevani
 */

get_header(); ?>

<!-- Hero Section -->
<section class="min-h-screen flex items-center justify-center px-4 pt-32 md:pt-24 pb-safe">
    <div class="max-w-6xl mx-auto text-center">
        <div class="mb-8 animate-float">
            <div class="inline-block glass-effect rounded-3xl p-8">
                <i class="fas fa-users text-6xl gradient-text"></i>
            </div>
        </div>
        <h1 class="text-4xl sm:text-5xl md:text-7xl font-bold mb-6">
            <?php _e('About', 'codevani'); ?> <span class="gradient-text"><?php bloginfo('name'); ?></span>
        </h1>
        <p class="text-xl md:text-2xl text-gray-400 max-w-3xl mx-auto mb-12">
            <?php _e('We\'re a passionate team of developers, designers, and digital strategists dedicated to transforming ideas into exceptional digital experiences.', 'codevani'); ?>
        </p>

        <!-- Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="glass-effect rounded-2xl p-6">
                <div class="text-4xl font-bold gradient-text">500+</div>
                <div class="text-gray-400 mt-2"><?php _e('Projects Done', 'codevani'); ?></div>
            </div>
            <div class="glass-effect rounded-2xl p-6">
                <div class="text-4xl font-bold gradient-text">250+</div>
                <div class="text-gray-400 mt-2"><?php _e('Happy Clients', 'codevani'); ?></div>
            </div>
            <div class="glass-effect rounded-2xl p-6">
                <div class="text-4xl font-bold gradient-text">50+</div>
                <div class="text-gray-400 mt-2"><?php _e('Team Members', 'codevani'); ?></div>
            </div>
            <div class="glass-effect rounded-2xl p-6">
                <div class="text-4xl font-bold gradient-text">15+</div>
                <div class="text-gray-400 mt-2"><?php _e('Awards Won', 'codevani'); ?></div>
            </div>
        </div>
    </div>
</section>

<!-- Our Story Section -->
<section class="py-20 px-4 pb-safe">
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <?php _e('Our', 'codevani'); ?> <span class="gradient-text"><?php _e('Story', 'codevani'); ?></span>
                </h2>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="text-gray-400 text-lg mb-6">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; endif; ?>
                
                <div class="flex gap-4">
                    <div class="glass-effect rounded-2xl p-4 flex-1">
                        <div class="text-2xl font-bold gradient-text mb-1">2015</div>
                        <div class="text-gray-400 text-sm"><?php _e('Founded', 'codevani'); ?></div>
                    </div>
                    <div class="glass-effect rounded-2xl p-4 flex-1">
                        <div class="text-2xl font-bold gradient-text mb-1">10+</div>
                        <div class="text-gray-400 text-sm"><?php _e('Years Experience', 'codevani'); ?></div>
                    </div>
                    <div class="glass-effect rounded-2xl p-4 flex-1">
                        <div class="text-2xl font-bold gradient-text mb-1">98%</div>
                        <div class="text-gray-400 text-sm"><?php _e('Client Satisfaction', 'codevani'); ?></div>
                    </div>
                </div>
            </div>
            <div class="glass-effect rounded-3xl p-8 lg:p-12">
                <div class="aspect-square bg-gradient-to-br from-orange-400 to-purple-500 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-rocket text-8xl text-white opacity-20"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Values Section -->
<section class="py-20 px-4 pb-safe">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">
                <?php _e('Our', 'codevani'); ?> <span class="gradient-text"><?php _e('Values', 'codevani'); ?></span>
            </h2>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                <?php _e('The principles that guide our work and define who we are', 'codevani'); ?>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="value-card glass-effect rounded-3xl p-8">
                <div class="w-16 h-16 rounded-full bg-gradient-to-r from-orange-400 to-purple-500 flex items-center justify-center mb-6">
                    <i class="fas fa-lightbulb text-2xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold mb-3"><?php _e('Innovation', 'codevani'); ?></h3>
                <p class="text-gray-400">
                    <?php _e('We constantly push boundaries and embrace new technologies to deliver cutting-edge solutions.', 'codevani'); ?>
                </p>
            </div>

            <div class="value-card glass-effect rounded-3xl p-8">
                <div class="w-16 h-16 rounded-full bg-gradient-to-r from-orange-400 to-purple-500 flex items-center justify-center mb-6">
                    <i class="fas fa-heart text-2xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold mb-3"><?php _e('Quality', 'codevani'); ?></h3>
                <p class="text-gray-400">
                    <?php _e('Excellence in every detail. We take pride in delivering work that exceeds expectations.', 'codevani'); ?>
                </p>
            </div>

            <div class="value-card glass-effect rounded-3xl p-8">
                <div class="w-16 h-16 rounded-full bg-gradient-to-r from-orange-400 to-purple-500 flex items-center justify-center mb-6">
                    <i class="fas fa-handshake text-2xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold mb-3"><?php _e('Collaboration', 'codevani'); ?></h3>
                <p class="text-gray-400">
                    <?php _e('We work closely with our clients as partners, ensuring alignment and shared success.', 'codevani'); ?>
                </p>
            </div>

            <div class="value-card glass-effect rounded-3xl p-8">
                <div class="w-16 h-16 rounded-full bg-gradient-to-r from-orange-400 to-purple-500 flex items-center justify-center mb-6">
                    <i class="fas fa-shield-alt text-2xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold mb-3"><?php _e('Integrity', 'codevani'); ?></h3>
                <p class="text-gray-400">
                    <?php _e('Honesty and transparency in all our dealings. We build trust through consistent action.', 'codevani'); ?>
                </p>
            </div>

            <div class="value-card glass-effect rounded-3xl p-8">
                <div class="w-16 h-16 rounded-full bg-gradient-to-r from-orange-400 to-purple-500 flex items-center justify-center mb-6">
                    <i class="fas fa-chart-line text-2xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold mb-3"><?php _e('Growth', 'codevani'); ?></h3>
                <p class="text-gray-400">
                    <?php _e('Continuous improvement for ourselves and our clients. We never stop learning.', 'codevani'); ?>
                </p>
            </div>

            <div class="value-card glass-effect rounded-3xl p-8">
                <div class="w-16 h-16 rounded-full bg-gradient-to-r from-orange-400 to-purple-500 flex items-center justify-center mb-6">
                    <i class="fas fa-smile text-2xl text-white"></i>
                </div>
                <h3 class="text-2xl font-bold mb-3"><?php _e('Passion', 'codevani'); ?></h3>
                <p class="text-gray-400">
                    <?php _e('We love what we do. Our enthusiasm drives creativity and exceptional results.', 'codevani'); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-20 px-4 pb-safe overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">
                <?php _e('Meet Our', 'codevani'); ?> <span class="gradient-text"><?php _e('Team', 'codevani'); ?></span>
            </h2>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                <?php _e('The talented individuals who bring your ideas to life', 'codevani'); ?>
            </p>
        </div>

        <div class="team-slider">
            <div class="team-track">
                <?php
                // Query team members custom post type
                $team_query = new WP_Query(array(
                    'post_type' => 'team',
                    'posts_per_page' => -1,
                    'post_status' => 'publish'
                ));

                if ($team_query->have_posts()) :
                    while ($team_query->have_posts()) : $team_query->the_post();
                        $team_image = get_the_post_thumbnail_url(get_the_ID(), 'codevani-team');
                        $team_position = get_post_meta(get_the_ID(), 'team_position', true);
                        $team_linkedin = get_post_meta(get_the_ID(), 'team_linkedin', true);
                        $team_twitter = get_post_meta(get_the_ID(), 'team_twitter', true);
                        $team_github = get_post_meta(get_the_ID(), 'team_github', true);
                        
                        $gradient_colors = array(
                            'from-purple-600 to-pink-600',
                            'from-blue-600 to-cyan-600',
                            'from-orange-600 to-red-600',
                            'from-green-600 to-teal-600',
                            'from-indigo-600 to-purple-600',
                            'from-pink-600 to-rose-600'
                        );
                        $random_gradient = $gradient_colors[array_rand($gradient_colors)];
                ?>
                    <div class="team-card glass-effect rounded-3xl overflow-hidden">
                        <div class="h-80 bg-gradient-to-br <?php echo $random_gradient; ?> flex items-center justify-center overflow-hidden">
                            <div class="team-image w-full h-full flex items-center justify-center">
                                <?php if ($team_image) : ?>
                                    <img src="<?php echo esc_url($team_image); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover">
                                <?php else : ?>
                                    <i class="fas fa-user text-8xl text-white/30"></i>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-1"><?php the_title(); ?></h3>
                            <p class="text-purple-400 mb-3"><?php echo esc_html($team_position); ?></p>
                            <p class="text-gray-400 text-sm mb-4">
                                <?php echo wp_trim_words(get_the_excerpt(), 10); ?>
                            </p>
                            <div class="team-social flex gap-3">
                                <?php if ($team_linkedin) : ?>
                                    <a href="<?php echo esc_url($team_linkedin); ?>" class="w-10 h-10 rounded-full glass-effect flex items-center justify-center hover:bg-white/10 transition" target="_blank" rel="noopener">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if ($team_twitter) : ?>
                                    <a href="<?php echo esc_url($team_twitter); ?>" class="w-10 h-10 rounded-full glass-effect flex items-center justify-center hover:bg-white/10 transition" target="_blank" rel="noopener">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if ($team_github) : ?>
                                    <a href="<?php echo esc_url($team_github); ?>" class="w-10 h-10 rounded-full glass-effect flex items-center justify-center hover:bg-white/10 transition" target="_blank" rel="noopener">
                                        <i class="fab fa-github"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Fallback team members
                    $default_team = array(
                        array('name' => __('Rajesh Kumar', 'codevani'), 'position' => __('CEO & Founder', 'codevani'), 'desc' => __('Visionary leader with 15+ years in tech industry', 'codevani'), 'gradient' => 'from-purple-600 to-pink-600'),
                        array('name' => __('Priya Sharma', 'codevani'), 'position' => __('Lead Designer', 'codevani'), 'desc' => __('Creative genius specializing in UI/UX design', 'codevani'), 'gradient' => 'from-blue-600 to-cyan-600'),
                        array('name' => __('Amit Patel', 'codevani'), 'position' => __('Tech Lead', 'codevani'), 'desc' => __('Full-stack developer with passion for innovation', 'codevani'), 'gradient' => 'from-orange-600 to-red-600'),
                        array('name' => __('Sneha Reddy', 'codevani'), 'position' => __('Marketing Head', 'codevani'), 'desc' => __('Digital marketing expert driving growth strategies', 'codevani'), 'gradient' => 'from-green-600 to-teal-600'),
                        array('name' => __('Vikram Singh', 'codevani'), 'position' => __('DevOps Engineer', 'codevani'), 'desc' => __('Infrastructure wizard ensuring seamless deployment', 'codevani'), 'gradient' => 'from-indigo-600 to-purple-600'),
                        array('name' => __('Ananya Desai', 'codevani'), 'position' => __('Product Manager', 'codevani'), 'desc' => __('Strategic thinker bridging tech and business goals', 'codevani'), 'gradient' => 'from-pink-600 to-rose-600')
                    );

                    foreach ($default_team as $member) :
                ?>
                    <div class="team-card glass-effect rounded-3xl overflow-hidden">
                        <div class="h-80 bg-gradient-to-br <?php echo esc_attr($member['gradient']); ?> flex items-center justify-center overflow-hidden">
                            <div class="team-image w-full h-full flex items-center justify-center">
                                <i class="fas fa-user text-8xl text-white/30"></i>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-1"><?php echo esc_html($member['name']); ?></h3>
                            <p class="text-purple-400 mb-3"><?php echo esc_html($member['position']); ?></p>
                            <p class="text-gray-400 text-sm mb-4">
                                <?php echo esc_html($member['desc']); ?>
                            </p>
                            <div class="team-social flex gap-3">
                                <a href="#" class="w-10 h-10 rounded-full glass-effect flex items-center justify-center hover:bg-white/10 transition">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                                <a href="#" class="w-10 h-10 rounded-full glass-effect flex items-center justify-center hover:bg-white/10 transition">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="w-10 h-10 rounded-full glass-effect flex items-center justify-center hover:bg-white/10 transition">
                                    <i class="fab fa-github"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; endif; ?>
                
                <!-- Duplicate for seamless loop -->
                <?php if ($team_query->have_posts()) : 
                    $team_query->rewind_posts();
                    while ($team_query->have_posts()) : $team_query->the_post();
                        $team_image = get_the_post_thumbnail_url(get_the_ID(), 'codevani-team');
                        $team_position = get_post_meta(get_the_ID(), 'team_position', true);
                        $team_linkedin = get_post_meta(get_the_ID(), 'team_linkedin', true);
                        $team_twitter = get_post_meta(get_the_ID(), 'team_twitter', true);
                        $team_github = get_post_meta(get_the_ID(), 'team_github', true);
                        
                        $gradient_colors = array(
                            'from-purple-600 to-pink-600',
                            'from-blue-600 to-cyan-600',
                            'from-orange-600 to-red-600',
                            'from-green-600 to-teal-600',
                            'from-indigo-600 to-purple-600',
                            'from-pink-600 to-rose-600'
                        );
                        $random_gradient = $gradient_colors[array_rand($gradient_colors)];
                ?>
                    <div class="team-card glass-effect rounded-3xl overflow-hidden">
                        <div class="h-80 bg-gradient-to-br <?php echo $random_gradient; ?> flex items-center justify-center overflow-hidden">
                            <div class="team-image w-full h-full flex items-center justify-center">
                                <?php if ($team_image) : ?>
                                    <img src="<?php echo esc_url($team_image); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover">
                                <?php else : ?>
                                    <i class="fas fa-user text-8xl text-white/30"></i>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-1"><?php the_title(); ?></h3>
                            <p class="text-purple-400 mb-3"><?php echo esc_html($team_position); ?></p>
                            <p class="text-gray-400 text-sm mb-4">
                                <?php echo wp_trim_words(get_the_excerpt(), 10); ?>
                            </p>
                            <div class="team-social flex gap-3">
                                <?php if ($team_linkedin) : ?>
                                    <a href="<?php echo esc_url($team_linkedin); ?>" class="w-10 h-10 rounded-full glass-effect flex items-center justify-center hover:bg-white/10 transition" target="_blank" rel="noopener">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if ($team_twitter) : ?>
                                    <a href="<?php echo esc_url($team_twitter); ?>" class="w-10 h-10 rounded-full glass-effect flex items-center justify-center hover:bg-white/10 transition" target="_blank" rel="noopener">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if ($team_github) : ?>
                                    <a href="<?php echo esc_url($team_github); ?>" class="w-10 h-10 rounded-full glass-effect flex items-center justify-center hover:bg-white/10 transition" target="_blank" rel="noopener">
                                        <i class="fab fa-github"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php 
                    endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-20 px-4 pb-safe">
    <div class="max-w-4xl mx-auto text-center">
        <div class="glass-effect rounded-3xl p-12">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                <?php _e('Ready to Work', 'codevani'); ?> <span class="gradient-text"><?php _e('Together?', 'codevani'); ?></span>
            </h2>
            <p class="text-gray-400 text-lg mb-8 max-w-2xl mx-auto">
                <?php _e('Let\'s transform your ideas into reality. Get in touch with us today and start your digital journey.', 'codevani'); ?>
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?php echo home_url('/contact'); ?>" class="bg-gradient-to-r from-orange-400 to-purple-500 px-8 py-4 rounded-full font-semibold text-lg hover:shadow-lg hover:shadow-purple-500/50 transition">
                    <?php _e('Get Started', 'codevani'); ?>
                </a>
                <a href="<?php echo home_url('/portfolio'); ?>" class="glass-effect px-8 py-4 rounded-full font-semibold text-lg hover:bg-white/10 transition">
                    <?php _e('View Our Work', 'codevani'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
