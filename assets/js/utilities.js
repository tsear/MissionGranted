/**
 * Loading States and Error Handling Utilities
 * @package MissionGranted
 */

// ============================================================================
// Loading State Management
// ============================================================================

export const LoadingManager = {
  /**
   * Show loading overlay
   */
  showOverlay() {
    let overlay = document.querySelector('.loading-overlay');
    if (!overlay) {
      overlay = document.createElement('div');
      overlay.className = 'loading-overlay';
      overlay.innerHTML = '<div class="loading loading--overlay"></div>';
      document.body.appendChild(overlay);
    }
    requestAnimationFrame(() => overlay.classList.add('active'));
  },

  /**
   * Hide loading overlay
   */
  hideOverlay() {
    const overlay = document.querySelector('.loading-overlay');
    if (overlay) {
      overlay.classList.remove('active');
      setTimeout(() => overlay.remove(), 300);
    }
  },

  /**
   * Add loading state to button
   * @param {HTMLElement} button
   */
  buttonLoading(button) {
    if (button) {
      button.classList.add('is-loading');
      button.disabled = true;
      button.setAttribute('aria-busy', 'true');
    }
  },

  /**
   * Remove loading state from button
   * @param {HTMLElement} button
   */
  buttonLoaded(button) {
    if (button) {
      button.classList.remove('is-loading');
      button.disabled = false;
      button.removeAttribute('aria-busy');
    }
  },

  /**
   * Add loading state to form
   * @param {HTMLFormElement} form
   */
  formLoading(form) {
    if (form) {
      form.classList.add('form-loading');
      form.setAttribute('aria-busy', 'true');
      // Disable all form inputs
      const inputs = form.querySelectorAll('input, textarea, select, button');
      inputs.forEach(input => input.disabled = true);
    }
  },

  /**
   * Remove loading state from form
   * @param {HTMLFormElement} form
   */
  formLoaded(form) {
    if (form) {
      form.classList.remove('form-loading');
      form.removeAttribute('aria-busy');
      // Re-enable all form inputs
      const inputs = form.querySelectorAll('input, textarea, select, button');
      inputs.forEach(input => input.disabled = false);
    }
  }
};

// ============================================================================
// Skeleton Screen Utilities
// ============================================================================

export const SkeletonLoader = {
  /**
   * Create skeleton card
   * @returns {HTMLElement}
   */
  createCard() {
    const card = document.createElement('div');
    card.className = 'skeleton-card';
    card.innerHTML = `
      <div class="skeleton-card__image"></div>
      <div class="skeleton-card__title"></div>
      <div class="skeleton-card__text"></div>
      <div class="skeleton-card__text"></div>
      <div class="skeleton-card__text"></div>
    `;
    return card;
  },

  /**
   * Show skeleton grid
   * @param {HTMLElement} container
   * @param {number} count
   */
  showGrid(container, count = 3) {
    if (!container) return;
    
    container.innerHTML = '';
    const grid = document.createElement('div');
    grid.className = 'skeleton-grid';
    
    for (let i = 0; i < count; i++) {
      grid.appendChild(this.createCard());
    }
    
    container.appendChild(grid);
  },

  /**
   * Remove skeleton loaders
   * @param {HTMLElement} container
   */
  hide(container) {
    if (container) {
      const skeletons = container.querySelectorAll('.skeleton-grid, .skeleton-card');
      skeletons.forEach(skeleton => skeleton.remove());
    }
  }
};

// ============================================================================
// Image Error Handling
// ============================================================================

export const ImageErrorHandler = {
  /**
   * Initialize image error handling
   */
  init() {
    // Handle broken images
    document.addEventListener('error', (e) => {
      if (e.target.tagName === 'IMG') {
        this.handleBrokenImage(e.target);
      }
    }, true);

    // Lazy load images
    if ('IntersectionObserver' in window) {
      this.initLazyLoading();
    }
  },

  /**
   * Handle broken image
   * @param {HTMLImageElement} img
   */
  handleBrokenImage(img) {
    const parent = img.parentElement;
    
    // Prevent infinite loop
    if (img.dataset.errorHandled) return;
    img.dataset.errorHandled = 'true';
    
    // Create fallback element
    const fallback = document.createElement('div');
    fallback.className = 'image-error';
    fallback.innerHTML = `
      <div>
        <div class="image-error__icon">📷</div>
        <div class="image-error__text">${img.alt || 'Image not available'}</div>
      </div>
    `;
    
    // Replace image with fallback
    if (parent) {
      parent.replaceChild(fallback, img);
    }
  },

  /**
   * Initialize lazy loading for images
   */
  initLazyLoading() {
    const images = document.querySelectorAll('img[data-src], img[loading="lazy"]');
    
    const imageObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          
          // Show loading state
          img.parentElement?.classList.add('is-loading');
          
          // Load image
          const src = img.dataset.src || img.src;
          img.src = src;
          
          img.onload = () => {
            img.classList.add('loaded');
            img.parentElement?.classList.remove('is-loading');
          };
          
          img.onerror = () => {
            this.handleBrokenImage(img);
          };
          
          observer.unobserve(img);
        }
      });
    });
    
    images.forEach(img => imageObserver.observe(img));
  }
};

