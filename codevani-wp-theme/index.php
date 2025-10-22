<?php
/**
 * The main template file
 *
 * @package Codevani
 */

get_header(); ?>

<main>
    <!-- Hero Section -->
    <section id="home" aria-label="Hero section of Codevani homepage" class="min-h-screen flex items-center justify-center px-4 pt-20 md:pt-0 pb-safe relative bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto text-center">
            <!-- Decorative Icon -->
            <div class="mb-8 animate-float">
                <div class="inline-block glass-effect rounded-3xl p-8 mb-8">
                    <i class="fas fa-code text-6xl gradient-text" aria-hidden="true"></i>
                </div>
            </div>

            <!-- Main Heading -->
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold mb-6">
                <?php echo get_theme_mod('hero_title', 'Codevani | Web & App Development'); ?>
            </h1>

            <!-- Subheading / Paragraph -->
            <p class="text-xl md:text-2xl text-gray-400 mb-8 max-w-3xl mx-auto">
                <?php echo get_theme_mod('hero_subtitle', 'Transform your digital presence with stunning web applications, UI/UX design, and SEO-optimized solutions tailored to grow your business.'); ?>
            </p>

            <!-- Call-to-Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="<?php echo home_url('/contact'); ?>" class="bg-gradient-to-r from-orange-400 to-purple-500 px-8 py-4 rounded-full font-semibold text-lg hover:shadow-lg hover:shadow-purple-500/50 transition w-full sm:w-auto">
                    <?php _e('Start Your Project', 'codevani'); ?>
                </a>
                <a href="<?php echo home_url('/portfolio'); ?>" class="glass-effect px-8 py-4 rounded-full font-semibold text-lg hover:bg-white/10 transition w-full sm:w-auto">
                    <i class="fas fa-play mr-2" aria-hidden="true"></i> <?php _e('View Demo', 'codevani'); ?>
                </a>
            </div>

            <!-- Stats with Schema.org Markup -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-16">
                <div class="glass-effect rounded-2xl p-6" itemscope itemtype="https://schema.org/Claim">
                    <div class="text-4xl font-bold gradient-text" itemprop="claimReviewed">500+</div>
                    <div class="text-gray-400 mt-2"><?php _e('Projects Done', 'codevani'); ?></div>
                </div>

                <div class="glass-effect rounded-2xl p-6" itemscope itemtype="https://schema.org/Claim">
                    <div class="text-4xl font-bold gradient-text" itemprop="claimReviewed">250+</div>
                    <div class="text-gray-400 mt-2"><?php _e('Happy Clients', 'codevani'); ?></div>
                </div>

                <div class="glass-effect rounded-2xl p-6" itemscope itemtype="https://schema.org/Claim">
                    <div class="text-4xl font-bold gradient-text" itemprop="claimReviewed">50+</div>
                    <div class="text-gray-400 mt-2"><?php _e('Team Members', 'codevani'); ?></div>
                </div>

                <div class="glass-effect rounded-2xl p-6" itemscope itemtype="https://schema.org/Claim">
                    <div class="text-4xl font-bold gradient-text" itemprop="claimReviewed">15+</div>
                    <div class="text-gray-400 mt-2"><?php _e('Awards Won', 'codevani'); ?></div>
                </div>
            </div>

            <!-- Optional Hero Image for SEO -->
            <?php if (get_theme_mod('hero_image')) : ?>
                <img src="<?php echo esc_url(get_theme_mod('hero_image')); ?>" alt="<?php _e('Web & App Development by Codevani', 'codevani'); ?>" class="absolute bottom-0 right-0 w-1/2 max-w-md hidden md:block">
            <?php endif; ?>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 px-4 pb-safe">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-6xl font-bold mb-4">
                    <?php _e('Our', 'codevani'); ?> <span class="gradient-text"><?php _e('Services', 'codevani'); ?></span>
                </h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                    <?php _e('Comprehensive digital solutions tailored to elevate your business', 'codevani'); ?>
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php
                // Query services custom post type
                $services_query = new WP_Query(array(
                    'post_type' => 'services',
                    'posts_per_page' => 6,
                    'post_status' => 'publish'
                ));

                if ($services_query->have_posts()) :
                    while ($services_query->have_posts()) : $services_query->the_post();
                        $service_icon = get_post_meta(get_the_ID(), 'service_icon', true);
                        $service_icon = $service_icon ? $service_icon : 'fas fa-laptop-code';
                ?>
                    <article class="service-card glass-effect rounded-3xl p-8">
                        <div class="text-5xl mb-4">
                            <i class="<?php echo esc_attr($service_icon); ?> gradient-text"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-3"><?php the_title(); ?></h3>
                        <p class="text-gray-400 mb-4">
                            <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="text-purple-400 hover:text-purple-300 transition">
                            <?php _e('Learn more', 'codevani'); ?> <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Fallback services if no custom post type exists
                    $default_services = array(
                        array('icon' => 'fas fa-laptop-code', 'title' => __('Web Development', 'codevani'), 'desc' => __('Custom web applications built with modern technologies like React, Node.js, and more', 'codevani')),
                        array('icon' => 'fas fa-mobile-alt', 'title' => __('Mobile Apps', 'codevani'), 'desc' => __('Native and cross-platform mobile applications for iOS and Android devices', 'codevani')),
                        array('icon' => 'fas fa-paint-brush', 'title' => __('UI/UX Design', 'codevani'), 'desc' => __('Beautiful, intuitive designs that provide exceptional user experiences', 'codevani')),
                        array('icon' => 'fas fa-shopping-cart', 'title' => __('E-Commerce', 'codevani'), 'desc' => __('Complete online store solutions with payment integration and inventory management', 'codevani')),
                        array('icon' => 'fas fa-search', 'title' => __('SEO Optimization', 'codevani'), 'desc' => __('Boost your online visibility and rank higher in search engine results', 'codevani')),
                        array('icon' => 'fas fa-rocket', 'title' => __('Digital Marketing', 'codevani'), 'desc' => __('Strategic marketing campaigns to grow your brand and reach your audience', 'codevani'))
                    );

                    foreach ($default_services as $service) :
                ?>
                    <article class="service-card glass-effect rounded-3xl p-8">
                        <div class="text-5xl mb-4">
                            <i class="<?php echo esc_attr($service['icon']); ?> gradient-text"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-3"><?php echo esc_html($service['title']); ?></h3>
                        <p class="text-gray-400 mb-4">
                            <?php echo esc_html($service['desc']); ?>
                        </p>
                        <a href="<?php echo home_url('/services'); ?>" class="text-purple-400 hover:text-purple-300 transition">
                            <?php _e('Learn more', 'codevani'); ?> <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </article>
                <?php endforeach; endif; ?>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="work" class="py-20 px-4 pb-safe">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-6xl font-bold mb-4">
                    <?php _e('Our', 'codevani'); ?> <span class="gradient-text"><?php _e('Work', 'codevani'); ?></span>
                </h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                    <?php _e('Showcasing our best projects and success stories', 'codevani'); ?>
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php
                // Query portfolio custom post type
                $portfolio_query = new WP_Query(array(
                    'post_type' => 'portfolio',
                    'posts_per_page' => 6,
                    'post_status' => 'publish'
                ));

                if ($portfolio_query->have_posts()) :
                    while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
                        $portfolio_image = get_the_post_thumbnail_url(get_the_ID(), 'codevani-portfolio');
                        $portfolio_categories = get_the_terms(get_the_ID(), 'portfolio_category');
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
                    <article class="glass-effect rounded-3xl overflow-hidden group cursor-pointer">
                        <div class="h-64 bg-gradient-to-br <?php echo $random_gradient; ?> flex items-center justify-center">
                            <?php if ($portfolio_image) : ?>
                                <img src="<?php echo esc_url($portfolio_image); ?>" alt="<?php the_title_attribute(); ?>" class="object-cover h-full w-full opacity-10">
                            <?php endif; ?>
                            <i class="fas fa-image text-6xl text-white/30 absolute"></i>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2"><?php the_title(); ?></h3>
                            <p class="text-gray-400"><?php echo wp_trim_words(get_the_excerpt(), 8); ?></p>
                            <?php if ($portfolio_categories && !is_wp_error($portfolio_categories)) : ?>
                                <div class="mt-2">
                                    <?php foreach ($portfolio_categories as $category) : ?>
                                        <span class="inline-block bg-purple-500/20 text-purple-300 px-2 py-1 rounded text-xs mr-1"><?php echo esc_html($category->name); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Fallback portfolio items
                    $default_portfolio = array(
                        array('title' => __('E-Commerce Platform', 'codevani'), 'desc' => __('Modern online shopping experience', 'codevani'), 'gradient' => 'from-purple-600 to-pink-600'),
                        array('title' => __('Healthcare App', 'codevani'), 'desc' => __('Patient-focused mobile application', 'codevani'), 'gradient' => 'from-blue-600 to-cyan-600'),
                        array('title' => __('Startup Website', 'codevani'), 'desc' => __('Innovative landing page for new startup', 'codevani'), 'gradient' => 'from-orange-600 to-red-600')
                    );

                    foreach ($default_portfolio as $item) :
                ?>
                    <article class="glass-effect rounded-3xl overflow-hidden group cursor-pointer">
                        <div class="h-64 bg-gradient-to-br <?php echo esc_attr($item['gradient']); ?> flex items-center justify-center">
                            <i class="fas fa-image text-6xl text-white/30 absolute"></i>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2"><?php echo esc_html($item['title']); ?></h3>
                            <p class="text-gray-400"><?php echo esc_html($item['desc']); ?></p>
                        </div>
                    </article>
                <?php endforeach; endif; ?>
            </div>
            
            <div class="text-center mt-12">
                <a href="<?php echo home_url('/portfolio'); ?>" class="glass-effect px-8 py-4 rounded-full font-semibold text-lg hover:bg-white/10 transition">
                    <?php _e('View All Projects', 'codevani'); ?> <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Tech Stack Section -->
    <section id="tech-stack" class="py-20 px-4 pb-safe">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-6xl font-bold mb-4">
                    <?php _e('Technologies We', 'codevani'); ?> <span class="gradient-text"><?php _e('Master', 'codevani'); ?></span>
                </h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                    <?php _e('Leveraging cutting-edge technologies to build scalable, high-performance solutions', 'codevani'); ?>
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <!-- Frontend -->
                <div class="glass-effect rounded-3xl p-8">
                    <div class="text-4xl mb-4">
                        <i class="fas fa-palette gradient-text"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-6"><?php _e('Frontend Development', 'codevani'); ?></h3>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="flex flex-col items-center gap-2">
                            <div class="w-16 h-16 glass-effect rounded-xl flex items-center justify-center">
                                <i class="fab fa-react text-3xl text-cyan-400"></i>
                            </div>
                            <span class="text-sm text-gray-400">React</span>
                        </div>
                        <div class="flex flex-col items-center gap-2">
                            <div class="w-16 h-16 glass-effect rounded-xl flex items-center justify-center">
                                <i class="fab fa-vuejs text-3xl text-green-400"></i>
                            </div>
                            <span class="text-sm text-gray-400">Vue.js</span>
                        </div>
                        <div class="flex flex-col items-center gap-2">
                            <div class="w-16 h-16 glass-effect rounded-xl flex items-center justify-center">
                                <i class="fab fa-angular text-3xl text-red-400"></i>
                            </div>
                            <span class="text-sm text-gray-400">Angular</span>
                        </div>
                        <div class="flex flex-col items-center gap-2">
                            <div class="w-16 h-16 glass-effect rounded-xl flex items-center justify-center">
                                <svg class="w-8 h-8" viewBox="0 0 24 24" fill="white">
                                    <path d="M11.572 0c-.176 0-.31.001-.358.007a19.76 19.76 0 0 1-.364.033C7.443.346 4.25 2.185 2.228 5.012a11.875 11.875 0 0 0-2.119 5.243c-.096.659-.108.854-.108 1.747s.012 1.089.108 1.748c.652 4.506 3.86 8.292 8.209 9.695.779.25 1.6.422 2.534.525.363.04 1.935.04 2.299 0 1.611-.178 2.977-.577 4.323-1.264.207-.106.247-.134.219-.158-.02-.013-.9-1.193-1.955-2.62l-1.919-2.592-2.404-3.558a338.739 338.739 0 0 0-2.422-3.556c-.009-.002-.018 1.579-.023 3.51-.007 3.38-.01 3.515-.052 3.595a.426.426 0 0 1-.206.214c-.075.037-.14.044-.495.044H7.81l-.108-.068a.438.438 0 0 1-.157-.171l-.05-.106.006-4.703.007-4.705.072-.092a.645.645 0 0 1 .174-.143c.096-.047.134-.051.54-.051.478 0 .558.018.682.154.035.038 1.337 1.999 2.895 4.361a10760.433 10760.433 0 0 0 4.735 7.17l1.9 2.879.096-.063a12.317 12.317 0 0 0 2.466-2.163 11.944 11.944 0 0 0 2.824-6.134c.096-.66.108-.854.108-1.748 0-.893-.012-1.088-.108-1.747-.652-4.506-3.859-8.292-8.208-9.695a12.597 12.597 0 0 0-2.499-.523A33.119 33.119 0 0 0 11.573 0zm4.069 7.217c.347 0 .408.005.486.047a.473.473 0 0 1 .237.277c.018.06.023 1.365.018 4.304l-.006 4.218-.744-1.14-.746-1.14v-3.066c0-1.982.01-3.097.023-3.15a.478.478 0 0 1 .233-.296c.096-.05.13-.054.5-.054z"/>
                                </svg>
                            </div>
                            <span class="text-sm text-gray-400">Next.js</span>
                        </div>
                        <div class="flex flex-col items-center gap-2">
                            <div class="w-16 h-16 glass-effect rounded-xl flex items-center justify-center">
                                <i class="fab fa-html5 text-3xl text-orange-400"></i>
                            </div>
                            <span class="text-sm text-gray-400">HTML5</span>
                        </div>
                        <div class="flex flex-col items-center gap-2">
                            <div class="w-16 h-16 glass-effect rounded-xl flex items-center justify-center">
                                <i class="fab fa-css3-alt text-3xl text-blue-400"></i>
                            </div>
                            <span class="text-sm text-gray-400">CSS3</span>
                        </div>
                    </div>
                </div>

                <!-- Backend -->
                <div class="glass-effect rounded-3xl p-8">
                    <div class="text-4xl mb-4">
                        <i class="fas fa-server gradient-text"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-6"><?php _e('Backend Development', 'codevani'); ?></h3>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="flex flex-col items-center gap-2">
                            <div class="w-16 h-16 glass-effect rounded-xl flex items-center justify-center">
                                <i class="fab fa-node-js text-3xl text-green-500"></i>
                            </div>
                            <span class="text-sm text-gray-400">Node.js</span>
                        </div>
                        <div class="flex flex-col items-center gap-2">
                            <div class="w-16 h-16 glass-effect rounded-xl flex items-center justify-center">
                                <i class="fab fa-python text-3xl text-blue-400"></i>
                            </div>
                            <span class="text-sm text-gray-400">Python</span>
                        </div>
                        <div class="flex flex-col items-center gap-2">
                            <div class="w-16 h-16 glass-effect rounded-xl flex items-center justify-center">
                                <i class="fab fa-php text-3xl text-purple-400"></i>
                            </div>
                            <span class="text-sm text-gray-400">PHP</span>
                        </div>
                        <div class="flex flex-col items-center gap-2">
                            <div class="w-16 h-16 glass-effect rounded-xl flex items-center justify-center">
                                <i class="fab fa-java text-3xl text-red-400"></i>
                            </div>
                            <span class="text-sm text-gray-400">Java</span>
                        </div>
                        <div class="flex flex-col items-center gap-2">
                            <div class="w-16 h-16 glass-effect rounded-xl flex items-center justify-center">
                                <i class="fab fa-laravel text-3xl text-red-500"></i>
                            </div>
                            <span class="text-sm text-gray-400">Laravel</span>
                        </div>
                        <div class="flex flex-col items-center gap-2">
                            <div class="w-16 h-16 glass-effect rounded-xl flex items-center justify-center">
                                <i class="fab fa-aws text-3xl text-orange-400"></i>
                            </div>
                            <span class="text-sm text-gray-400">AWS</span>
                        </div>
                    </div>
                </div>

                <!-- Mobile & Database -->
                <div class="glass-effect rounded-3xl p-8">
                    <div class="text-4xl mb-4">
                        <i class="fas fa-mobile-alt gradient-text"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-6"><?php _e('Mobile & Database', 'codevani'); ?></h3>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="flex flex-col items-center gap-2">
                            <div class="w-16 h-16 glass-effect rounded-xl flex items-center justify-center">
                                <i class="fab fa-android text-3xl text-green-400"></i>
                            </div>
                            <span class="text-sm text-gray-400">Android</span>
                        </div>
                        <div class="flex flex-col items-center gap-2">
                            <div class="w-16 h-16 glass-effect rounded-xl flex items-center justify-center">
                                <i class="fab fa-apple text-3xl text-gray-300"></i>
                            </div>
                            <span class="text-sm text-gray-400">iOS</span>
                        </div>
                        <div class="flex flex-col items-center gap-2">
                            <div class="w-16 h-16 glass-effect rounded-xl flex items-center justify-center">
                                <svg class="w-8 h-8" viewBox="0 0 24 24" fill="#61DAFB">
                                    <path d="M12 10.11c1.03 0 1.87.84 1.87 1.89 0 1-.84 1.85-1.87 1.85S10.13 13 10.13 12c0-1.05.84-1.89 1.87-1.89M7.37 20c.63.38 2.01-.2 3.6-1.7-.52-.59-1.03-1.23-1.51-1.9a22.7 22.7 0 0 1-2.4-.36c-.51 2.14-.32 3.61.31 3.96m.71-5.74l-.29-.51c-.11.29-.22.58-.29.86.27.06.57.11.88.16l-.3-.51m6.54-.76l.81-1.5-.81-1.5c-.3-.53-.62-1-.91-1.47C13.17 9 12.6 9 12 9c-.6 0-1.17 0-1.71.03-.29.47-.61.94-.91 1.47L8.57 12l.81 1.5c.3.53.62 1 .91 1.47.54.03 1.11.03 1.71.03.6 0 1.17 0 1.71-.03.29-.47.61-.94.91-1.47M12 6.78c-.19.22-.39.45-.59.72h1.18c-.2-.27-.4-.5-.59-.72m0 10.44c.19-.22.39-.45.59-.72h-1.18c.2.27.4.5.59.72M16.62 4c-.62-.38-2 .2-3.59 1.7.52.59 1.03 1.23 1.51 1.9.82.08 1.63.2 2.4.36.51-2.14.32-3.61-.32-3.96m-.7 5.74l.29.51c.11-.29.22-.58.29-.86-.27-.06-.57-.11-.88-.16l.3.51m1.45-7.05c1.47.84 1.63 3.05 1.01 5.63 2.54.75 4.37 1.99 4.37 3.68s-1.83 2.93-4.37 3.68c.62 2.58.46 4.79-1.01 5.63-1.46.84-3.45-.12-5.37-1.95-1.92 1.83-3.91 2.79-5.38 1.95-1.46-.84-1.62-3.05-1-5.63-2.54-.75-4.37-1.99-4.37-3.68s1.83-2.93 4.37-3.68c-.62-2.58-.46-4.79 1-5.63 1.47-.84 3.46.12 5.38 1.95 1.92-1.83 3.91-2.79 5.37-1.95M17.08 12c.34.75.64 1.5.89 2.26 2.1-.63 3.28-1.53 3.28-2.26 0-.73-1.18-1.63-3.28-2.26-.25.76-.55 1.51-.89 2.26M6.92 12c-.34-.75-.64-1.5-.89-2.26-2.1.63-3.28 1.53-3.28 2.26 0 .73 1.18 1.63 3.28 2.26.25-.76.55-1.51.89-2.26m9.22 0l1.5-2.5c-.53-.83-1.09-1.59-1.67-2.29-.72.09-1.47.14-2.26.14s-1.54-.05-2.26-.14c-.58.7-1.14 1.46-1.67 2.29L10.78 12l-1.5 2.5c.53.83 1.09 1.59 1.67 2.29.72-.09 1.47-.14 2.26-.14s1.54.05 2.26.14c.58-.7 1.14-1.46 1.67-2.29L16.14 12z"/>
                                </svg>
                            </div>
                            <span class="text-sm text-gray-400">React Native</span>
                        </div>
                        <div class="flex flex-col items-center gap-2">
                            <div class="w-16 h-16 glass-effect rounded-xl flex items-center justify-center">
                                <i class="fas fa-database text-3xl text-blue-400"></i>
                            </div>
                            <span class="text-sm text-gray-400">MongoDB</span>
                        </div>
                        <div class="flex flex-col items-center gap-2">
                            <div class="w-16 h-16 glass-effect rounded-xl flex items-center justify-center">
                                <i class="fas fa-database text-3xl text-orange-400"></i>
                            </div>
                            <span class="text-sm text-gray-400">MySQL</span>
                        </div>
                        <div class="flex flex-col items-center gap-2">
                            <div class="w-16 h-16 glass-effect rounded-xl flex items-center justify-center">
                                <i class="fas fa-fire text-3xl text-yellow-400"></i>
                            </div>
                            <span class="text-sm text-gray-400">Firebase</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="py-20 px-4 pb-safe bg-gradient-to-b from-black to-purple-900/20">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-6xl font-bold mb-4">
                    <?php _e('Our', 'codevani'); ?> <span class="gradient-text"><?php _e('Development Process', 'codevani'); ?></span>
                </h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                    <?php _e('A proven methodology that delivers results every time', 'codevani'); ?>
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="glass-effect rounded-3xl p-8 text-center">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-gradient-to-r from-orange-400 to-purple-500 flex items-center justify-center">
                        <span class="text-2xl font-bold">1</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3"><?php _e('Discovery & Planning', 'codevani'); ?></h3>
                    <p class="text-gray-400">
                        <?php _e('Understanding your goals, target audience, and project requirements', 'codevani'); ?>
                    </p>
                </div>

                <div class="glass-effect rounded-3xl p-8 text-center">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-gradient-to-r from-orange-400 to-purple-500 flex items-center justify-center">
                        <span class="text-2xl font-bold">2</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3"><?php _e('Design & Prototype', 'codevani'); ?></h3>
                    <p class="text-gray-400">
                        <?php _e('Creating wireframes, mockups, and interactive prototypes for approval', 'codevani'); ?>
                    </p>
                </div>

                <div class="glass-effect rounded-3xl p-8 text-center">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-gradient-to-r from-orange-400 to-purple-500 flex items-center justify-center">
                        <span class="text-2xl font-bold">3</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3"><?php _e('Development & Testing', 'codevani'); ?></h3>
                    <p class="text-gray-400">
                        <?php _e('Building your solution with clean code and rigorous quality testing', 'codevani'); ?>
                    </p>
                </div>

                <div class="glass-effect rounded-3xl p-8 text-center">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-gradient-to-r from-orange-400 to-purple-500 flex items-center justify-center">
                        <span class="text-2xl font-bold">4</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3"><?php _e('Launch & Support', 'codevani'); ?></h3>
                    <p class="text-gray-400">
                        <?php _e('Deploying your project and providing ongoing maintenance and updates', 'codevani'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 px-4">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-center">
                <?php _e('What Our', 'codevani'); ?> <span class="gradient-text"><?php _e('Clients Say', 'codevani'); ?></span>
            </h2>
            <p class="text-gray-400 text-center mb-12 max-w-2xl mx-auto">
                <?php _e('Don\'t just take our word for it - hear from clients who\'ve experienced the Codevani difference', 'codevani'); ?>
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Testimonial 1 -->
                <div class="glass-effect rounded-2xl p-6">
                    <div class="flex gap-1 mb-4">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                    <p class="text-gray-400 mb-4">
                        "<?php _e('Codevani transformed our outdated platform into a modern, user-friendly solution. The team\'s expertise and dedication exceeded our expectations.', 'codevani'); ?>"
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-orange-400 to-purple-500 flex items-center justify-center">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div>
                            <p class="font-semibold"><?php _e('Rajesh Kumar', 'codevani'); ?></p>
                            <p class="text-sm text-gray-500"><?php _e('CEO, TechStart', 'codevani'); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="glass-effect rounded-2xl p-6">
                    <div class="flex gap-1 mb-4">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                    <p class="text-gray-400 mb-4">
                        "<?php _e('The mobile app they developed has been a game-changer for our business. User engagement increased by 300% within the first month!', 'codevani'); ?>"
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-orange-400 to-purple-500 flex items-center justify-center">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div>
                            <p class="font-semibold"><?php _e('Priya Sharma', 'codevani'); ?></p>
                            <p class="text-sm text-gray-500"><?php _e('Founder, ShopEasy', 'codevani'); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="glass-effect rounded-2xl p-6">
                    <div class="flex gap-1 mb-4">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                    <p class="text-gray-400 mb-4">
                        "<?php _e('Professional, responsive, and incredibly talented. Codevani delivered our project on time and within budget. Highly recommended!', 'codevani'); ?>"
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-orange-400 to-purple-500 flex items-center justify-center">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div>
                            <p class="font-semibold"><?php _e('Arjun Patel', 'codevani'); ?></p>
                            <p class="text-sm text-gray-500"><?php _e('CTO, FinanceHub', 'codevani'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 px-4 pb-safe">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-6xl font-bold mb-4">
                    <?php _e('Frequently Asked', 'codevani'); ?> <span class="gradient-text"><?php _e('Questions', 'codevani'); ?></span>
                </h2>
                <p class="text-gray-400 text-lg">
                    <?php _e('Everything you need to know about working with Codevani', 'codevani'); ?>
                </p>
            </div>

            <div class="space-y-4">
                <details class="glass-effect rounded-2xl p-6 group">
                    <summary class="font-semibold text-lg cursor-pointer list-none flex items-center justify-between">
                        <span><?php _e('How long does it take to develop a website?', 'codevani'); ?></span>
                        <i class="fas fa-chevron-down group-open:rotate-180 transition-transform"></i>
                    </summary>
                    <p class="text-gray-400 mt-4 pl-2">
                        <?php _e('The timeline varies based on project complexity. A basic website takes 2-4 weeks, while complex web applications can take 2-6 months. We provide detailed timelines during the discovery phase.', 'codevani'); ?>
                    </p>
                </details>

                <details class="glass-effect rounded-2xl p-6 group">
                    <summary class="font-semibold text-lg cursor-pointer list-none flex items-center justify-between">
                        <span><?php _e('What is your development process?', 'codevani'); ?></span>
                        <i class="fas fa-chevron-down group-open:rotate-180 transition-transform"></i>
                    </summary>
                    <p class="text-gray-400 mt-4 pl-2">
                        <?php _e('We follow an agile methodology with four key phases: Discovery & Planning, Design & Prototype, Development & Testing, and Launch & Support. You\'ll receive regular updates and have opportunities to provide feedback throughout.', 'codevani'); ?>
                    </p>
                </details>

                <details class="glass-effect rounded-2xl p-6 group">
                    <summary class="font-semibold text-lg cursor-pointer list-none flex items-center justify-between">
                        <span><?php _e('Do you provide ongoing support and maintenance?', 'codevani'); ?></span>
                        <i class="fas fa-chevron-down group-open:rotate-180 transition-transform"></i>
                    </summary>
                    <p class="text-gray-400 mt-4 pl-2">
                        <?php _e('Yes, we offer comprehensive maintenance packages including security updates, bug fixes, performance optimization, and feature enhancements. We\'re here to ensure your digital solution continues to perform optimally.', 'codevani'); ?>
                    </p>
                </details>

                <details class="glass-effect rounded-2xl p-6 group">
                    <summary class="font-semibold text-lg cursor-pointer list-none flex items-center justify-between">
                        <span><?php _e('What technologies do you specialize in?', 'codevani'); ?></span>
                        <i class="fas fa-chevron-down group-open:rotate-180 transition-transform"></i>
                    </summary>
                    <p class="text-gray-400 mt-4 pl-2">
                        <?php _e('We specialize in modern web technologies including React, Next.js, Node.js, Python, and mobile development with React Native. We choose the best technology stack based on your specific project requirements.', 'codevani'); ?>
                    </p>
                </details>

                <details class="glass-effect rounded-2xl p-6 group">
                    <summary class="font-semibold text-lg cursor-pointer list-none flex items-center justify-between">
                        <span><?php _e('How much does a custom website cost?', 'codevani'); ?></span>
                        <i class="fas fa-chevron-down group-open:rotate-180 transition-transform"></i>
                    </summary>
                    <p class="text-gray-400 mt-4 pl-2">
                        <?php _e('Project costs vary based on scope, features, and complexity. Basic websites start from ₹50,000, while complex web applications can range from ₹2,00,000 to ₹10,00,000+. We provide detailed quotes after understanding your requirements.', 'codevani'); ?>
                    </p>
                </details>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section id="contact" class="py-20 px-4 pb-safe">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <?php _e('Let\'s Build Something', 'codevani'); ?> <span class="gradient-text"><?php _e('Amazing', 'codevani'); ?></span>
                </h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                    <?php _e('Fill out the form below and we\'ll get back to you within 24 hours', 'codevani'); ?>
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-1 gap-8">
                <div class="glass-effect rounded-3xl p-8">
                    <p id="formMsg" class="text-center mt-4 text-sm"></p>
                    <form id="contactForm" class="space-y-6 w-full p-8 rounded-2xl shadow-lg glass-effect">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium mb-2"><?php _e('First Name', 'codevani'); ?> *</label>
                                <input type="text" name="name" class="w-full bg-white/5 border border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 transition" placeholder="<?php _e('John', 'codevani'); ?>" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2"><?php _e('Email Address', 'codevani'); ?> *</label>
                                <input type="email" name="email" class="w-full bg-white/5 border border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 transition" placeholder="john@example.com" required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2"><?php _e('Phone Number', 'codevani'); ?> *</label>
                            <input type="tel" name="phone" class="w-full bg-white/5 border border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 transition" placeholder="+91 98765 43210" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2"><?php _e('Message', 'codevani'); ?></label>
                            <textarea name="message" rows="4" class="w-full bg-white/5 border border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 transition resize-none" placeholder="<?php _e('Tell us about your thought...', 'codevani'); ?>"></textarea>
                        </div>

                        <button type="submit" class="w-full bg-gradient-to-r from-orange-400 to-purple-500 px-8 py-4 rounded-full font-semibold text-lg hover:shadow-lg hover:shadow-purple-500/50 transition">
                            <i class="fas fa-paper-plane mr-2"></i> <?php _e('Send Message', 'codevani'); ?>
                        </button>

                        <p id="formMsg" class="text-center mt-4 text-sm"></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
