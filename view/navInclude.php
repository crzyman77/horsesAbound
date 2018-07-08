  <!-- Navigation -->
  <style>
      .navbar .navbar-expand-lg .navbar-dark .bg-dark .fixed-top .coloroverride{
          background-color:#ff6a99 !important;
      }
         
     .nav-item .nav-link .newColor {
          color:white !important;
      }
      .nav-item .nav-link:hover{
          color: #ff6a99 !important;
      }
   
  </style>
    <nav id="myNav" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top coloroverride">
      <div class="container">
        <a style = 'color:#ff6a99 !important;'class="navbar-brand" href="#">Kelli's C.R.U.S.A.D.E</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">  <a class="nav-link newColor" href="../controller/controller.php?action=Register">Kelli Baker Memorial Registration   </a> </li>
            <?php if (userIsAuthorized("CheckInRiders")) { ?>
            <li class="nav-item"> <a class="nav-link newColor" href="../controller/controller.php?action=CheckIn"> Check In Rider   </a> </li>
            <?php } ?>
            <?php if (userIsAuthorized("Placing")) { ?>
            <li class="nav-item">  <a class="nav-link newColor" href="../controller/controller.php?action=Placing"> Place a Class</a> </li>
            <?php } ?>
                        <?php if (userIsAuthorized("ViewJudgeResults") ) { ?>
            <li class="nav-item">  <a class="nav-link newColor" href="../controller/controller.php?action=Results">Class Results </a> </li>
            <li class="nav-item">  <a class="nav-link newColor" href="../controller/controller.php?action=HighPoint">High Point </a> </li>
            <li class="nav-item">  <a class="nav-link newColor" href="../controller/controller.php?action=GrandChamp">Best in Show </a> </li>
            <?php } ?>
                        <?php if (userIsAuthorized("ViewGeneralScoring")) { ?>
            <li class="nav-item">  <a class="nav-link newColor" href="../controller/controller.php?action=RiderScores">Division Scores </a> </li>
            <?php } ?>
                        <?php if (userIsAuthorized("ViewRiderLineUp")) { ?>
            <li class="nav-item">  <a class="nav-link newColor" href="../controller/controller.php?action=ClassRiders">Class Line Up</a> </li>
                        <?php }
               if (!loggedIn()) {
                   echo "<li class=\" nav-item \"><a class=\"nav-link newColor\" href='../security/index.php?action=SecurityLogin&RequestedPage=" . urlencode($_SERVER['REQUEST_URI'])  .  "'>Admin Log In</a></li>";
               }else {
                   echo "<li class=\" nav-item\"><a class=\"nav-link newColor\" href='../security/index.php'>User Management</a></li>"
                   . "<li class=\" nav-item \"><a  class=\"nav-link newColor\" href='../security/index.php?action=SecurityLogOut&RequestedPage=" . urlencode($_SERVER['REQUEST_URI'])  .  "'>Log Out (" . $_SESSION['UserName'] . ") </a></li>";
               } ?>

            <!--<li class="nav-item">  <a class="nav-link " href="../controller/controller.php?action=Contact">Contact                   </a> </li> -->
          </ul>
        </div>
      </div>
    </nav>