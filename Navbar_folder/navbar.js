// Navbar.js
 
function createNavbar() {
    const navBar = document.createElement('ul');
    navBar.classList.add('navbar');
  
    const navItems = [
      { text: 'Home', link: '../' },
      { text: 'Products', link: '../Products_folder/main_products_page.php' },
      { text: 'Login', link: '../Login_folder/Login_screen.php'},
      { text: 'Register', link: '../Login_folder/registratiescherm.php' },
      { text: 'Shopping Cart', link: '../Shoppingcart_folder/shoppingcart_page.php' },
    ];
    
    navItems.forEach(item => {
      const listItem = document.createElement('li');
      const link = document.createElement('a');
      link.href = item.link;
      link.textContent = item.text;
      listItem.appendChild(link);
      navBar.appendChild(listItem);
    });
  
    document.body.prepend(navBar); // Voeg de navigatiebalk toe aan het begin van de body
  }
  
  // Roep de createNavbar-functie aan
  createNavbar();