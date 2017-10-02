

<!-- HEADER KA WEYN -->
  <header class="main-header">
<!------------------------->
    <!-- LOGO DA SHIRKADA -->
    <a  class="logo">
      
      <span class="logo-lg"><b>SAHAL</b> GAS</span>
    </a>
<!------------------------->
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!------------------------>
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!------------------------>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
 <!-- User Account Menu -->
          <li class="dropdown user user-menu">
          <?php if (isset($_SESSION["username"])): ?>
                      
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="images/admin-user.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs" style="text-transform: uppercase; font-weight: bold;"><?php echo $_SESSION['username']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- WAA USER IMAGE KIISA EE MENU GA -->
              <li class="user-header">
                <img src="images/admin-user.png" class="img-circle" alt="User Image">

                <p>
                  ENG WAGAD & ENG KULMIYE - Web Developers
                  <small>We develop Sahal Gas Software</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
              
                      
                <div class="pull-right">
                  <a href="index.php?logout='1'" class="btn btn-default btn-flat">Log out</a>

                </div>
                
              </li>
              
            </ul>
            <?php endif ?>
          </li>
<!------------------------>
        
        </ul>
      </div>
    </nav>


    <!------------------------>
  </header>