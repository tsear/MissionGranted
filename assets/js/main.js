/**
 * Mission Granted Theme - Main JavaScript
 *
 * @package MissionGranted
 * @since 1.0.0
 */

import { initCardNav } from './components/initCardNav.js';
import { initAurora } from './components/initAurora.js';
import { initProductVideo } from './components/initProductVideo.js';
import { initFeaturesGrid } from './components/initFeaturesGrid.js';
import { initTestimonial } from './components/initTestimonial.js';
import { initContentWithImage } from './components/initContentWithImage.js';

// Import utilities (auto-initializes on DOMContentLoaded)
import './utilities.js';
import './social-sharing.js';

// Initialize CardNav
initCardNav();

// Initialize Aurora background
initAurora();

// Initialize Product Video
initProductVideo();

// Initialize Features Grid
initFeaturesGrid();

// Initialize Testimonial
initTestimonial();

// Initialize Content With Image
initContentWithImage();
