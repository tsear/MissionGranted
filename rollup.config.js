import resolve from '@rollup/plugin-node-resolve';
import commonjs from '@rollup/plugin-commonjs';
import terser from '@rollup/plugin-terser';
import babel from '@rollup/plugin-babel';
import replace from '@rollup/plugin-replace';
import postcss from 'rollup-plugin-postcss';

const production = !process.env.ROLLUP_WATCH;

// Shared plugin configuration
const sharedPlugins = [
  postcss({
    extract: false,
    minimize: production,
    inject: true
  }),
  replace({
    'process.env.NODE_ENV': JSON.stringify(production ? 'production' : 'development'),
    preventAssignment: true
  }),
  resolve({
    browser: true,
    extensions: ['.js', '.jsx']
  }),
  babel({
    babelHelpers: 'bundled',
    exclude: 'node_modules/**',
    presets: [
      ['@babel/preset-env', { targets: { browsers: ['> 0.25%', 'not dead'] } }],
      ['@babel/preset-react', { runtime: 'automatic' }]
    ],
    extensions: ['.js', '.jsx']
  }),
  commonjs(),
  production && terser({
    format: {
      comments: false
    },
    compress: {
      drop_console: true
    }
  })
];

// Export multiple bundles
export default [
  // CardNav Bundle - Loaded on ALL pages
  {
    input: 'assets/js/cardnav-main.js',
    output: {
      file: 'assets/js/bundle-cardnav.min.js',
      format: 'iife',
      sourcemap: !production,
      name: 'MissionGrantedNav',
      globals: {
        react: 'React',
        'react-dom': 'ReactDOM'
      }
    },
    plugins: sharedPlugins,
    watch: {
      clearScreen: false
    }
  },
  
  // Homepage Bundle - Loaded ONLY on homepage
  {
    input: 'assets/js/homepage-main.js',
    output: {
      file: 'assets/js/bundle-homepage.min.js',
      format: 'iife',
      sourcemap: !production,
      name: 'MissionGrantedHome',
      globals: {
        react: 'React',
        'react-dom': 'ReactDOM'
      }
    },
    plugins: sharedPlugins,
    watch: {
      clearScreen: false
    }
  }
];
