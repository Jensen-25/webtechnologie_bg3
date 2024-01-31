<?php

include '/var/www/connections/connections.php';

session_start();

// check whether cookies are already accepted in the session of the user 
if (!isset($_SESSION['cookiesAccepted']) || $_SESSION['cookiesAccepted'] !== true) {
    $_SESSION['cookiesAccepted'] = true;
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
=======

>>>>>>> b7edf6d79c0a809b0215715a7fad656da0d507b8
        <!-- Link naar de CSS sheet -->
        <link rel="stylesheet" href="Homepage_stylesheet.css">

        <!-- Link for icons in footer, using 'Font Awesome 4' through W3Schools https://www.w3schools.com/icons/ -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <title>Homepage</title>
        <style>
            .button {
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            /* margin: 4px 2px; */
            transition-duration: 0.4s;
            cursor: pointer;
            }

            .button1 {
            background-color: #C4AE8C; 
            color: black; 
            border: 2px solid #C4AE8C;
            align-self: center;
            }

            .button1:hover {
            background-color: #D9C7AA;
            color: white;
            }

            .button-block {
            margin-top: 5%;
            margin-bottom: 5%;
            justify-content: center;
            display: flex;
            }
            
            .description {
            margin-top: 4%;
            margin-bottom: 4%;
            margin-left: 25%;
            margin-right: 25%;
            }
            
            .description p {
            color: black;
            font-size: 110%;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            text-align: center;
            }
        </style>
            
        <?php include 'Navbar_folder/Navbar_link.php'; ?>

         <!-- Cookie Popup -->
         <style> 
        /* Cookie Popup Styles */
        #cookie-popup {
            position: fixed;
            bottom: 20px;
            left: 20px;
            width: 300px;
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

        

        <style>
            .button {
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            /* margin: 4px 2px; */
            transition-duration: 0.4s;
            cursor: pointer;
            }

            .button1 {
            background-color: #C4AE8C; 
            color: black; 
            border: 2px solid #C4AE8C;
            align-self: center;
            }

            .button1:hover {
            background-color: #D9C7AA;
            color: white;
            }

            .button-block {
            margin-top: 5%;
            margin-bottom: 5%;
            justify-content: center;
            display: flex;
            }
            
            .description {
            margin-top: 4%;
            margin-bottom: 4%;
            margin-left: 25%;
            margin-right: 25%;
            }
            
            .description p {
            color: black;
            font-size: 110%;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            text-align: center;
            }
        </style>
    </head>


    <body>
<<<<<<< HEAD
=======
       
    
    <body>
        <h1> Welcome to Fit 'n Flavors! </h1>
        <h2> Your ultimate destination for a healthy and flavorful lifestyle</h2>


>>>>>>> b7edf6d79c0a809b0215715a7fad656da0d507b8
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

        <div class="description">
            <p>"At Fit 'n Flavors, we believe in simplifying your shopping experience, so you can focus on what matters most: achieving your fitness milestones. 
            <p>Indulge in a curated selection of top-notch protein brands that cater to your fitness goals and tantalize your taste buds with a symphony of flavors. From the bold richness of chocolate to the refreshing zest of fruit-inspired blends, we've got it all.</p>
            <p>Shop all your favorite protein brands in one place and elevate your fitness journey with devine flavors!" </p>
            </div>

<<<<<<< HEAD
        <h1> Welcome to Fit 'n Flavors! </h1>
        <h2> Your ultimate destination for a healthy and flavorful lifestyle</h2>


=======
            <!-- <button class="button button1">Start shopping</button> -->
            <div class="button-block">
            <a class="button button1" href="Products_folder/main_products_page.php">Start shopping</a>
        </div>
>>>>>>> b7edf6d79c0a809b0215715a7fad656da0d507b8
        <!-- Footer -->
        <?php include 'Navbar_folder/Footer.php'; ?>
        
    </body>
</html>