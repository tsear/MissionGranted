# Build Pipeline Documentation

## � Quick Start for Team Members

### First-Time Setup

1. **Install Node.js** (if not already installed):

   **macOS:**
   ```bash
   brew install node
   ```

   **Windows (PowerShell):**
   ```powershell
   winget install OpenJS.NodeJS.LTS
   ```

   **Linux (Ubuntu/Debian):**
   ```bash
   curl -fsSL https://deb.nodesource.com/setup_lts.x | sudo -bash -
   sudo apt-get install -y nodejs
   ```

2. **Clone the repository and set up the theme:**
   ```bash
   # Navigate to theme directory
   cd path/to/MissionGranted
   
   # Install dependencies
   npm install
   
   # Build theme assets
   npm run build
   
   # Set up git hooks (automates future builds)
   git config core.hooksPath .githooks
   chmod +x .githooks/post-merge
   ```

### Updating the Theme

Once git hooks are configured, simply run:

```bash
git pull
```

The post-merge hook will automatically:
- Install/update dependencies (`npm install`)
- Rebuild theme assets (`npm run build`)

## �🛠️ Build Tools

The Mission Granted theme uses a modern build pipeline with:

- **Sass/SCSS** - CSS preprocessing with 7-1 architecture
- **Rollup** - JavaScript module bundling and optimization
- **Vite** - Development server with hot module replacement (HMR)

## 📦 Installed Dependencies

### Development Dependencies

```json
{
  "@rollup/plugin-commonjs": "^29.0.0",      // CommonJS module support
  "@rollup/plugin-node-resolve": "^16.0.3",  // Node module resolution
  "@rollup/plugin-terser": "^0.4.4",         // JavaScript minification
  "rollup": "^4.53.5",                       // JS bundler
  "sass": "^1.69.0",                         // SCSS compiler
  "vite": "^7.3.0",                          // Dev server & build tool
  "vite-plugin-live-reload": "^3.0.5"        // Live reload for PHP files
}
```

## 🚀 Build Commands

### Production Build

Build optimized assets for production:

```bash
npm run build
```

This runs:
1. `build:css` - Compiles and minifies SCSS to CSS
2. `build:js` - Bundles and minifies JavaScript with Rollup

### Individual Build Commands

```bash
# Build CSS only (compressed, no source maps)
npm run build:css

# Build JavaScript only (bundled and minified)
npm run build:js
```

### Development Mode

#### Watch Mode (Recommended for Development)

Watch and auto-compile on file changes:

```bash
# Watch CSS only
npm run watch:css

# Watch JavaScript only
npm run watch:js
```

#### Vite Development Server

Start Vite dev server with HMR:

```bash
npm run dev
```

Features:
- Hot Module Replacement (HMR)
- Live reload for PHP files
- Runs on `http://localhost:3000`
- Auto-refresh on SCSS/JS changes

### Preview Build

Preview production build locally:

```bash
npm run preview
```

## 📁 Build Output

### CSS Output

- **Source**: `assets/scss/main.scss`
- **Output**: `style.css` (theme root)
- **Production**: Compressed, no source maps
- **Development**: Expanded, with source maps

### JavaScript Output

- **Source**: `assets/js/main.js`
- **Output**: `assets/js/bundle.min.js`
- **Production**: Bundled, minified, tree-shaken
- **Development**: Bundled with source maps

## ⚙️ Configuration Files

### rollup.config.js

Rollup configuration for JavaScript bundling:

```javascript
- Input: assets/js/main.js
- Output: assets/js/bundle.min.js
- Format: IIFE (Immediately Invoked Function Expression)
- Plugins:
  - @rollup/plugin-node-resolve (module resolution)
  - @rollup/plugin-commonjs (CommonJS support)
  - @rollup/plugin-terser (minification)
```

**Features:**
- Tree shaking (removes unused code)
- Console statements removed in production
- Source maps in development
- Watch mode support

### vite.config.js

Vite configuration for development server:

```javascript
- Server Port: 3000
- HMR: WebSocket on localhost
- Live Reload: *.php, *.scss, *.js files
- Path Aliases:
  - @: assets/
  - @scss: assets/scss/
  - @js: assets/js/
```

**Features:**
- SCSS preprocessor integration
- Auto-import variables and mixins
- CORS enabled for WordPress integration
- Manifest generation

## 🔄 Workflow

### Initial Setup

```bash
# Install all dependencies
npm install

# Build production assets
npm run build
```

### During Development

**Option 1: Watch Mode (Simple)**
```bash
# Terminal 1: Watch CSS
npm run watch:css

# Terminal 2: Watch JavaScript
npm run watch:js
```

