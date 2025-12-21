import { createRoot } from 'react-dom/client';
import Testimonial from './Testimonial';

export function initTestimonial() {
  const root = document.getElementById('testimonial-root');
  if (!root) return;

  const reactRoot = createRoot(root);
  reactRoot.render(<Testimonial />);
}
