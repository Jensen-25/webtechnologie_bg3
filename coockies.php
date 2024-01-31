<!-- Cookie Popup -->
<div id="cookie-popup">
    <p>This website uses cookies to ensure you get the best experience on our website.</p>
    <button onclick="acceptCookies()">Got It!</button>
</div>

<script>
// Check if the user has accepted cookies
function checkCookies() {
    if (!localStorage.getItem('cookiesAccepted')) {
        // Show the cookie popup if not accepted
        document.getElementById('cookie-popup').style.display = 'block';
    }
}

// Function to set cookies as accepted
function acceptCookies() {
    // Set a localStorage item to remember the user's choice
    localStorage.setItem('cookiesAccepted', 'true');
    
    // Hide the cookie popup
    document.getElementById('cookie-popup').style.display = 'none';
}

// Run the checkCookies function when the page loads
window.onload = checkCookies;
</script>