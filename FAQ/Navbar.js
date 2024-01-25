function createNavbar(targetElement) {
    const navBar = document.createElement('ul');
    navBar.classList.add('navbar'); // Voeg een klasse toe voor styling (optioneel)
  
    const navItems = [
      { text: 'Home', link: '../index.html' },
      { text: 'Products', link: '../Products_folder/main_products_page.html' },
      { text: 'Login', link: '../Login_folder/Login_screen.html' },
      { text: 'Registration', link: '../Login_folder/registratiescherm.html' },
      { text: 'FAQ', link: '../FAQ/FAQ.html' },
      { text: 'Shopping Cart', link: '../Shoppingcart_folder/shoppingcart_page.html' },
    ];
  
    navItems.forEach(item => {
      const listItem = document.createElement('li');
      const link = document.createElement('a');
      link.href = item.link;
      link.textContent = item.text;
      listItem.appendChild(link);
      navBar.appendChild(listItem);
    });
  
    targetElement.appendChild(navBar);
  }
  
  // Roep de createNavbar-functie aan en geef het doel-HTML-element op (bijv. body)
  createNavbar(document.body);  