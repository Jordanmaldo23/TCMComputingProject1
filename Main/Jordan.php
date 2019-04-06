<?php include '../session_check.php';?>
<html lang="en">
  <head>
    <title>Jordan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      body {
        //background-image: url("https://media.thetab.com/blogs.dir/90/files/2019/01/animal.jpeg");
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
        background-color: red;
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
      @keyframes example {
        0%   {background-color:red; right:-500px;top:0px;}
        25%  {background-color:yellow; right:500px;top:0px;}
        50%  {background-color:blue; right:500px;top:400px;}
        75%  {background-color:green; right:-500px;top:400px;}
        100% {background-color:red; right:-500px;top:0px;}
      }
      img {
        width: 300px;
        height: 300px;
        position: relative;
        background-color: red;
        animation-name: example;
        animation-duration: 4s;
        animation-iteration-count: 100;
      }
    </style>
  </head>
  <body>
      <div id = "bodyNav">
        <a class = "active" href="test.html">Test Page</a>
        <a href="https://leagueoflegends.com">Play League Here</a>
          <a href="toxic.php">Toxic!</a>
        <a href="../index.php">Index</a>
      </div>
      <div id = "bodyHeader">
        <h3> 90s Web Page </h3>
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
        document.getElementById("textHere").innerHTML = output;
      </script>
  </body>
</html>
