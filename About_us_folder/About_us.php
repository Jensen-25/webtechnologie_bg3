<!DOCTYPE html>

    <html>
        <head>
            <title>About Us</title>

            <!-- Link naar de CSS sheet -->
            <link rel="stylesheet" href="../Homepage_stylesheet.css">

            <!-- Navigatie bar -->
            <?php include '../Navbar_folder/Navbar_link.php'; ?>
            
            <!-- Cookie -->
            <?php include '../cookie.php'; ?>
    
            <!-- Link voor icoontjes footer-->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

            <style>
                h1 {
                text-align: center;
                margin-bottom: 4%;
                color: black;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                font-size: 300%;
                align-self:stretch;
                }
                
                h2 {
                text-align: center;
                margin-left: 0%;
                margin-top: 3%;
                color: black;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                font-size: 200%;
                align-self:stretch;
                }
                
                p{
                text-align: center;
                margin-left: 0%;
                margin-top: 1%;
                color: black;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                font-size: 100%;
                align-self:stretch;
                line-height: 1.8;
                }

                div.content {
                margin-top: 4%;
                margin-bottom: 6%;
                margin-left: 20%;
                margin-right: 20%;
                }
            </style>
            
        </head>

        <body>
            <h1>About us</h1>

            <!-- Content -->
            <div class="content">
            <p>At Fit 'n Flavors, we believe that nutrition forms the foundation for an energetic and balanced life.<br>Our company has emerged from a shared passion for health, fitness, and delicious eating.</p>
            <p>At Fit 'n Flavors, we strive to deliver high-quality, protein-rich products that are not only nutritious but also delightfully tasty.<br>We understand that each individual has unique goals and taste preferences, which is why we have developed a wide range of products to meet all your needs.</p>
            <p>We aim to inspire you to bring out the best in yourself, both in the gym and beyond. Whether you're a seasoned athlete or just starting your fitness journey, Fit 'n Flavors is here to support you every step of the way. </p>
            <p>Thank you for being a part of the Fit 'n Flavors family.<br>Together, we are building a flavorful and healthy future!</p>
            </div class="content">

            <!-- Footer -->
            <?php include '../Navbar_folder/Footer.php'; ?>
        </body>
    </html>