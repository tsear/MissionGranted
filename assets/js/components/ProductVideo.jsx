import { useEffect, useRef } from 'react';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

import './ProductVideo.css';

gsap.registerPlugin(ScrollTrigger);

export default function ProductVideo({ mp4Src, webmSrc }) {
  const videoRef = useRef(null);
  const containerRef = useRef(null);

  useEffect(() => {
    const video = videoRef.current;
    const container = containerRef.current;

    if (!video || !container) return;

    let scrollTrigger;

    // Wait for video metadata to load
    const handleLoadedMetadata = () => {
      // Set video to first frame
      video.currentTime = 0;
      video.pause();

      // Create scroll-triggered animation
      scrollTrigger = ScrollTrigger.create({
        trigger: container,
        start: 'top center',
        end: 'bottom center',
        scrub: 1,
        onUpdate: (self) => {
          // Map scroll progress to video timeline
          const progress = self.progress;
          if (video.duration && isFinite(video.duration)) {
            video.currentTime = video.duration * progress;
          }
        },
        onEnter: () => video.play(),
        onEnterBack: () => video.play(),
        onLeave: () => video.pause(),
        onLeaveBack: () => video.pause(),
      });
    };

    if (video.readyState >= 1) {
      // Metadata already loaded
      handleLoadedMetadata();
    } else {
      video.addEventListener('loadedmetadata', handleLoadedMetadata);
    }

    return () => {
      video.removeEventListener('loadedmetadata', handleLoadedMetadata);
      if (scrollTrigger) {
        scrollTrigger.kill();
      }
    };
  }, []);

  return (
    <div ref={containerRef} className="product-video-container">
      <div className="product-video-wrapper">
        <video
          ref={videoRef}
          className="product-video"
          muted
          playsInline
          preload="auto"
        >
          <source src={webmSrc} type="video/webm" />
          <source src={mp4Src} type="video/mp4" />
        </video>
      </div>
    </div>
  );
}
