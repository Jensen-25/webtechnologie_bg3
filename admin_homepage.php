<?php

include '/var/www/connections/connections.php';

session_start();

// Redirect user to login page if not logged in.
if(!isset_($_SESSION['username'])){
    header('Location:Login_screen.html');

}

?>

<!DOCTYPE html>
<html>
  <head>
    <!-- Link naar de CSS sheet -->
    <link rel="stylesheet" href="Homepage_stylesheet.css">

    <!-- Link voor icoontjes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Homepage Admin </title>
      
    <!-- Navigatie bar -->
    <script src="../FAQ/Navbar.js" defer></script>

  </head>

<body>


  <!-- Slideshow container -->
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
<div class="footer"> 
  <div class="row">
    <div class="column">
        <h3>About us</h3>
        <p> At Fit 'n Flavors, we believe that nutrition forms the foundation for an energetic and balanced life. 
          Our company has emerged from a shared passion for health, fitness, and delicious eating.
          <br> 
          <br> 
          At Fit 'n Flavors, we strive to deliver high-quality, protein-rich products that are not only nutritious but also delightfully tasty. 
          We understand that each individual has unique goals and taste preferences, which is why we have developed a wide range of products to meet all your needs.
          <br> <br>
          We aim to inspire you to bring out the best in yourself, both in the gym and beyond. Whether you're a seasoned athlete or just starting your fitness journey, Fit 'n Flavors is here to support you every step of the way.
          Thank you for being a part of the Fit 'n Flavors family. Together, we are building a flavorful and healthy future!
          </p>
    </div>
    <div class="column">
      <br> <br>
        <h3>Follow us!</h3>
        <p><a href="http://www.instagram.com/" ><i class="fa fa-instagram" style="font-size:24px"></i></a>
          <a href="https://www.facebook.com" ><i class="fa fa-facebook" style="font-size:24px"></i></a>
          <a href="https://www.linkedin.com" ><i class="fa fa-linkedin" style="font-size:24px"></i></a>
        
        </p>
        <br> <br>
        <h3>Costumerservice</h3>
        <p class="links">
          <a href="../FAQ/FAQ.html">FAQ</a>
          <br>
          <a href="../FAQ/Delivery.html">Delivery information</a>
          <br>
          <a href="../FAQ/Returns.html">Returns and refund policy</a>
          <br>
          <a href="../FAQ/Contact.html">Contact</a>
        </p>
    </div>
  </div>

</div>

</body>
</html>
