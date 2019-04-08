<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
</head>
<body>
  <div>
      <h1> Account Registration </h1>
      <?php
        include('db_config.php');
        if($_SERVER['REQUEST_METHOD'] == "POST") {
          $error = ""; $success = "";
          $user = $db->real_escape_string($_POST['username']);
          $pass = $db->real_escape_string($_POST['password']);
          $pass_c = $db->real_escape_string($_POST['password_c']);
          $fname = $db->real_escape_string($_POST['fname']);
          $lname = $db->real_escape_string($_POST['lname']);
          $email = $db->real_escape_string($_POST['email']);
          $profile = $db->real_escape_string($_POST['profile']);
          $sql = "SELECT tcm_users_username from tcmdb.tcm_users where tcm_users_username = '$user'";
          $result = $db->query($sql);
          if($pass == $pass_c){
            if( $result->num_rows < 1){
              $pass = password_hash($pass,PASSWORD_DEFAULT);
              $sql = "INSERT INTO tcm_users (tcm_users_username,tcm_users_password,tcm_users_fname,tcm_users_lname,tcm_users_email,tcm_users_profile,tcm_users_admin,tcm_users_createdon)
              values ('".$user."','".$pass."','".$fname."','".$lname."','".$email."','".$profile."',0,now())";
              if($db->query($sql) == true){
                $success = "Account creation successful, forwarding to login page.";
                header("refresh: 3; url=index.php");
              }
              else{
                $error = "Error: " . $db->error;
              }
            } else {
              $error = "The username ". $user ." is already taken.";
            }
          }else {
            $error = "Passwords did not match.";
          }
        }
        $db->close();
       ?>
      <form method ="post" action="">
          <input type="text" placeholder="Username:"name="username" required></br>
          <input type="password" placeholder="Password:" name="password" required></br>
          <input type="password" placeholder="Confirm:" name="password_c" required></br>
          <input type="text" placeholder="First Name:" name="fname"></br>
          <input type="text" placeholder="Last Name:" name="lname"></br>
          <input type="text" placeholder="Email:" name="email"></br>
          <input type="text" placeholder="Profile Name:" name="profile"></br>
          <input type="submit" value="Create">
      </form>
      <p <?php if(!empty($error)){echo 'style="color: #cc0000;">' . $error;} if(!empty($success)){ echo 'style="color: #1d9b1d;">' . $success;}?><p>
      <p> Click <a href="index.php">here</a> to return to the index/login</p>
    </div>
</body>
</html>
