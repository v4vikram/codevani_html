# Codevani WordPress Theme

A modern, responsive WordPress theme converted from the Codevani HTML template. This theme is designed for web development agencies, freelancers, and businesses looking for a professional online presence.

## Features

### 🎨 Design & Layout
- **Modern Dark Theme**: Sleek black background with gradient accents
- **Responsive Design**: Fully responsive across all devices
- **Glass Effect UI**: Modern glassmorphism design elements
- **Gradient Text Effects**: Eye-catching gradient text animations
- **Custom Animations**: Smooth hover effects and transitions

### 📱 Mobile-First Approach
- **Bottom Navigation**: Mobile-friendly bottom navigation bar
- **Touch-Friendly**: Optimized for touch interactions
- **Fast Loading**: Optimized for mobile performance

### 🛠️ WordPress Features
- **Custom Post Types**: Portfolio, Team, Services, Testimonials
- **Custom Taxonomies**: Portfolio categories, Service categories
- **Widget Areas**: Sidebar and footer widget areas
- **Customizer Support**: Theme customization options
- **SEO Optimized**: Built-in SEO features and schema markup
- **Translation Ready**: Full internationalization support

### 🎯 Custom Post Types

#### Portfolio
- Project URL, client name, project date
- Technologies used, key features
- Project statistics, gallery images
- Custom categories for organization

#### Team Members
- Position, social media links
- LinkedIn, Twitter, GitHub profiles
- Professional headshots and bios

#### Services
- Pricing information, duration
- Service features and descriptions
- Service categories for organization

#### Testimonials
- Client information and ratings
- Company details and positions
- Star rating system

### 🎨 Customization Options

#### Theme Customizer
- Logo upload
- Contact information
- Social media links
- Color schemes
- Typography options

#### Widget Areas
- Sidebar widgets
- Footer widget areas (4 columns)
- Custom widget styling

## Installation

1. **Upload Theme Files**
   ```bash
   # Upload the theme folder to your WordPress themes directory
   wp-content/themes/codevani-wp-theme/
   ```

2. **Activate Theme**
   - Go to WordPress Admin → Appearance → Themes
   - Click "Activate" on the Codevani theme

3. **Configure Settings**
   - Go to Appearance → Customize
   - Set up your logo, contact info, and social links
   - Configure widget areas

## Theme Structure

```
codevani-wp-theme/
├── style.css                 # Main stylesheet with theme header
├── index.php                 # Homepage template
├── header.php                # Header template
├── footer.php                # Footer template
├── functions.php             # Theme functions and setup
├── page-about.php            # About page template
├── page-blog.php             # Blog page template
├── page-contact.php          # Contact page template
├── single.php                # Single post template
├── single-portfolio.php      # Single portfolio template
├── archive-portfolio.php     # Portfolio archive template
├── inc/
│   └── custom-post-types.php # Custom post types and taxonomies
├── assets/
│   ├── css/
│   │   └── app.css          # Custom CSS styles
│   ├── js/
│   │   └── app.js           # Custom JavaScript
│   └── img/                 # Theme images
└── template-parts/           # Reusable template parts
```

## Customization

### Adding Custom Content

#### Portfolio Items
1. Go to Portfolio → Add New
2. Add title, description, and featured image
3. Fill in portfolio details (URL, client, technologies, etc.)
4. Assign to portfolio categories

#### Team Members
1. Go to Team → Add New
2. Add member name, position, and bio
3. Upload profile photo
4. Add social media links

#### Services
1. Go to Services → Add New
2. Add service title and description
3. Set pricing and duration
4. List key features

#### Testimonials
1. Go to Testimonials → Add New
2. Add client testimonial
3. Include client details and rating
4. Upload client photo (optional)

### Customizing Colors and Styles

The theme uses CSS custom properties for easy color customization:

```css
:root {
    --primary-color: #fbbf77;
    --secondary-color: #c084fc;
    --accent-color: #a78bfa;
}
```

### Adding Custom CSS

Use the WordPress Customizer or add custom CSS to `assets/css/app.css`.

## Page Templates

### Homepage (index.php)
- Hero section with statistics
- Services showcase
- Portfolio highlights
- Tech stack display
- Development process
- Testimonials
- FAQ section
- Contact form

### About Page (page-about.php)
- Company story and values
- Team member showcase
- Statistics and achievements
- Call-to-action sections

### Blog Page (page-blog.php)
- Featured article
- Recent posts grid
- Category filtering
- Search functionality
- Newsletter signup

### Contact Page (page-contact.php)
- Contact information
- Contact form with validation
- FAQ section
- Social media links
- Map integration (optional)

### Portfolio Archive (archive-portfolio.php)
- Portfolio grid with filtering
- Category-based filtering
- Project details and links
- Call-to-action sections

## SEO Features

- **Schema Markup**: Rich snippets for better search visibility
- **Meta Tags**: Optimized meta descriptions and keywords
- **Open Graph**: Social media sharing optimization
- **Sitemap Integration**: Automatic sitemap generation
- **Fast Loading**: Optimized for Core Web Vitals

## Performance Optimizations

- **Minified Assets**: Compressed CSS and JavaScript
- **Image Optimization**: Responsive image sizes
- **Lazy Loading**: Images load as needed
- **Caching Ready**: Compatible with caching plugins
- **CDN Support**: Ready for CDN integration

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- MySQL 5.6 or higher

## Support

For theme support and customization requests, please contact:
- Email: hello@codevani.com
- Website: https://codevani.com

## Changelog

### Version 1.0.0
- Initial release
- Complete WordPress theme conversion
- Custom post types and taxonomies
- Responsive design implementation
- SEO optimization
- Performance enhancements

## License

This theme is licensed under the GPL v2 or later.

## Credits

- **Design**: Codevani Team
- **Development**: Codevani Development Team
- **Icons**: Font Awesome
- **Framework**: Tailwind CSS
- **JavaScript**: jQuery

---

**Codevani WordPress Theme** - Transform your digital presence with modern, responsive design and powerful WordPress functionality.
