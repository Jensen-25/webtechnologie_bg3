<?php
// PHP script to extract user data from the database
include '/var/www/connections/connections.php';
session_start();
$connection = openConnection();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION['admin']) && $_SESSION['admin'] !== true) {
    header("location: ../user_homepage.php/");
    exit;
} else{

?>

<!DOCTYPE html>
<html>
    <head>
    <style>
        /* Set height of body and the document to 100% to enable "full page tabs" */
        body, html {
        height: 100%;
        margin: 0;
        font-family: Arial;
        }

        /* Style tab links */
        .tablink {
        background-color: #555;
        color: white;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        font-size: 17px;
        width: 25%;
        }

        .tablink:hover {
        background-color: #777;
        }

        /* Style the tab content (and add height:100% for full page content) */
        .tabcontent {
        color: white;
        display: none;
        padding: 100px 20px;
        height: 100%;
        }

        #Home {background-color: #EADDCA;}
        #News {background-color: #E1C16E;}
        #Contact {background-color: #CD7F32;}
        #About {background-color: #A52A2A;}
</style>
        <!-- Link naar de CSS sheet -->
        <link rel="stylesheet" href="../Homepage_stylesheet.css">

        <!-- Link for icons in footer, using 'Font Awesome 4' through W3Schools https://www.w3schools.com/icons/ -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            
        <!-- Navigatie bar -->
        <?php include '../Navbar_folder/Navbar_link.php'; ?>


</head>

<body>
    <button class="tablink" onclick="openPage('Home', this, '#A52A2A')">Home</button>
    <button class="tablink" onclick="openPage('News', this, 'E1C16E')" id="defaultOpen">News</button>
    <button class="tablink" onclick="openPage('Contact', this, '#CD7F32')">Contact</button>
    <button class="tablink" onclick="openPage('About', this, '#A52A2A')">About</button>

    <div id="Home" class="tabcontent">
    <h3>Home</h3>
    <p>Home is where the heart is..</p>
    </div>

    <div id="News" class="tabcontent">
    <h3>News</h3>
    <p>Some news this fine day!</p> 
    <?php include '../Admin_folder/Add_admin.php'; ?>
    </div>

    <div id="Contact" class="tabcontent">
    <h3>Contact</h3>
    <p>Get in touch, or swing by for a cup of coffee.</p>
    </div>

    <div id="About" class="tabcontent">
    <h3>About</h3>
    <p>Who we are and what we do.</p>
    </div>

    <script>
    function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    </script>

</body>

</html>
<?php }  ?>
