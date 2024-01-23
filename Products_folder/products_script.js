function showProductDetails(productId) {
    // Use the fetch API to get all the information of the product from phpmyadmin using the productID
    // uses AJAX to attain all the information and displays this as html code. get_product_details.php
    // is used to get the information from phpmyadmin
    
    fetch('get_product_details.php?id=' + productId)
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

document.getElementById('product1').addEventListener('click', function () {
showProductDetails(1);
});

// document.getElementById('product2').addEventListener('click', function () {
// showProductDetails(2);
// });