import { createRoot } from 'react-dom/client';
import ProductVideo from './ProductVideo';

export function initProductVideo() {
  const root = document.getElementById('product-video-root');
  if (!root) return;

  const themeUrl = window.missionGrantedData?.themeUrl || '';

  const reactRoot = createRoot(root);
  reactRoot.render(
    <ProductVideo
      mp4Src={`${themeUrl}/assets/videos/Automation Over Spreadsheets.mp4`}
      webmSrc={`${themeUrl}/assets/videos/Automation Over Spreadsheets.webm`}
    />
  );
}
