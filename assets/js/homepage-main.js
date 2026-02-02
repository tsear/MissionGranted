/**
 * Homepage Bundle Entry Point
 * Loaded ONLY on homepage for React components and animations
 *
 * @package MissionGranted
 * @since 1.0.0
 */

import { initAurora } from './components/initAurora.js';
import { initProductVideo } from './components/initProductVideo.js';
import { initFeaturesGrid } from './components/initFeaturesGrid.js';
import { initTestimonial } from './components/initTestimonial.js';
import { initContentWithImage } from './components/initContentWithImage.js';

// Import utilities (auto-initializes on DOMContentLoaded)
import './utilities.js';
import './social-sharing.js';

// Initialize homepage-specific components
initAurora();
initProductVideo();
initFeaturesGrid();
initTestimonial();
initContentWithImage();
