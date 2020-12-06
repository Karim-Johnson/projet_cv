<?php

session_start();
include_once 'config/database.php';


if(isset($_POST['submit'])){
  if( isset($_POST['email']) && isset($_POST['password'])){
      $email = $_POST['email'];
      $password = $_POST['password'];

      if(!empty($email) && !empty($password)){
       
        $sqlRe = $database->query("SELECT * FROM utilisateur");

        while ($row = $sqlRe->fetch()){
          
          if($email == $row['email'] && $password == $row['password']){
            $_SESSION['email'] = $row['email'];
            $_SESSION['nom'] = $row['nom'];
            header("Location: index.php");
          }else{
            $erreur = 1;
          }
        }
      }

  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Bare - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="style/bootstrap.min.css" rel="stylesheet">
  <link href="style/main.css" rel="stylesheet">
  <link href="login.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
<?php include("_navbar.php"); ?>

<!-- session avec le login -->

<!-- // if(!isset($_SESSION)) 
//     { 
//         session_start();    
//     } -->



  <!-- Page Content -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <!-- <div class="fadeIn first">
      <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
    </div> -->

    <!-- email Form -->
    <!--form action="php echo htmlspecialchars($_SERVEUR['PHP_SELF']);?> "   method="post"> -->
    <form action="login.php" class="mt-5"  method="post">
      <input type="text" id="email" class="fadeIn second" name="email" placeholder="email">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In" name="submit">
    </form>
    <?php
      if(isset($erreur)){
         echo  $erreur;
      }

      ?>
    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
        
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <?php include("_footer.php"); ?>
</body>

</html>


