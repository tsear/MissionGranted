# MissionGranted WordPress Theme

Modern WordPress theme for MissionGranted - powering grant-funded finances with React components and WebGL animations.

## 🎨 Features

### React Integration
- **CardNav Component**: Animated navigation with GSAP-powered dropdown cards
- **Aurora Background**: WebGL shader-based animated gradient using OGL library
- Full React 18 with modern hooks (useState, useRef, useEffect)

### Design
- **Aurora Gradient**: Animated WebGL background with brand colors (pink, yellow, blue)
- **Glassmorphic Hero**: Transparent card with backdrop blur effects
- **3D Buttons**: Layered shadows with transform animations
- **Fixed Navigation**: Sticky nav bar at top of viewport

### Build System
- **Rollup**: JavaScript bundler with React/JSX support
- **Sass**: 7-1 architecture with compressed output
- **Babel**: JSX transformation with automatic runtime
- **PostCSS**: CSS injection into bundle

## 🚀 Quick Start

### Prerequisites
- Node.js 16+
- WordPress 6.0+
- npm or yarn

### Installation

```bash
# Clone repository
git clone https://github.com/tsear/MissionGranted.git
cd MissionGranted

# Install dependencies
npm install

# Build assets
npm run build

# Development
npm run build:css  # Compile Sass
npm run build:js   # Bundle React components
```

### WordPress Setup
1. Upload theme to `/wp-content/themes/MissionGranted/`
2. Activate theme in WordPress admin
3. Theme auto-enqueues compiled bundles

## 📦 Dependencies

### Production
- `gsap` - Animation library for CardNav
- `ogl` - WebGL library for Aurora shader
- `react` + `react-dom` - UI library
- `react-icons` - Icon components (GoArrowUpRight)

### Development
- `rollup` - JavaScript bundler
- `@rollup/plugin-babel` - JSX transformation
- `rollup-plugin-postcss` - CSS bundling
- `sass` - CSS preprocessor
- `@babel/preset-react` - React JSX support

## 🎯 Key Components

### CardNav (`assets/js/components/CardNav.jsx`)
Animated navigation with dropdown cards:
- 4 navigation items: Home, Solutions, Resources, Contact
- GSAP timeline animations for smooth expand/collapse
- Responsive hamburger menu
- Dynamic height calculation
- Logo: `MissionGranted small.png` (50px height)

**Configuration** (`initCardNav.js`):
```javascript
{
  label: "Home",
  href: "/",
  bgColor: "#016BA6",
  textColor: "#fff",
  links: [
    { text: "Customers", url: "/customers" },
    { text: "About MissionGranted", url: "/about" },
    { text: "About Smart Grant Solutions", url: "https://smartgrantsolutions.com/" }
  ]
}
```

### Aurora (`assets/js/components/Aurora.jsx`)
WebGL shader background with animated gradient:
- Custom fragment shader with simplex noise
- 3 color stops: `#d81259`, `#FFBC41`, `#016BA6`
- Configurable amplitude (0.5), blend (1.0), speed (0.3)
- Opacity: 0.65 for subtle effect
- OGL renderer with transparency and blending

**Shader features:**
- Perlin noise wave animation
- Color ramp interpolation
- Smooth alpha blending
- Responsive canvas sizing

## 🎨 Styling

### Color Variables
```scss
$color-primary: #0066CC;           // Primary blue
$color-brand-pink: #d81259;        // SGS Brand Pink
$color-brand-yellow: #FFBC41;      // SGS Brand Yellow
$color-brand-blue: #016BA6;        // SGS Brand Blue
```

### Hero Section
- Transparent background with Aurora underneath
- Glassmorphic card: `rgba(255, 255, 255, 0.15)` with `backdrop-filter: blur(10px)`
- Primary blue text color
- Responsive title: `clamp(1.75rem, 4.5vw, 3rem)`
- Forced line break: "Grant-Funded Finances," / "Simplified."

### Buttons
- Transparent with primary blue border and text
- Hover: Fill with blue background, white text
- 3D shadow effects with transform animations
- No text-shadow for clean appearance

## 📁 Project Structure

```
MissionGranted/
├── assets/
│   ├── images/          # Logo and images
│   ├── js/
│   │   ├── components/  # React components
│   │   │   ├── Aurora.jsx
│   │   │   ├── Aurora.css
│   │   │   ├── CardNav.jsx
│   │   │   ├── CardNav.css
│   │   │   ├── initAurora.js
│   │   │   └── initCardNav.js
│   │   ├── main.js      # Entry point
│   │   └── bundle.min.js # Built output
│   └── scss/
│       ├── abstracts/   # Variables, mixins, functions
│       ├── base/        # Reset, typography, utilities
│       ├── components/  # Buttons, etc.
│       ├── layout/      # Header, footer, grid
│       ├── pages/       # Page-specific styles
│       └── main.scss    # Main orchestration
├── template-parts/      # PHP template partials
├── functions.php        # Theme setup and enqueues
├── header.php          # Contains #card-nav-root mount
├── rollup.config.js    # React bundler config
└── package.json        # Dependencies
```

## 🛠️ Development

### Build Commands
```bash
npm run build        # Build both CSS and JS
npm run build:css    # Sass only
npm run build:js     # Rollup only
```

### File Watching
For active development, run builds in separate terminals:
```bash
# Terminal 1 - Watch Sass
npm run build:css -- --watch

# Terminal 2 - Watch Rollup  
npm run build:js -- --watch
```

### Adding Components
1. Create component in `assets/js/components/`
2. Create initialization file (e.g., `initComponent.js`)
3. Import and call in `main.js`
4. Add mount point in PHP template
5. Build with `npm run build`

## 📄 Page Templates

- `template-home.php` - Homepage with hero + Aurora
- `template-solutions.php` - Solutions showcase (renamed from Features)
- `template-pricing.php` - Pricing tiers
- `template-about.php` - About/team page
- `template-contact.php` - Contact form

## 🤝 Contributing

This is a proprietary theme for MissionGranted/Smart Grant Solutions.

## 📧 Contact

- **Email**: support@smartgrantsolutions.com
- **Website**: https://smartgrantsolutions.com
- **GitHub**: https://github.com/tsear/MissionGranted

## 📝 License

Proprietary - All rights reserved by Smart Grant Solutions

## License

This theme is licensed under the GNU General Public License v2 or later.
License URI: http://www.gnu.org/licenses/gpl-2.0.html

## Changelog

### Version 1.0.0
- Initial release
- Core theme functionality
- Custom post types
- Page templates
- Responsive design
- Customizer options

---

© 2025 Smart Grant Solutions. All rights reserved.
