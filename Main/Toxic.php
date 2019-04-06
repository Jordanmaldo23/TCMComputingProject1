<?php include '../session_check.php';?>
<html lang="en">
  <head>
    <style>
    body
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
      color: white;

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
      0%   {background-color:red; left:-500px;top:0px;}
      25%  {background-color:yellow; left:500px;top:0px;}
      50%  {background-color:blue; left:500px;top:300px;}
      75%  {background-color:green; left:-500px;top:300px;}
      100% {background-color:red; left:-500px;top:0px;}
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
    <title>ToxicSushi</title>
    <meta charset="utf-8">
  </head>
  <body style="background-image:url('https://media.giphy.com/media/20wDWskVLfE08/giphy.gif');">
    <div id = bodyBody>
      <p>Hello World!</p>
      <p id = "textHere"></p>
      <p>This page was created by <b>Wendell Mardenborough</b>. Test 2019.</p>
      <a href="https://tenor.com/">Content Here</a></br>
      <a href="../index.php">Index</a></br>
      <img src= "https://media.giphy.com/media/20wDWskVLfE08/giphy.gif" alt="dancing frog" style=width:200px;height:200px;Border:1;></br>
      <p id = "kek"></p>
      <p id = "grr"></p>
      <!-- Test Comment -->
      <p>Please Ignore the Dancing Frog.</P>
  </body>
</html>