**Option 2: Vite Dev Server (Advanced)**
```bash
# Start Vite development server
npm run dev
```

Then work on your files:
- Edit SCSS in `assets/scss/`
- Edit JS in `assets/js/main.js`
- Edit PHP templates
- Changes auto-compile and browser auto-refreshes

### Before Deployment

```bash
# Build production assets
npm run build

# Test the build
npm run preview

# Commit changes
git add style.css assets/js/bundle.min.js
git commit -m "Build production assets"
```

## 🎯 Best Practices

### Development

1. **Use Watch Mode** - Auto-compile during development
2. **Keep Source Files** - Never edit compiled files directly
3. **Test Before Deploy** - Always run `npm run build` before deployment
4. **Source Maps** - Use in development for debugging
5. **Hot Reload** - Use Vite dev server for instant feedback

### Production

1. **Minified Assets** - Use `npm run build` for production
2. **No Source Maps** - Production builds exclude source maps
3. **Bundle Size** - Monitor `bundle.min.js` size (keep < 100KB)
4. **Tree Shaking** - Remove unused code automatically
5. **Browser Cache** - Version assets using theme version constant

## 📊 Build Performance

### SCSS Compilation

- **Input Size**: ~30 SCSS files
- **Output Size**: ~50-80KB (minified)
- **Compile Time**: ~1-2 seconds
- **Watch Mode**: < 500ms per change

### JavaScript Bundling

- **Input Size**: 1 main file + dependencies
- **Output Size**: ~10-30KB (minified)
- **Bundle Time**: ~100-200ms
- **Tree Shaking**: Removes unused code

## 🐛 Troubleshooting

### Build Errors

**SCSS Compilation Failed**
```bash
# Check for syntax errors
npm run sass:dev

# View full error output
npm run build:css -- --verbose
```

**Rollup Bundle Failed**
```bash
# Check for JS errors
npm run build:js -- --watch

# View detailed output
DEBUG=* npm run build:js
```

### Watch Mode Not Working

```bash
# Restart watch processes
# Kill existing processes
pkill -f "sass --watch"
pkill -f "rollup -w"

# Restart watch
npm run watch:css
npm run watch:js
```

### Vite Server Issues

```bash
# Clear Vite cache
rm -rf node_modules/.vite

# Restart server
npm run dev
```

### Dependencies Issues

```bash
# Clean install
rm -rf node_modules package-lock.json
npm install

# Update dependencies
npm update

# Check for vulnerabilities
npm audit
```

## 🔧 Customization

### Adding New JavaScript Files

1. Create new JS file in `assets/js/modules/`
2. Import in `assets/js/main.js`:
   ```javascript
   import './modules/my-module.js';
   ```
3. Rollup will automatically bundle it

### Adding Third-Party Libraries

```bash
# Install library
npm install library-name

# Import in main.js
import libraryName from 'library-name';
```

### Modifying Build Output

Edit `rollup.config.js`:
```javascript
output: {
  file: 'assets/js/custom-name.js',  // Change output name
  format: 'esm',                      // Change format (iife, esm, cjs)
  sourcemap: true                     // Always include source maps
}
```

### Adjusting SCSS Output

Edit `package.json` scripts:
```json
"build:css": "sass assets/scss/main.scss:custom-location.css --style expanded"
```

## 📈 Performance Optimization

### CSS Optimization

- **Minification**: Automatically applied in production
- **Dead Code Elimination**: Remove unused styles manually
- **Critical CSS**: Consider extracting above-the-fold styles
- **Purge CSS**: Consider PurgeCSS for unused class removal

### JavaScript Optimization

- **Code Splitting**: Split large bundles (configure in Rollup)
- **Lazy Loading**: Defer non-critical scripts
- **Tree Shaking**: Automatic with Rollup
- **Compression**: Consider Brotli/Gzip server-side

## 🔐 Security

### Development

- Keep dependencies updated: `npm update`
- Check for vulnerabilities: `npm audit`
- Fix security issues: `npm audit fix`

### Production

- Never commit `node_modules/`
- Version lock with `package-lock.json`
- Review dependency changes before updating
- Use `.gitignore` to exclude build artifacts

## 📚 Resources

- [Sass Documentation](https://sass-lang.com/documentation)
- [Rollup Documentation](https://rollupjs.org/)
- [Vite Documentation](https://vitejs.dev/)
- [NPM Scripts Guide](https://docs.npmjs.com/cli/v8/using-npm/scripts)

---

**Last Updated**: December 16, 2025  
**Build Version**: 1.0.0  
**Node Version**: 14+ required
