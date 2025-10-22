<!-- Footer -->
<footer class="border-t border-gray-800 py-8 px-4 pb-24 md:pb-8">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <div>
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <span class="gradient-text flex items-center">
                        <img src="<?php echo CODEVANI_THEME_URL; ?>/assets/img/logo.svg" style="width: 120px" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>">
                    </span>
                <?php endif; ?>
                <p class="text-gray-400 mt-4">
                    <?php echo get_theme_mod('footer_description', 'Crafting impactful digital experiences that drive growth, engagement, and success for your business online.'); ?>
                </p>
            </div>
            
            <div>
                <h4 class="font-bold mb-4"><?php _e('Services', 'codevani'); ?></h4>
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <?php dynamic_sidebar('footer-1'); ?>
                <?php else : ?>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="<?php echo home_url('/services/web-development'); ?>" class="hover:text-purple-400 transition"><?php _e('Web Development', 'codevani'); ?></a></li>
                        <li><a href="<?php echo home_url('/services/mobile-apps'); ?>" class="hover:text-purple-400 transition"><?php _e('Mobile Apps', 'codevani'); ?></a></li>
                        <li><a href="<?php echo home_url('/services/ui-ux-design'); ?>" class="hover:text-purple-400 transition"><?php _e('UI/UX Design', 'codevani'); ?></a></li>
                        <li><a href="<?php echo home_url('/services/seo'); ?>" class="hover:text-purple-400 transition"><?php _e('SEO & Marketing', 'codevani'); ?></a></li>
                    </ul>
                <?php endif; ?>
            </div>
            
            <div>
                <h4 class="font-bold mb-4"><?php _e('Company', 'codevani'); ?></h4>
                <?php if (is_active_sidebar('footer-2')) : ?>
                    <?php dynamic_sidebar('footer-2'); ?>
                <?php else : ?>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="<?php echo home_url('/about'); ?>" class="hover:text-purple-400 transition"><?php _e('About Us', 'codevani'); ?></a></li>
                        <li><a href="<?php echo home_url('/team'); ?>" class="hover:text-purple-400 transition"><?php _e('Our Team', 'codevani'); ?></a></li>
                        <li><a href="<?php echo home_url('/blog'); ?>" class="hover:text-purple-400 transition"><?php _e('Blog', 'codevani'); ?></a></li>
                        <li><a href="<?php echo home_url('/careers'); ?>" class="hover:text-purple-400 transition"><?php _e('Careers', 'codevani'); ?></a></li>
                    </ul>
                <?php endif; ?>
            </div>
            
            <div>
                <h4 class="font-bold mb-4"><?php _e('Follow Us', 'codevani'); ?></h4>
                <?php if (is_active_sidebar('footer-3')) : ?>
                    <?php dynamic_sidebar('footer-3'); ?>
                <?php else : ?>
                    <div class="flex gap-4">
                        <?php if (get_theme_mod('social_twitter')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('social_twitter')); ?>" class="text-2xl hover:text-purple-400 transition" target="_blank" rel="noopener">
                                <i class="fab fa-twitter"></i>
                            </a>
                        <?php endif; ?>
                        <?php if (get_theme_mod('social_instagram')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('social_instagram')); ?>" class="text-2xl hover:text-purple-400 transition" target="_blank" rel="noopener">
                                <i class="fab fa-instagram"></i>
                            </a>
                        <?php endif; ?>
                        <?php if (get_theme_mod('social_linkedin')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('social_linkedin')); ?>" class="text-2xl hover:text-purple-400 transition" target="_blank" rel="noopener">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        <?php endif; ?>
                        <?php if (get_theme_mod('social_facebook')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('social_facebook')); ?>" class="text-2xl hover:text-purple-400 transition" target="_blank" rel="noopener">
                                <i class="fab fa-facebook"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="mt-4">
                        <p class="text-gray-400 text-sm">
                            <?php _e('Phone:', 'codevani'); ?> <a href="tel:<?php echo get_theme_mod('contact_phone', '+91-8287940985'); ?>" class="hover:text-purple-400 transition"><?php echo get_theme_mod('contact_phone', '+91-8287940985'); ?></a>
                        </p>
                        <p class="text-gray-400 text-sm">
                            <?php _e('Email:', 'codevani'); ?> <a href="mailto:<?php echo get_theme_mod('contact_email', 'hello@codevani.com'); ?>" class="hover:text-purple-400 transition"><?php echo get_theme_mod('contact_email', 'hello@codevani.com'); ?></a>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="text-center text-gray-400 pt-8 border-t border-gray-800">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All rights reserved.', 'codevani'); ?></p>
            <?php if (is_active_sidebar('footer-4')) : ?>
                <div class="mt-4">
                    <?php dynamic_sidebar('footer-4'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</footer>

<!-- Bottom Navigation (Mobile) -->
<nav class="bottom-nav md:hidden glass-effect border-t border-gray-800">
    <div class="flex justify-around items-center py-4 px-2">
        <a href="<?php echo home_url(); ?>" class="nav-item <?php echo is_front_page() ? 'active' : ''; ?> flex flex-col items-center gap-1">
            <i class="fas fa-home text-xl"></i>
            <span class="text-xs"><?php _e('Home', 'codevani'); ?></span>
        </a>
        <a href="<?php echo home_url('/portfolio'); ?>" class="nav-item <?php echo is_post_type_archive('portfolio') ? 'active' : ''; ?> flex flex-col items-center gap-1">
            <i class="fa-solid fa-layer-group text-xl"></i>
            <span class="text-xs"><?php _e('Projects', 'codevani'); ?></span>
        </a>
        <a href="<?php echo home_url('/about'); ?>" class="nav-item <?php echo is_page('about') ? 'active' : ''; ?> flex flex-col items-center gap-1">
            <i class="fa-solid fa-question text-xl"></i>
            <span class="text-xs"><?php _e('About', 'codevani'); ?></span>
        </a>
        <a href="<?php echo home_url('/blog'); ?>" class="nav-item <?php echo is_home() || is_single() ? 'active' : ''; ?> flex flex-col items-center gap-1">
            <i class="fa-solid fa-book text-xl"></i>
            <span class="text-xs"><?php _e('Blog', 'codevani'); ?></span>
        </a>
        <a href="<?php echo home_url('/contact'); ?>" class="nav-item <?php echo is_page('contact') ? 'active' : ''; ?> flex flex-col items-center gap-1">
            <i class="fa-solid fa-phone text-xl"></i>
            <span class="text-xs"><?php _e('Contact', 'codevani'); ?></span>
        </a>
    </div>
</nav>

<script>
// Mobile menu functionality
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');
    const mobileMenuClose = document.querySelector('.mobile-menu-close');
    
    if (mobileMenuToggle && mobileMenuOverlay && mobileMenuClose) {
        mobileMenuToggle.addEventListener('click', function() {
            mobileMenuOverlay.classList.remove('hidden');
        });
        
        mobileMenuClose.addEventListener('click', function() {
            mobileMenuOverlay.classList.add('hidden');
        });
        
        mobileMenuOverlay.addEventListener('click', function(e) {
            if (e.target === mobileMenuOverlay) {
                mobileMenuOverlay.classList.add('hidden');
            }
        });
    }
    
    // Bottom navigation active state
    const navItems = document.querySelectorAll(".nav-item");
    const sections = document.querySelectorAll("section");

    window.addEventListener("scroll", () => {
        let current = "";
        sections.forEach((section) => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (pageYOffset >= sectionTop - 200) {
                current = section.getAttribute("id");
            }
        });

        navItems.forEach((item) => {
            item.classList.remove("active");
            if (item.getAttribute("href") === `#${current}`) {
                item.classList.add("active");
            }
        });
    });

    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute("href"));
            if (target) {
                target.scrollIntoView({
                    behavior: "smooth",
                    block: "start",
                });
            }
        });
    });
});
</script>

<?php wp_footer(); ?>

</body>
</html>
