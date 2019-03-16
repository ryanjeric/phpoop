<script type="text/javascript">
        $(document).ready(function(){
              $(".button-collapse").sideNav();
          });             
        </script>
<div class="navbar-fixed">
<nav>
    <div class="nav-wrapper green darken-3 ">
      <a href="index.php" class="brand-logo" style='margin-left:20px'><i class="mdi-maps-directions-walk large"></i></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
      <ul class="right hide-on-med-and-down">
        <li>
          <a href="index.php" class="waves-effect waves-yellow lead">
            HOME<i class="mdi-action-home right"></i>
          </a>
        </li>
        <li>
          <a href="managemyaccount.php" class="waves-effect waves-yellow lead">
            MY ACCOUNT<i class="mdi-action-accessibility right"></i>
          </a>
        </li>
        <li>
          <a href="manageaccount.php" class="waves-effect waves-yellow lead">
            USER/S ACCOUNT<i class="mdi-social-people-outline right"></i>
          </a>
        </li>
        <li>
          <form id="logout" name="logout" method="POST" action="">
            <input type="hidden" name="logout">
            <a href="#" onclick="document.forms['logout'].submit();" class="waves-effect waves-red lead">
            Sign-out
            <i class="mdi-content-backspace right"></i>
            </a>
          </form>
        </li>
      </ul>
    <!-- MOBILE -->
      <ul class="side-nav" id="mobile-demo">
        <li>
          <a href="index.php" class="waves-effect waves-yellow lead">
            HOME<i class="mdi-action-home right"></i>
          </a>
        </li>
        <li>
          <a href="managemyaccount.php" class="waves-effect waves-yellow lead">
            MY ACCOUNT<i class="mdi-action-accessibility right"></i>
          </a>
        </li>
        <li>
          <a href="manageaccount.php" class="waves-effect waves-yellow lead">
            USER/S ACCOUNT<i class="mdi-social-people-outline right"></i>
          </a>
        </li>
        <li>
          <form id="logout" name="logout" method="POST" action="">
            <input type="hidden" name="logout">
            <a href="#" onclick="document.forms['logout'].submit();" class="waves-effect waves-red lead">
            Sign-out
            <i class="mdi-content-backspace right"></i>
            </a>
          </form>
        </li>
      </ul>










    </div>
  </nav>
   </div>