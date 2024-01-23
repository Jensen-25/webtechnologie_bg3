<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Page</title>

    <!-- Link naar de CSS sheet -->
    <link rel="stylesheet" href="/Homepage_stylesheet.css">

        <!-- Navigatie bar -->
    <ul>
    <li style="float:left"><a class="active" href="Homepage_folder/Homepage.html">Home</a></li>
    <li><a href="/Products_folder/main_products_page.html">Products</a></li>
    <li><a href="/Login_folder/Login_screen.html">Login</a></li>
    <li><a href="/Login_folder/registratiescherm.html">Registration</a></li>
    <li><a href="/FAQ/FAQ.html">FAQ</a></li>
    </ul>

    <style>
        /* Simple styling for the product grid */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            justify-content: center;
        }

        .product {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            cursor: pointer;
        }
    </style>
</head>

<body>
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
                        const productElement = document.createElement('div');
                        productElement.className = 'product';
                        productElement.setAttribute('data-productid', product.ProductID);
                        productElement.innerHTML = `
                            <img src="${product.ProductImage}" alt="${product.ProductName} Image">
                            <h3>${product.ProductName}</h3>
                            <p>Price: ${product.ProductPrice}</p>
                        `;
                        productGrid.appendChild(productElement);

                        // Add an event listener to each product element
                        productElement.addEventListener('click', function () {
                            const productId = this.getAttribute('data-productid');
                            // Redirect to the product details page with the product ID
                            window.location.href = `product-details.html?id=${productId}`;
                        });
                    });
                })
                .catch(error => console.error('Error:', error));
        }

        // Call the function when the page loads
        window.onload = showAllProducts;
    </script>
</body>
</html>