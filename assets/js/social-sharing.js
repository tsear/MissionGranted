/**
 * Social Sharing Component
 * @package MissionGranted
 */

export const SocialSharing = {
  /**
   * Initialize social sharing buttons
   */
  init() {
    const copyButtons = document.querySelectorAll('[data-share="copy"]');
    copyButtons.forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        this.copyLink(btn);
      });
    });
  },

  /**
   * Copy link to clipboard
   * @param {HTMLElement} button
   */
  async copyLink(button) {
    const url = button.dataset.url || window.location.href;
    
    try {
      await navigator.clipboard.writeText(url);
      
      // Show success feedback
      button.classList.add('copied');
      this.showCopySuccess();
      
      // Reset button after 2 seconds
      setTimeout(() => {
        button.classList.remove('copied');
      }, 2000);
    } catch (err) {
      console.error('Failed to copy:', err);
      // Fallback for older browsers
      this.fallbackCopy(url);
    }
  },

  /**
   * Fallback copy method for older browsers
   * @param {string} text
   */
  fallbackCopy(text) {
    const textarea = document.createElement('textarea');
    textarea.value = text;
    textarea.style.position = 'fixed';
    textarea.style.opacity = '0';
    document.body.appendChild(textarea);
    textarea.select();
    
    try {
      document.execCommand('copy');
      this.showCopySuccess();
    } catch (err) {
      console.error('Fallback copy failed:', err);
    }
    
    document.body.removeChild(textarea);
  },

  /**
   * Show copy success message
   */
  showCopySuccess() {
    // Remove existing message if any
    const existing = document.querySelector('.copy-success');
    if (existing) existing.remove();
    
    // Create success message
    const message = document.createElement('div');
    message.className = 'copy-success';
    message.textContent = 'Link copied to clipboard!';
    document.body.appendChild(message);
    
    // Remove after 3 seconds
    setTimeout(() => {
      message.classList.add('fade-out');
      setTimeout(() => message.remove(), 300);
    }, 3000);
  },

  /**
   * Get share URL for a platform
   * @param {string} platform
   * @param {string} url
   * @param {string} title
   * @returns {string}
   */
  getShareUrl(platform, url, title) {
    const encodedUrl = encodeURIComponent(url);
    const encodedTitle = encodeURIComponent(title);
    
    const urls = {
      twitter: `https://twitter.com/intent/tweet?url=${encodedUrl}&text=${encodedTitle}`,
      facebook: `https://www.facebook.com/sharer/sharer.php?u=${encodedUrl}`,
      linkedin: `https://www.linkedin.com/sharing/share-offsite/?url=${encodedUrl}`,
      email: `mailto:?subject=${encodedTitle}&body=${encodedUrl}`
    };
    
    return urls[platform] || url;
  }
};

// Initialize on page load
document.addEventListener('DOMContentLoaded', () => {
  SocialSharing.init();
});
