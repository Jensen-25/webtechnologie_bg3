<?php

include '/var/www/connections/connections.php';

session_start();
?>


<!DOCTYPE html>
<html>
    <head>
        <!-- Link naar de CSS sheet -->
        <link rel="stylesheet" href="Homepage_stylesheet.css">

        <!-- Link for icons in footer, using 'Font Awesome 4' through W3Schools https://www.w3schools.com/icons/ -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title> Homepage User </title>
            
        <?php include 'Navbar_folder/Navbar_link.php'; ?>
    </head>

    <body>
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
    z-index: 10000;
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

        <!-- Slideshow container, based on slideshow tutorial from W3Schools https://www.w3schools.com/howto/default.asp -->
        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="https://i.ytimg.com/vi/biJtqrpeB8U/maxresdefault.jpg" class="slideshow_image" >
            </div>
        
            <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="https://www.datocms-assets.com/104390/1704282932-melkunie-protein-header-family.jpg?auto=compress&crop=focalpoint&fit=crop" class="slideshow_image">
            </div>
            
            <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="https://nutritiondepot.vn/wp-content/uploads/2020/08/Protein-barr-myproteinpng.png" class="slideshow_image">
            </div>
            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>
        
        <!-- The dots/circles -->
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>

        <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
        showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
        showSlides(slideIndex = n);
        }

        function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        }
        </script>


        <h1> Welcome to Fit 'n Flavors! </h1>
        <h2> Your ultimate destination for a healthy and flavorful lifestyle</h2>

        <!-- Footer -->
        <?php include '../Navbar_folder/Footer.php'; ?>
        
    </body>
</html>