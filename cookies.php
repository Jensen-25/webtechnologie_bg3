<!-- Cookie Popup -->
<style> 
/* Cookie Popup Styles */
#cookie-popup {
    display: none;
    position: fixed;
    bottom: 20px;
    left: 20px;
    width: 300px;
    padding: 15px;
    background-color: #ADD8E6;
    color: #fff;
    border-radius: 8px;
    z-index: 100;
    color: white;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}

#cookie-popup p {
    margin: 0;
}

#cookie-popup button {
    background-color: #5cb85c;
    color: #fff;
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
}

#cookie-popup button:hover {
    background-color: #773cae;
}
</style>

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