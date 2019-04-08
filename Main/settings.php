<?php include '../session_check.php';?>
<html lang="en">
  <head>
    <title>Main</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
      }
      #bodyNav{
        background-color: #333;
        overflow: hidden;
      }
      #bodyNav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
      }
      #bodyNav a:hover {
        background-color: #ddd;
        color: black;
      }
      #bodyNav a.active {
        background-color: #8c2d28;
        color: white;
      }
      #bodyHeader {
        background-color: lightgray;
        color: black;
        padding: 10px;
        text-align: center;
      }
      #bodyBody {
        color: black;

        text-align: center;
      }
      #bodyFooter {
        background-color: lightgray;
        bottom: 0;
        position: fixed;
        width: 100%;
        color: black;
        padding: 1px;
        text-align: center;
      }
    </style>
  </head>
  <body>
      <div id = "bodyNav">
        <a href="main.php">Main Page</a>
        <a href="forum.php">TCM Forum</a>
        <a href=""><?php echo $_SESSION['username'];?>'s Profile</a>
        <a href="toxic.php">Toxic's Page</a>
        <a class = "active" href="">Settings</a>
        <a href="../index.php">Logout</a>
      </div>
      <div id = "bodyHeader">
        <h3> Profile Page </h3>
      </div>
      <div id = bodyBody>
        <p>Hello World!</p>
        <img src="">
        <p id = "textHere"></p>
      </div>
      <div id = "bodyFooter">
        <p>This page was created by <b>Jordan Maldonado</b>. Test 2019.</p>
      </div>
      <script>
        var array = ["0","1","2","3"];
        var i, j;
        var output = "";
        for(i = 0; i < 4; i++){
          for(j=0; j < 4; j++){
            output += "Test " + array[j] + " ... ";
          }
          if(i % 2 != 0){output += "</br>";}
        }
        //document.getElementById("textHere").innerHTML = output;
      </script>
  </body>
</html>
