<!DOCTYPE HTML>

<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'checkmateadmin');
    define('DB_PASSWORD', 'checkmate1');
    define('DB_DATABASE', 'TCMDB');
    $db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    if ($db -> connect_errno) {
      //printf("Connection Failed: %\n", $myssqli->connect_error);
    }
    if (isset($_POST['submit'])) {

        $UID = mysqli_real_escape_string($db, $_POST['uid']);
        $PW = mysqli_real_escape_string($db, $_POST['pw']);

        // Check if inputis Empty
        if (empty($UID) || empty($PW)) {
            exit();
        } else {
          $sql = "SELECT * from tcm_users_marauder where users_login_name = '$UID'";
          $result = $db->query($sql);
          $resultcheck = $result->$numrows;
          $data = array();
          if (($resultcheck) < 1 ) {
            exit();
          } else {
            while ($result->fetch_assoc($result)) {
              $data[] = ($numrows["users_login_name"]);
              $data[] = ($numrows["users_login_password"]);
            }
          }
        }
    }

?>

<html>
<head>
  <body>
  <form method ="post" action="marauder.php">
      <input type="text" placeholder="Username/Email:"name="username"><br/>
      <input type="password" placeholder="Password:" name="password"><br/>
      <input type="submit" value="Login">
  </form>
  </body>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
}

    /* Slideshow stuff */
    * {box-sizing: border-box;}
    body {font-family: Verdana, sans-serif;}
    .mySlides {display: none;}
    img {vertical-align: middle;}

    /* Slideshow container */
    .slideshow-container {
      max-width:100px;
      position: relative;
      margin: auto;
    }

    /* Caption text */
    .text {
      color: #010101;
      font-size: 15px;
      padding: 8px 12px;
      position: absolute;
      bottom: -50px;
      width: 100%;
      text-align: center;
    }

    .active {
      background-color: #717171;
    }

    /* Fading animation */
    .fade {
      -webkit-animation-name: fade;
      -webkit-animation-duration: 1.0s;
      animation-name: fade;
      animation-duration: 1.0s;
    }

    @-webkit-keyframes fade {
      from {opacity: .4}
      to {opacity: 1}
    }

    @keyframes fade {
      from {opacity: .4}
      to {opacity: 1}
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
      .text {font-size: 11px}
    }
    /* Sidebar stuff */
    .sidebar {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
    }

    .sidebar a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 25px;
      color: #818181;
      display: block;
      transition: 0.3s;
    }

    .sidebar a:hover {
      color: #f1f1f1;
    }

    .sidebar .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }

    .openbtn {
      font-size: 20px;
      cursor: pointer;
      background-color: #111;
      color: white;
      padding: 10px 15px;
      border: none;
    }

    .openbtn:hover {
      background-color: #444;
    }

    #main {
      transition: margin-left .5s;
      padding: 16px;
    }

</style>
</head>
<body>


    <div id="mySidebar" class="sidebar">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
      <a href="../index.html">Index</a>
      <a href="#">Classes</a>
      <a href="#">Weapons</a>
      <a href="#">Equipment</a>
    </div>

    <div id="main">
      <button class="openbtn" onclick="openNav()">☰ Menu</button>
      <h2>Welcome to Project Nova's Wiki, The best comprehensive reference written and maintained by Marauder </h2>
      <p>For any questions join our <a href="https://discord.gg/xcnu2b">discord</a> </p>
    </div>

<script>
    function openNav() {
      document.getElementById("mySidebar").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
      document.getElementById("main").style.marginLeft= "0";
    }

</script>

    <div class="slideshow-container">

    <div class="mySlides fade">
      <img src="https://vignette.wikia.nocookie.net/dust514/images/a/ab/Assault3.png/revision/latest/scale-to-width-down/200?cb=20120712060232" style="width:100%">
      <div class="text">Assault Dropsuit</div>
    </div>

    <div class="mySlides fade">
      <img src="https://vignette.wikia.nocookie.net/dust514/images/5/53/Scout2.png/revision/latest?cb=20120712003140" style="width:100%">
      <div class="text">Scout Dropsuit</div>
    </div>

    <div class="mySlides fade">
      <img src="https://vignette.wikia.nocookie.net/eve/images/e/ee/Minmatar2.png/revision/latest/scale-to-width-down/130?cb=20120702225705" style="width:100%">
      <div class="text">Logistic Dropsuit</div>
    </div>

    </div>
    <br>

    <div style="text-align:center">
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
    </div>

<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
      setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
</script>


</body>
</html>
