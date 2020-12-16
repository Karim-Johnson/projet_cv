<?php
// première fois ou l utilisateur n a pas soumis les donnees 
$Name = $email = $phone = $message = "";
$NameError = $emailError = $phoneError = $messageError = "";
$isSuccess = "false";
$emailTo = "kouekamjohnson@gmail.com";
// deuxième  fois ou l utilisateur soumis les donnees 
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $Name = verifyInput($_POST["Name"]);
    $email = verifyInput($_POST["email"]);
    $phone = verifyInput($_POST["phone"]);
    $message = verifyInput($_POST["message"]);
    $isSuccess = "true";
    $emailText = " ";
   
     if (empty($Name))
     {
        $NameError = "je veux connaitre ton nom";
        $isSuccess = "false"; 
     }
     else
     {
        $emailText .= "Name: $Name\n";
        
     }
 
     if(empty($message))
    {
          $message = "qu'est ce que tu veux me dire";
          $isSuccess = "false";
    }
       else
    {
         $emailText .= "message: $message\n";
    }    


     if(!isEmail($email))
    {
         $emailError = "je veux connaitre ton mail";
         $isSuccess = "false";
    }
    else
    {
    $emailText .= "email: $email\n";
    }

    if(!isPhone($phone))
     {
         $phoneError = "je veux connaitre ton numéro de téléphone";
         $isSuccess = "false";
    }
    else
    {
        $emailText .= "phone: $phone\n";
    }
    if ($isSuccess)
    {
     $headers = "From: $firstname $Name <$email>\r\nReply-To: $email";
     mail($emailTo, "un message de votre site", $emailText, $headers);
     $Name = $email = $phone = $message = "";
    }
}

                                            // fonction qui permet de valider un numéro de telephone
function isPhone($var)
{
    return preg_match("/^[0-9 ]*$/", $var);
}
                                        // fonction qui permet de valider un email, elle repose sur une autre fonction FILTER_VALIDATE_EMAIL. Cette fonction renvoie true si le mail est valide et false dans le cas contraire.
function isEmail($var)
{
    return filter_var($var, FILTER_VALIDATE_EMAIL);
}
                                        // fonction permettant de verifiant l input ie, ce que l utilisateur entre dans le formulaire.  
function verifyInput($var)
{
                                        // le but de la fonction trim permet de d enlever tout ce qui est espace supplementaire, tab, 
    $var = trim($var);  
                                     // le but de la fonction  stripslashes  enleve tous les antislahe
    $var = stripslashes($var);
                                    // le but de la fonction htmlspecialchars permet de convertir les caractere en html  
    $var = htmlspecialchars($var);
    return $var;
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Devéloppeur Web</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>

<body>



  <!-- Page Content -->
  
  <section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contact Me</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Contact Section Form-->
                <div class="new">
                    <div class="col-lg-8 mx-auto">
                        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                        <form id="contactForm" name="sentMessage"  method = "post" action = "<?php echo $_SERVER['PHP_SELF']; ?>" novalidate="novalidate">
                            
                                <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Email Address</label>
                                    <input class="form-control" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address." value=" <?php  echo $email; ?>" />
                                    <p class="help-block text-danger"></p>
                                    <p class="comments"><?php echo $emailError; ?></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Name</label>
                                    <input class="form-control" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name." value=" <?php  echo $Name; ?>"  />
                                    <p class="help-block text-danger"></p>
                                    <p class="comments"><?php echo $NameError; ?></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Phone Number</label>
                                    <input class="form-control" id="phone" type="tel" placeholder="Phone" required="required" data-validation-required-message="Please enter your phone number."  value=" <?php  echo $phone; ?>" />
                                    <p class="help-block text-danger"></p>
                                    <p class="comments"><?php echo $phoneError; ?></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Message</label>
                                    <textarea class="form-control" id="message" rows="5" placeholder="message" required="required" data-validation-required-message="Please enter a message."   value=" <?php  echo $message; ?>" ></textarea>
                                    <p class="help-block text-danger"></p>
                                    <p class="comments"><?php echo $messageError; ?></p>
                                </div>
                            </div>
                            <br />
                            <div id="success"></div>
                            <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit">Envoyer</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    
  <?php
//   if(isset($_POST) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['message'])){

//     extract($_POST);
//     $destinataire = "kouekamjohnson@gmail.com"
//     $expediteur = $name.'<'.$email.'>';
//     $mail = mail($destinataire, $name, $message, $expediteur ': nomexpediteur: Mail de test');
//     if($mail) echo'Email envoyé avec succès!'; else 'echec d envoie de Mail';
//   }else{
//     echo "formulaire non soumi ou des champs sont vides";
//   }
   


?>




  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>