// ============================================================================
// Form Validation & Error States
// ============================================================================

export const FormValidator = {
  /**
   * Initialize form validation
   * @param {HTMLFormElement} form
   */
  init(form) {
    if (!form) return;
    
    const inputs = form.querySelectorAll('input, textarea, select');
    
    inputs.forEach(input => {
      // Validate on blur
      input.addEventListener('blur', () => this.validateField(input));
      
      // Clear error on input
      input.addEventListener('input', () => this.clearFieldError(input));
    });
    
    // Validate on submit
    form.addEventListener('submit', (e) => {
      if (!this.validateForm(form)) {
        e.preventDefault();
        this.focusFirstError(form);
      }
    });
  },

  /**
   * Validate single field
   * @param {HTMLInputElement} field
   * @returns {boolean}
   */
  validateField(field) {
    const wrapper = field.closest('.form-field') || field.parentElement;
    let isValid = true;
    let errorMessage = '';
    
    // Check required
    if (field.hasAttribute('required') && !field.value.trim()) {
      isValid = false;
      errorMessage = 'This field is required';
    }
    
    // Check email
    if (field.type === 'email' && field.value) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(field.value)) {
        isValid = false;
        errorMessage = 'Please enter a valid email address';
      }
    }
    
    // Check URL
    if (field.type === 'url' && field.value) {
      try {
        new URL(field.value);
      } catch {
        isValid = false;
        errorMessage = 'Please enter a valid URL';
      }
    }
    
    // Check pattern
    if (field.pattern && field.value) {
      const regex = new RegExp(field.pattern);
      if (!regex.test(field.value)) {
        isValid = false;
        errorMessage = field.title || 'Please match the requested format';
      }
    }
    
    // Check minlength
    if (field.minLength > 0 && field.value.length < field.minLength && field.value) {
      isValid = false;
      errorMessage = `Minimum length is ${field.minLength} characters`;
    }
    
    // Update field state
    if (isValid) {
      this.clearFieldError(field);
      field.classList.add('valid');
      field.classList.remove('invalid', 'error');
      wrapper?.classList.remove('has-error');
      wrapper?.classList.add('has-success');
    } else {
      this.showFieldError(field, errorMessage);
      field.classList.add('invalid', 'error');
      field.classList.remove('valid');
      wrapper?.classList.add('has-error');
      wrapper?.classList.remove('has-success');
    }
    
    return isValid;
  },

  /**
   * Show field error
   * @param {HTMLInputElement} field
   * @param {string} message
   */
  showFieldError(field, message) {
    this.clearFieldError(field);
    
    const error = document.createElement('span');
    error.className = 'form-error';
    error.textContent = message;
    error.id = `${field.id || field.name}-error`;
    
    field.setAttribute('aria-invalid', 'true');
    field.setAttribute('aria-describedby', error.id);
    
    field.parentNode.insertBefore(error, field.nextSibling);
  },

  /**
   * Clear field error
   * @param {HTMLInputElement} field
   */
  clearFieldError(field) {
    const error = field.parentNode.querySelector('.form-error');
    if (error) error.remove();
    
    field.removeAttribute('aria-invalid');
    field.removeAttribute('aria-describedby');
  },

  /**
   * Validate entire form
   * @param {HTMLFormElement} form
   * @returns {boolean}
   */
  validateForm(form) {
    const inputs = form.querySelectorAll('input, textarea, select');
    let isValid = true;
    
    inputs.forEach(input => {
      if (!this.validateField(input)) {
        isValid = false;
      }
    });
    
    return isValid;
  },

  /**
   * Focus first error field
   * @param {HTMLFormElement} form
   */
  focusFirstError(form) {
    const firstError = form.querySelector('.invalid, .error');
    if (firstError) {
      firstError.focus();
      firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
  },

  /**
   * Show form success message
   * @param {HTMLFormElement} form
   * @param {string} message
   */
  showSuccess(form, message) {
    const alert = document.createElement('div');
    alert.className = 'alert alert--success';
    alert.innerHTML = `
      <svg class="alert__icon" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
      </svg>
      <div class="alert__content">
        <div class="alert__message">${message}</div>
      </div>
    `;
    
    form.insertBefore(alert, form.firstChild);
    
    // Auto remove after 5 seconds
    setTimeout(() => alert.remove(), 5000);
  },

  /**
   * Show form error message
   * @param {HTMLFormElement} form
   * @param {string} message
   */
  showError(form, message) {
    const alert = document.createElement('div');
    alert.className = 'alert alert--error';
    alert.innerHTML = `
      <svg class="alert__icon" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
      </svg>
      <div class="alert__content">
        <div class="alert__message">${message}</div>
      </div>
    `;
    
    form.insertBefore(alert, form.firstChild);
    
    // Scroll to error
    alert.scrollIntoView({ behavior: 'smooth', block: 'center' });
  }
};

