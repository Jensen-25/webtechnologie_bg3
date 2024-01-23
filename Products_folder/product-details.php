<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details Page</title>

    <!-- Link naar de CSS sheet -->
    <link rel="stylesheet" href="/Homepage_stylesheet.css">

        <!-- Navigatie bar -->
    <ul>
    <li style="float:left"><a class="active" href="Homepage_folder/Homepage.html">Home</a></li>
    <li><a href="/Products_folder/main_products_page.php">Products</a></li>
    <li><a href="/Login_folder/Login_screen.html">Login</a></li>
    <li><a href="/Login_folder/registratiescherm.html">Registration</a></li>
    <li><a href="/FAQ/FAQ.html">FAQ</a></li>
    </ul>
</head>

<body>
    <div id="product-container">
        <!-- Product details will be displayed here dynamically with the javascrypt-->
    </div>

    <script>
        // Function to fetch and display product details based on the product ID from the URL
        function showProductDetails() {
            // Get the product ID from the URL query parameters
            const urlParams = new URLSearchParams(window.location.search);
            const productId = urlParams.get('id');

            // Use fetch to get product details from the server
            fetch(`get_product_details.php?id=${productId}`)
                .then(response => response.json())
                .then(data => {
                    // Update the HTML content with the product details
                    document.getElementById('product-container').innerHTML = `
                        <img src="${data.ProductImage}" alt="Product Picture">
                        <h2>${data.ProductName}</h2>
                        <p>${data.ProductDescription}</p>
                        <p>Price: ${data.ProductPrice}</p>
                    `;
                })
                .catch(error => console.error('Error:', error));
        }

        // Call the function when the page loads
        window.onload = showProductDetails;
    </script>
</body>
</html>