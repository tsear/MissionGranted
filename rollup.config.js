import resolve from '@rollup/plugin-node-resolve';
import commonjs from '@rollup/plugin-commonjs';
import terser from '@rollup/plugin-terser';
import babel from '@rollup/plugin-babel';
import replace from '@rollup/plugin-replace';
import postcss from 'rollup-plugin-postcss';

const production = !process.env.ROLLUP_WATCH;

export default {
  input: 'assets/js/main.js',
  output: {
    file: 'assets/js/bundle.min.js',
    format: 'iife',
    sourcemap: !production,
    name: 'MissionGranted',
    globals: {
      react: 'React',
      'react-dom': 'ReactDOM'
    }
  },
  plugins: [
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
  ],
  watch: {
    clearScreen: false
  }
};
