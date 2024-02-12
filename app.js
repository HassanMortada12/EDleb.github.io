document.addEventListener('DOMContentLoaded', () => {
    // Check if this is the splash screen page
    if (document.querySelector('.intro')) {
      // Add a delay before redirecting to the original page
      setTimeout(() => {
        // Redirect to your original page
        window.location.href = 'index.php'; // Change 'original_page.html' to the URL of your original page
      }, 3000); // Adjust the delay (in milliseconds) as needed
    }
  });

