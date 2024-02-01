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
        <link rel="stylesheet" href="../Homepage_stylesheet.css">

        <!-- Link for icons in footer, using 'Font Awesome 4' through W3Schools https://www.w3schools.com/icons/ -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title> Homepage User </title>
            
        <!-- Navigatie bar -->
        <?php include '../Navbar_folder/Navbar_link.php'; ?>
        
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
        <?php include '../Navbar_folder/Footer.php'; ?>
    </body>
</html>