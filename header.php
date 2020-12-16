<?php 

// session_start();
// $_SESSION["nom"]= "déconnexion";

?>
  
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">Kouekam Karim Johnson</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../../index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../index.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php" >Formations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">Expériences</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../contact.php">Contact</a>
            </li>
            <!-- <li class="nav-item">
            <a class="nav-link"  href="login.php"><?= isset($_SESSION['email']) ? $_SESSION['email'] : "Connexion"; ?></a>
          </li> -->
          </li>
        </ul>
      </div>
    </div>
  </nav>