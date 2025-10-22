<?php
/**
 * Template Name: Contact Page
 * 
 * @package Codevani
 */

get_header(); ?>

<!-- Hero Section -->
<section class="min-h-[60vh] flex items-center justify-center px-4 pt-32 md:pt-24 pb-safe">
    <div class="max-w-6xl mx-auto text-center">
        <div class="mb-8 animate-float">
            <div class="inline-block glass-effect rounded-3xl p-8">
                <i class="fas fa-envelope text-6xl gradient-text"></i>
            </div>
        </div>
        <h1 class="text-4xl sm:text-5xl md:text-7xl font-bold mb-6">
            <?php _e('Get In', 'codevani'); ?> <span class="gradient-text"><?php _e('Touch', 'codevani'); ?></span>
        </h1>
        <p class="text-xl md:text-2xl text-gray-400 max-w-3xl mx-auto mb-8">
            <?php _e('Ready to start your next project? Let\'s discuss how we can help bring your ideas to life.', 'codevani'); ?>
        </p>
    </div>
</section>

<!-- Contact Information -->
<section class="py-20 px-4 pb-safe">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Info -->
            <div>
                <h2 class="text-4xl md:text-5xl font-bold mb-8">
                    <?php _e('Let\'s Talk', 'codevani'); ?> <span class="gradient-text"><?php _e('Business', 'codevani'); ?></span>
                </h2>
                <p class="text-gray-400 text-lg mb-8">
                    <?php _e('Have a project in mind? We\'d love to hear about it. Send us a message and we\'ll respond within 24 hours.', 'codevani'); ?>
                </p>

                <div class="space-y-6">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-r from-orange-400 to-purple-500 flex items-center justify-center">
                            <i class="fas fa-phone text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg"><?php _e('Phone', 'codevani'); ?></h3>
                            <p class="text-gray-400">
                                <a href="tel:<?php echo get_theme_mod('contact_phone', '+91-8287940985'); ?>" class="hover:text-purple-400 transition">
                                    <?php echo get_theme_mod('contact_phone', '+91-8287940985'); ?>
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-r from-orange-400 to-purple-500 flex items-center justify-center">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg"><?php _e('Email', 'codevani'); ?></h3>
                            <p class="text-gray-400">
                                <a href="mailto:<?php echo get_theme_mod('contact_email', 'hello@codevani.com'); ?>" class="hover:text-purple-400 transition">
                                    <?php echo get_theme_mod('contact_email', 'hello@codevani.com'); ?>
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-r from-orange-400 to-purple-500 flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg"><?php _e('Address', 'codevani'); ?></h3>
                            <p class="text-gray-400">
                                <?php echo get_theme_mod('contact_address', '123 Example Street, Jaipur, Rajasthan 302001, India'); ?>
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-r from-orange-400 to-purple-500 flex items-center justify-center">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg"><?php _e('Business Hours', 'codevani'); ?></h3>
                            <p class="text-gray-400">
                                <?php echo get_theme_mod('business_hours', 'Monday - Friday: 9:00 AM - 6:00 PM'); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="mt-8">
                    <h3 class="font-semibold text-lg mb-4"><?php _e('Follow Us', 'codevani'); ?></h3>
                    <div class="flex gap-4">
                        <?php if (get_theme_mod('social_twitter')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('social_twitter')); ?>" class="w-12 h-12 rounded-full glass-effect flex items-center justify-center hover:bg-white/10 transition" target="_blank" rel="noopener">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                        <?php endif; ?>
                        <?php if (get_theme_mod('social_instagram')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('social_instagram')); ?>" class="w-12 h-12 rounded-full glass-effect flex items-center justify-center hover:bg-white/10 transition" target="_blank" rel="noopener">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                        <?php endif; ?>
                        <?php if (get_theme_mod('social_linkedin')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('social_linkedin')); ?>" class="w-12 h-12 rounded-full glass-effect flex items-center justify-center hover:bg-white/10 transition" target="_blank" rel="noopener">
                                <i class="fab fa-linkedin text-xl"></i>
                            </a>
                        <?php endif; ?>
                        <?php if (get_theme_mod('social_facebook')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('social_facebook')); ?>" class="w-12 h-12 rounded-full glass-effect flex items-center justify-center hover:bg-white/10 transition" target="_blank" rel="noopener">
                                <i class="fab fa-facebook text-xl"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="glass-effect rounded-3xl p-8">
                <h3 class="text-2xl font-bold mb-6"><?php _e('Send us a Message', 'codevani'); ?></h3>
                <p id="formMsg" class="text-center mt-4 text-sm"></p>
                
                <form id="contactForm" class="space-y-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium mb-2"><?php _e('First Name', 'codevani'); ?> *</label>
                            <input type="text" name="name" class="w-full bg-white/5 border border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 transition" placeholder="<?php _e('John', 'codevani'); ?>" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2"><?php _e('Last Name', 'codevani'); ?></label>
                            <input type="text" name="last_name" class="w-full bg-white/5 border border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 transition" placeholder="<?php _e('Doe', 'codevani'); ?>">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2"><?php _e('Email Address', 'codevani'); ?> *</label>
                        <input type="email" name="email" class="w-full bg-white/5 border border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 transition" placeholder="john@example.com" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2"><?php _e('Phone Number', 'codevani'); ?> *</label>
                        <input type="tel" name="phone" class="w-full bg-white/5 border border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 transition" placeholder="+91 98765 43210" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2"><?php _e('Company', 'codevani'); ?></label>
                        <input type="text" name="company" class="w-full bg-white/5 border border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 transition" placeholder="<?php _e('Your Company Name', 'codevani'); ?>">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2"><?php _e('Project Type', 'codevani'); ?></label>
                        <select name="project_type" class="w-full bg-white/5 border border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 transition">
                            <option value=""><?php _e('Select Project Type', 'codevani'); ?></option>
                            <option value="web-development"><?php _e('Web Development', 'codevani'); ?></option>
                            <option value="mobile-app"><?php _e('Mobile App', 'codevani'); ?></option>
                            <option value="ui-ux-design"><?php _e('UI/UX Design', 'codevani'); ?></option>
                            <option value="e-commerce"><?php _e('E-Commerce', 'codevani'); ?></option>
                            <option value="seo-marketing"><?php _e('SEO & Marketing', 'codevani'); ?></option>
                            <option value="other"><?php _e('Other', 'codevani'); ?></option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2"><?php _e('Budget Range', 'codevani'); ?></label>
                        <select name="budget" class="w-full bg-white/5 border border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 transition">
                            <option value=""><?php _e('Select Budget Range', 'codevani'); ?></option>
                            <option value="under-50k"><?php _e('Under ₹50,000', 'codevani'); ?></option>
                            <option value="50k-1l"><?php _e('₹50,000 - ₹1,00,000', 'codevani'); ?></option>
                            <option value="1l-2l"><?php _e('₹1,00,000 - ₹2,00,000', 'codevani'); ?></option>
                            <option value="2l-5l"><?php _e('₹2,00,000 - ₹5,00,000', 'codevani'); ?></option>
                            <option value="5l-plus"><?php _e('₹5,00,000+', 'codevani'); ?></option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2"><?php _e('Message', 'codevani'); ?> *</label>
                        <textarea name="message" rows="5" class="w-full bg-white/5 border border-gray-700 rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 transition resize-none" placeholder="<?php _e('Tell us about your project requirements...', 'codevani'); ?>" required></textarea>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-orange-400 to-purple-500 px-8 py-4 rounded-full font-semibold text-lg hover:shadow-lg hover:shadow-purple-500/50 transition">
                        <i class="fas fa-paper-plane mr-2"></i> <?php _e('Send Message', 'codevani'); ?>
                    </button>

                    <p class="text-gray-500 text-sm text-center">
                        <?php _e('By submitting this form, you agree to our', 'codevani'); ?> 
                        <a href="<?php echo home_url('/privacy-policy'); ?>" class="text-purple-400 hover:text-purple-300 transition"><?php _e('Privacy Policy', 'codevani'); ?></a>
                    </p>
                </form>
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
                <?php _e('Everything you need to know about working with us', 'codevani'); ?>
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

<!-- Map Section -->
<?php if (get_theme_mod('contact_map_embed')) : ?>
<section class="py-20 px-4 pb-safe">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">
                <?php _e('Find Us', 'codevani'); ?> <span class="gradient-text"><?php _e('Here', 'codevani'); ?></span>
            </h2>
            <p class="text-gray-400 text-lg">
                <?php _e('Visit our office or get directions to our location', 'codevani'); ?>
            </p>
        </div>
        
        <div class="glass-effect rounded-3xl overflow-hidden">
            <?php echo get_theme_mod('contact_map_embed'); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>
