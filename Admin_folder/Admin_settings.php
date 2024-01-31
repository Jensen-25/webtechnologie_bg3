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

<!DOCTYPE html>\
<html>
    <head>
        <!-- Link naar de CSS sheet -->
        <link rel="stylesheet" href="../Homepage_stylesheet.css">

        <!-- Link for icons in footer, using 'Font Awesome 4' through W3Schools https://www.w3schools.com/icons/ -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            
        <!-- Navigatie bar -->
        <?php include '../Navbar_folder/Navbar_link.php'; ?>


</head>

<body>
<style>
        /* Set height of body and the document to 100% to enable "full page tabs" */
        body, html {
        height: 25%;
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
        height: 25%;
        }

        #Home {background-color: #EADDCA;}
        #News {background-color: #E1C16E;}
        #Contact {background-color: #CD7F32;}
        #About {background-color: #A52A2A;}
</style>

    <button class="tablink" onclick="openPage('Add/Delete Admin', this, '#A52A2A')">Home</button>
    <button class="tablink" onclick="openPage('New Product', this, 'E1C16E')" id="defaultOpen">News</button>
    <button class="tablink" onclick="openPage('User Info', this, '#CD7F32')">Contact</button>

    <div id="Add/Delete Admin" class="tabcontent">
    <h3>Home</h3>
    <p>Add a new member to our Fit 'n flavors team!</p>
    </div>

    <div id="New Product" class="tabcontent">
    <h3>News</h3>
    <p>Add a product to the Fit 'n flavors family!</p> 
    </div>

    <div id="User Info" class="tabcontent">
    <h3>Contact</h3>
    <p>Get info about all our Fit 'n flavors' family members.</p>
    </div>

    <script>
    function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks;

    // This 
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
