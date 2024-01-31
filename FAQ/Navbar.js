// Navbar.js
 
function createNavbar() {
  const navBar = document.createElement('ul');
  navBar.classList.add('navbar');

  if (getLoggedInUser() == null) {
  const navItems = [
    { text: 'Home', link: '../' },
    { text: 'Products', link: '../Products_folder/main_products_page.html' },
    { text: 'Login', link: '../Login_folder/Login_screen.php' },
    { text: 'Registration', link: '../Login_folder/registratiescherm.php' },
    { text: 'Admin', link: '../Admin_folder/Admin_settings.php' },
    { text: 'Shopping Cart', link: '../Shoppingcart_folder/shoppingcart_page.html' },
  ];
} else {
  const navItems = [
    { text: 'Home', link: '../' },
    { text: 'Products', link: '../Products_folder/main_products_page.html' },
    { text: 'Login', link: '../Login_folder/Login_screen.php' },
    { text: 'Registration', link: '../Login_folder/registratiescherm.php' },
    { text: 'Admin', link: '../Admin_folder/Admin_settings.php' },
    { text: 'Shopping Cart', link: '../Shoppingcart_folder/shoppingcart_page.html' },
  ];
    // Check if a user is logged in
    const loggedInUser = getLoggedInUser(); // Implement this function to retrieve the logged-in user

    if (loggedInUser) {
      // If a user is logged in, add Logout and display the username
      navItems.push({ text: 'Logout', link: '../logout.php' });
      navItems.push({ text: `Welcome, ${loggedInUser}`, link: '#' });
    }
  }
  
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

function getLoggedInUser(){
        session_start(); 

        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        } else {
            return null;
    }
  
}

// Roep de createNavbar-functie aan
createNavbar();

  