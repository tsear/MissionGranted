import { createRoot } from 'react-dom/client';
import Aurora from './Aurora';

export function initAurora() {
  const root = document.getElementById('hero-aurora-root');
  if (!root) return;

  const reactRoot = createRoot(root);
  reactRoot.render(
    <Aurora
      colorStops={["#d81259", "#FFBC41", "#016BA6"]}
      blend={1.0}
      amplitude={0.5}
      speed={0.3}
    />
  );
}
