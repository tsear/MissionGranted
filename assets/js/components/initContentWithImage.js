import { createRoot } from 'react-dom/client';
import ContentWithImage from './ContentWithImage';

export function initContentWithImage() {
  const root = document.getElementById('content-with-image-root');
  if (!root) return;

  const reactRoot = createRoot(root);
  reactRoot.render(<ContentWithImage />);
}
