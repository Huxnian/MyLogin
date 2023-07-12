<?php
//session_start();
if(isset($_SESSION['loggedin']) && $_SESSION ['loggedin']== true){
  $loggedin = true;
}else{
  $loggedin = false;
}


       echo '<nav class="navbar navbar-expand-lg bg-dark text-white">
          <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">!Secure</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">';
            if($loggedin){
               echo' <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="/MyLogin/Home.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <li class="nav-item">
                      <a class="nav-link text-white" href="/MyLogin/Log-out.php">Log-Out</a>
                    </li>';}
             else{
                   echo '<a class="nav-link mx-4" href="/MyLogin/Sign-Up.php">Sign-Up</a>
                  </li>

                  <li class="nav-item list-unstyled">
                    <a class="nav-link" href="/MyLogin/Log-In.php">Log-In</a>
                  </li>
                </ul>';}

          echo ' </div>
          </div>
        </nav>';


?>




