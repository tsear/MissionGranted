import { createRoot } from 'react-dom/client';
import FeaturesGrid from './FeaturesGrid';

export function initFeaturesGrid() {
  const root = document.getElementById('features-grid-root');
  if (!root) return;

  const reactRoot = createRoot(root);
  reactRoot.render(<FeaturesGrid />);
}
