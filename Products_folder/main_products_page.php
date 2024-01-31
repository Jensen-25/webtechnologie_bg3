<?php
include '/var/www/connections/connections.php';
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Link naar de CSS sheet -->
        <link rel="stylesheet" href="../Homepage_stylesheet.css">

        <!-- Link for icons in footer, using 'Font Awesome 4' through W3Schools https://www.w3schools.com/icons/ -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title> Homepage User </title>
            
        <!-- Navigatie bar -->
        <?php
            if (isset($_SESSION['admin']) || isset($_SESSION['user'])) {
                ?>
                <script src="../Navbar_folder/Navbar_loggedin.js" defer></script>
        <?php } else {
                ?>
                <script src="../Navbar_folder/navbar.js" defer></script>
        <?php  }
        ?>  
        <style>
            /* Simple styling for the product grid */
            .product-grid {
                display: grid;
                grid-template-columns: repeat(5, 1fr);
                gap: 10px;
                justify-content: center;
            }

            .product {
                border: 2px solid #C4AE8C;
                border-radius: 25px;
                padding: 20px;
                align-items: center;
                text-align: center;
                cursor: pointer;
                background-color: #dbcdb6ad;
                transition: transform 0.3s ease;
            }

            .product:hover {
                transform: scale(1.2);
            }

            .product img {
                max-width: 100%;
                max-height: 50%;
                margin-bottom: 10px;
            }

            .product h3 {
                font-size: 150%;
                margin-top: 10px; 
                color:#000000;
            }

            .product p {
                margin-top: 5px;
                color:#000000;
            }
        </style>
    </head>

    <body>
        <h1>These are our products!</h1>
            <div class="product-grid" id="product-grid">
                <!-- Products will be displayed here dynamically trough the javascrypt -->
            </div>

        <script>
            // Test array of product data
            // const products = [
            //     { ProductName: 'Yoghurt', ProductPrice: 19.99, ProductImage: '/Products_folder/Image_folder/Blueberry_Yogurt_Drink.jpg', ProductID: 1},
            //     { ProductName: 'Chocolate Pudding', ProductPrice: 10.99, ProductImage: '/Products_folder/Image_folder/Chocolate_Pudding.jpg', ProductID: 2},
            //     { ProductName: 'Chocolate Pudding', ProductPrice: 10.99, ProductImage: '/Products_folder/Image_folder/Chocolate_Pudding.jpg', ProductID: 2},
            //     { ProductName: 'Chocolate Pudding', ProductPrice: 10.99, ProductImage: '/Products_folder/Image_folder/Chocolate_Pudding.jpg', ProductID: 2},
            //     { ProductName: 'Chocolate Pudding', ProductPrice: 10.99, ProductImage: '/Products_folder/Image_folder/Chocolate_Pudding.jpg', ProductID: 2},
            //     { ProductName: 'Chocolate Pudding', ProductPrice: 10.99, ProductImage: '/Products_folder/Image_folder/Chocolate_Pudding.jpg', ProductID: 2}
            // ];

            // Function to fetch and display all products on the main page
            function showAllProducts() {

                // Use fetch API to get all product details from the server
                fetch('get_all_products.php') 
                    .then(response => response.json())
                    .then(data => {

                        // Update the product grid with the fetched product details
                        const productGrid = document.getElementById('product-grid');
                        productGrid.innerHTML = '';

                        data.forEach(product => {
                            // Create a figure with class product
                            const productFigure = document.createElement('figure');
                            productFigure.className = 'product';
                            productFigure.setAttribute('data-productid', product.ProductID);

                            // Create the image for the grid
                            const imageElement = document.createElement('img');
                            imageElement.src = product.ProductImage;
                            imageElement.alt = `${product.ProductName} Image`;

                            // Create the caption for the figure
                            const figCaption = document.createElement('figcaption');

                            // Create the product name for the grid
                            const headingElement = document.createElement('h3');
                            headingElement.textContent = product.ProductName;

                            // Create the product price for the grid
                            const priceElement = document.createElement('p');
                            priceElement.textContent = `Price: $${product.ProductPrice}`;

                            // Add all the elements to the figure and figure to the grid
                            figCaption.appendChild(headingElement);
                            figCaption.appendChild(priceElement);

                            productFigure.appendChild(imageElement);
                            productFigure.appendChild(figCaption);

                            productGrid.appendChild(productFigure);

                            // Add an event listener to each product figure
                            productFigure.addEventListener('click', function () {
                                const productId = this.getAttribute('data-productid');
                                // Redirect to the product details page with the product ID
                                window.location.href = `product-details.php?id=${productId}`;
                            });
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
            // Call the function when the page loads
            window.onload = showAllProducts();
        </script>

        <!-- Footer -->
        <div class="footer"> 
            <div class="row">
            <div class="column">
                <h3 class="footer">About Fit 'n Flavors</h3>
                <p class="footer"> <a href="../About_us_folder/About_us.html">About us</a></p>
                <p class="footer"> <a href="../About_us_folder/Terms_and_conditions.html">Terms & Conditions</a></p>
            </div>

            <div class="column">
                <h3 class="footer">Costumerservice</h3>
                <p class="footer"><a href="../FAQ/FAQ.html">FAQ</a></p>
                <p class="footer"><a href="../FAQ/Delivery.html">Delivery information</a></p>
                <p class="footer"><a href="../FAQ/Returns.html">Returns and refund policy</a></p>
                <p class="footer"><a href="../FAQ/Contact.html">Contact</a></p>
            </div>
            
            <div class="column">
                <h3 class="footer">Follow us!</h3>
                <p class="footer"><a class="footer" href="http://www.instagram.com/" ><i class="fa fa-instagram" style="font-size:24px"></i></a>
                    <a class="footer" href="https://www.facebook.com" ><i class="fa fa-facebook" style="font-size:24px"></i></a>
                    <a class="footer" href="https://www.linkedin.com" ><i class="fa fa-linkedin" style="font-size:24px"></i></a>
                </p>
            </div>
            </div>
        </div>
    </body>
</html>