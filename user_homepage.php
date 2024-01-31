<?php

include '/var/www/connections/connections.php';

session_start();
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    </head>

    <body>
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
        <?php include 'Navbar_folder/Footer.php'; ?>
        
    </body>
</html>