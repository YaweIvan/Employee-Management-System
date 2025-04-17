// Add styles once at the beginning
document.head.insertAdjacentHTML('beforeend', `
    <style>
      .hidden { display: none !important; }
      .visible { display: block !important; }
      .visible-flex { display: flex !important; }
      .fade-out { opacity: 0; transition: opacity 0.3s; }
      .fade-in { opacity: 1; transition: opacity 0.3s; }
    </style>
  `);
  
  // Cache DOM elements
  const mainContent = document.getElementById('main-content');
  const formWrapper = document.querySelector('.form-content');
  const notificationPop = document.querySelector('.notification-pop');
  
  // Use event delegation to reduce the number of event listeners
  document.addEventListener('click', (e) => {
    // Password visibility toggle
    const eyeIcon = e.target.closest('.eye');
    if (eyeIcon) {
      const input = eyeIcon.previousElementSibling;
      const icon = eyeIcon.querySelector('i');
      
      if (input) {
        const isPassword = input.type === 'password';
        input.type = isPassword ? 'text' : 'password';
        icon.classList.toggle('bi-eye', !isPassword);
        icon.classList.toggle('bi-eye-slash', isPassword);
      }
      return;
    }
    
    // User profile image upload
    if (e.target.closest('.user')) {
      const imageInput = document.getElementById('imageUpload');
      if (imageInput) imageInput.click();
      return;
    }
    
    // Notification popup toggle
    if (notificationPop) {
      if (e.target.closest('.notify')) {
        notificationPop.classList.toggle('show');
        return;
      }
      
      if (e.target.closest('.notification-pop .close')) {
        notificationPop.classList.remove('show');
        return;
      }
    }
    
    // Back button functionality
    const backButton = e.target.closest('.back');
    if (backButton) {
      // Hide all sections
      document.querySelectorAll('section').forEach(section => {
        section.classList.remove('active');
      });
      
      // Show dashboard section
      const dashboardSection = document.querySelector('.dashboard-section');
      if (dashboardSection) {
        dashboardSection.classList.add('active');
      }
      
      // Update menu active state
      document.querySelectorAll('.aside-menu').forEach(item => {
        item.classList.toggle('active', item.getAttribute('data-section') === 'dashboard');
      });
      return;
    }
  });
  
  // Image upload with lazy instantiation
  const initializeImageUpload = () => {
    const imageInput = document.getElementById('imageUpload');
    if (!imageInput || imageInput.hasAttribute('data-initialized')) return;
    
    imageInput.setAttribute('data-initialized', 'true');
    imageInput.addEventListener('change', function() {
      const file = this.files[0];
      if (!file) return;
      
      const reader = new FileReader();
      const previewImage = document.getElementById('previewImage');
      
      if (previewImage) {
        reader.onload = e => previewImage.src = e.target.result;
        reader.readAsDataURL(file);
      }
    });
  };
  
  // Optimize date input formatting
  const formatDisplayDate = (() => {
    // Cache formatted dates
    const dateCache = new Map();
    
    return (dateString) => {
      if (!dateString) return '';
      
      if (dateCache.has(dateString)) {
        return dateCache.get(dateString);
      }
      
      const options = { year: 'numeric', month: 'short', day: 'numeric' };
      const formattedDate = new Date(dateString).toLocaleDateString('en-US', options);
      dateCache.set(dateString, formattedDate);
      
      return formattedDate;
    };
  })();
  
  // Function to initialize date inputs
  const initializeDateInputs = (inputs) => {
    inputs.forEach(input => {
      if (input.hasAttribute('data-initialized')) return;
      input.setAttribute('data-initialized', 'true');
      
      const originalType = input.type;
      
      const toggleInputMode = (showInput) => {
        if (showInput) {
          input.type = 'date';
          // Don't focus automatically - this can cause performance issues on mobile
        } else if (input.dataset.actualValue) {
          input.type = 'text';
          input.value = formatDisplayDate(input.dataset.actualValue);
        }
      };
      
      if (input.value) {
        input.dataset.actualValue = input.value;
        toggleInputMode(false);
      }
      
      input.addEventListener('focus', () => toggleInputMode(true));
      
      input.addEventListener('blur', () => {
        if (input.value) {
          input.dataset.actualValue = input.value;
        }
        toggleInputMode(false);
      });
      
      input.addEventListener('change', function() {
        if (this.value) {
          this.dataset.actualValue = this.value;
          toggleInputMode(false);
        }
      });
    });
  };
  
  // Initialize date inputs on page load
  document.addEventListener('DOMContentLoaded', () => {
    initializeDateInputs(document.querySelectorAll('input[type="date"]'));
    initializeImageUpload();
    
    // Form submission optimization
    const form = document.getElementById('leave-application-form');
    if (form) {
      form.addEventListener('submit', function(e) {
        // Set all date inputs to their actual values before submitting
        form.querySelectorAll('input[type="date"]').forEach(input => {
          if (input.dataset.actualValue) {
            input.type = 'date';
            input.value = input.dataset.actualValue;
          }
        });
        
        const submitButton = this.querySelector('button[type="submit"]');
        if (submitButton) {
          submitButton.classList.add('loading');
          
          // Use requestAnimationFrame for smoother UI updates
          setTimeout(() => {
            requestAnimationFrame(() => {
              submitButton.classList.remove('loading');
            });
          }, 3000);
        }
      });
    }
  });