// ============================================================================
// Network Error Handler
// ============================================================================

export const NetworkError = {
  /**
   * Show network error banner
   */
  show() {
    let banner = document.querySelector('.network-error');
    if (!banner) {
      banner = document.createElement('div');
      banner.className = 'network-error';
      banner.innerHTML = `
        <span class="network-error__message">No internet connection</span>
        <button class="network-error__retry" onclick="location.reload()">Retry</button>
      `;
      document.body.appendChild(banner);
    }
    requestAnimationFrame(() => banner.classList.add('active'));
  },

  /**
   * Hide network error banner
   */
  hide() {
    const banner = document.querySelector('.network-error');
    if (banner) {
      banner.classList.remove('active');
      setTimeout(() => banner.remove(), 300);
    }
  },

  /**
   * Initialize network monitoring
   */
  init() {
    window.addEventListener('online', () => this.hide());
    window.addEventListener('offline', () => this.show());
  }
};

// ============================================================================
// Initialize Everything
// ============================================================================

/**
 * AJAX Form Handler
 */
const AjaxFormHandler = {
  init() {
    const forms = document.querySelectorAll('[data-ajax-form]');
    forms.forEach(form => this.setupForm(form));
  },

  setupForm(form) {
    form.addEventListener('submit', (e) => this.handleSubmit(e, form));
  },

  async handleSubmit(e, form) {
    e.preventDefault();
    
    const formType = form.dataset.ajaxForm;
    const submitBtn = form.querySelector('button[type="submit"]');
    
    // Clear previous errors
    form.querySelectorAll('.form-error, .alert').forEach(el => el.remove());
    form.querySelectorAll('.error, .invalid').forEach(el => {
      el.classList.remove('error', 'invalid');
    });
    
    // Validate form
    if (!FormValidator.validateForm(form)) {
      return;
    }
    
    // Show loading state
    LoadingManager.buttonLoading(submitBtn);
    
    // Prepare form data
    const formData = new FormData(form);
    formData.append('action', formType === 'contact' ? 'contact_form' : 'demo_request');
    formData.append('nonce', window.missionGrantedData?.nonce || '');
    
    try {
      const response = await fetch(window.missionGrantedData?.ajaxurl || '/wp-admin/admin-ajax.php', {
        method: 'POST',
        body: formData
      });
      
      const data = await response.json();
      
      // Remove loading state
      LoadingManager.buttonLoaded(submitBtn);
      
      if (data.success) {
        // Show success message
        FormValidator.showSuccess(form, data.data.message);
        
        // Reset form
        form.reset();
        
        // Scroll to success message
        form.scrollIntoView({ behavior: 'smooth', block: 'center' });
      } else {
        // Show error message
        FormValidator.showError(form, data.data.message || 'An error occurred. Please try again.');
        
        // Show field-specific errors
        if (data.data.errors) {
          Object.keys(data.data.errors).forEach(fieldName => {
            const field = form.querySelector(`[name="${fieldName}"]`);
            if (field) {
              FormValidator.showFieldError(field, data.data.errors[fieldName]);
            }
          });
        }
      }
    } catch (error) {
      console.error('Form submission error:', error);
      LoadingManager.buttonLoaded(submitBtn);
      FormValidator.showError(form, 'Network error. Please check your connection and try again.');
    }
  }
};

document.addEventListener('DOMContentLoaded', () => {
  // Initialize image error handling
  ImageErrorHandler.init();
  
  // Initialize network monitoring
  NetworkError.init();
  
  // Initialize all forms
  const forms = document.querySelectorAll('form');
  forms.forEach(form => FormValidator.init(form));
  
  // Initialize AJAX forms
  AjaxFormHandler.init();
});
