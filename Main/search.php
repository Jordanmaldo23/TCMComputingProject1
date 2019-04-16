<?php
  include '../session_check.php';
  include '../db_config.php';
  ?>

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
          text-align: Center;
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
          <a href="main.php">News</a>
          <a href="forum.php">Forum</a>
          <a class = "active" href="search.php">Profile Search</a>
          <a href="settings.php">Profile Settings</a>
          <a href="../index.php">Logout</a>
        </div>
        <div id = "bodyHeader">
          <h3> Search User </h3>
        </div>
        <div id = bodyBody>
          <p>Search</p>
          <form method ="GET" action="">
            <label>Username: </label><input type="text" name="name"></br>
            <input type="submit" value="Search">
          </form>
          <table id="newTable">
            <th></th><th></th><th></th>
          </table>
        </div>
        <div id = "bodyFooter">
          <p>This page was created by <b>Team Checkmate</b>.&copy; Test 2019.</p>
        </div>
        <?php
          if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['name']) && $_GET['name'] != ""){
            $name = $db->real_escape_string($_GET['name']);
            $sql = "SELECT tcm_users_id,tcm_profiles_dname, tcm_profiles_picture, tcm_profiles_signature from tcm_profiles where tcm_profiles_dname LIKE '%$name%'";
            $result = $db->query($sql);
            $resultcheck = $result->num_rows;
            if ($resultcheck < 1 ) {
              echo "No users found";
            } else {
              $array = array();
              while ($row=$result->fetch_assoc()) {
                $array[] = $row['tcm_profiles_picture'];
                $array[] = $row['tcm_users_id'];
                $array[] = $row['tcm_profiles_dname'];
                $array[] = $row['tcm_profiles_signature'];
              }
            }
          }
          $db->close();
        ?>
        <script>
          var newArray = <?php if($resultcheck > 0){echo json_encode($array);}?>;
          var newTable = document.getElementById("newTable");
          var x, y;
          var i = 0;
          for(x = 0; x < (newArray.length / 4); x++){
            var row = newTable.insertRow();
            for(y = 0; y < 3; y++){
              var cell = row.insertCell(y);
              if(y == 0){
                cell.innerHTML = "<img src=\""+newArray[i]+"\"alt=profile_picture height=75 width =75></img>";
              }
              else if(y == 1){
                var str = "<a target =_blank href=\"profile.php?uid="+newArray[i]+"&name=";
                i++;
                str += ""+newArray[i]+"\">"+newArray[i]+"</a>";
                cell.innerHTML = str;
              }
              else{
                cell.innerHTML = newArray[i];
              }
              i++;
            }
          }
        </script>
    </body>
  </html>
