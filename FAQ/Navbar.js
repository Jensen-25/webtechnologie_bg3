// Navbar.js

function createNavbar() {
  const navBar = document.createElement('ul');
  navBar.classList.add('navbar');

  const navItems = [
    { text: 'Home', link: '../user_homepage.php' },
    { text: 'Products', link: '../Products_folder/main_products_page.html' },
    { text: 'Shopping Cart', link: '../Shoppingcart_folder/shoppingcart_page.html' },
    { text: 'Admin', link: '../Admin_folder/Admin_settings.php' },
    ];

  const loggedInUser = getLoggedInUser(); // You need to implement this function

  if (loggedInUser) {
    // If logged in, display the username and add a logout option
    navItems.push({ text: `Welcome, ${loggedInUser}`, link: '#' }); // Replace '#' with the logout link
    navItems.push({ text: 'Logout', link: '#' }); // Replace '#' with the logout link
  } else {
    // If not logged in, show the login and registration options
    navItems.push({ text: 'Login', link: '../Login_folder/Login_screen.php' });
    navItems.push({ text: 'Registration', link: '../Login_folder/registratiescherm.php' });
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

// Roep de createNavbar-functie aan
createNavbar();

  