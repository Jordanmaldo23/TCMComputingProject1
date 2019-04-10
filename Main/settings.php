<?php include '../session_check.php';
      include '../db_config.php';?>
<?php
$temp = $_SESSION['id'];
$sql = "SELECT * from tcm_profiles where tcm_users_id =" . $_SESSION['id'];
$result = $db->query($sql);
$resultcheck = $result->num_rows;
if (($resultcheck) < 1 ) {
  $sql = "INSERT INTO tcm_profiles (tcm_users_id )
          VALUES ('$temp')";
  $db->query($sql);
} else {
  while ($array=$result->fetch_assoc()) {
      $age = $array['tcm_profiles_age'];
      $fname = $array['tcm_profiles_fname'];
      $lname = $array['tcm_profiles_lname'];
      $location = $array['tcm_profiles_location'];
      $email = $array['tcm_profiles_email'];
      $signature = $array['tcm_profiles_signature'];
      $bio = $array['tcm_profiles_bio'];
    }
}

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
        <a href="profile.php"><?php echo $_SESSION['username'];?>'s Profile</a>
        <a href="toxic.php">Toxic's Page</a>
        <a class = "active" href="settings.php">Settings</a>
        <a href="../index.php">Logout</a>
      </div>
      <div id = "bodyHeader">
        <h3> Profile Page </h3>
      </div>
      <div id = bodyBody>
        <p>Profile Settings</p>
        <img src="https://i.imgur.com/lXSWGjR.png" width="256" height="256"></img>
        <form method ="post" action="" id="userform">
          <input type="text" name="fname" value="<?php echo $fname;?>"></br>
          <input type="text" name="lname" value="<?php echo $lname;?>"></br>
          <input type="text" name="email" value="<?php echo $email;?>"></br>
          <input type="text" name="location" value="<?php echo $location;?>"></br>
          <input type="number" name="age" value="<?php echo $age;?>"></br>
          <input type="text" name="signature" value="<?php echo $signature;?>"></br>
          <textarea rows="4" cols="50" name="bio" form="userform"><?php echo $bio;?></textarea></br>
          <input type="submit" value="Submit form">
        </form>
      </div>
      <div id = "bodyFooter">
        <p>This page was created by <b>Jordan Maldonado</b>. Test 2019.</p>
      </div>
      <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){
          $fname = $db->real_escape_string($_POST['fname']);
          $lname = $db->real_escape_string($_POST['lname']);
          $email = $db->real_escape_string($_POST['email']);
          $location = $db->real_escape_string($_POST['location']);
          $age = $db->real_escape_string($_POST['age']);
          $signature = $db->real_escape_string($_POST['signature']);
          $bio = $db->real_escape_string($_POST['bio']);
      $sql = "UPDATE tcm_profiles
              SET
              tcm_profiles_fname ='$fname',
              tcm_profiles_lname = '$lname',
              tcm_profiles_email = '$email',
              tcm_profiles_location = '$location',
              tcm_profiles_age = '$age',
              tcm_profiles_signature = '$signature',
              tcm_profiles_bio = '$bio'
              WHERE tcm_users_id =". $_SESSION['id'];
      $db->query($sql);
      header('refresh:0; url=settings.php');
    }
    $db->close();
      ?>
  </body>
</html>
