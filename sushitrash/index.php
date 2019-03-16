
<!DOCTYPE html>
  <html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      <script src="js/jquery.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
              $("[name=reset]").click(function(){
                    $("[name=username]").val('');
                    $("[name=password]").val('');
             });
          });             

        </script>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <title>EXAM</title>
    </head>
    <body class="green darken-3">
              <?php
                ob_start();
                include_once('class/dbfunction.php');

                $obj1 = new dbFunction();
                if(isset($_POST['login'])){
                  $username = $_POST['username'];
                  $password = $_POST['password'];

                  $user = $obj1->Login($username, $password);
                  if(!$user){
                    echo "<script>Materialize.toast('USERNAME AND PASSWORD NOT MATCH!', 4000)</script>";
                  }
                }
                
                if(isset($_SESSION['SUPERADMIN'])){
                  header("Location:SUPERADMIN/index.php");  
                }
                if(isset($_SESSION['ADMIN'])){
                  header("Location:ADMIN/index.php");  
                }
              ?>
              <div class="row">
                  <div class="col m4 offset-m4 white" style="margin-top:60px;padding:20px">
                      <h3 class="center-align"><i class="mdi-action-accessibility lead"></i>LOG-IN</h3>
                      <form name="login" method="POST">
                          <table>
                          <tr>
                            <td class="input-field col s12">
                                <input type="text" name="username" required pattern="[A-Za-z0-9]+" maxlength="30" class="validate" id="user" />
                                <label for="user">Username</label>
                            </td>
                          </tr>
                          <tr>
                            <td class="input-field col s12">
                                <input id="password" name="password" type="password" pattern="[A-Za-z0-9]+" maxlength="30" required class="validate" />
                                <label for="password">Password</label>
                            </td>
                          </tr>
                          <tr>
                            <td>
                                <button type="submit" name="login" class="btn waves-effect waves-light">
                                  Sign-in <i class="mdi-content-send right"></i>
                                </button>    

                                <button type="button" name="reset" class="btn waves-effect waves-light">
                                  Reset <i class="mdi-notification-sync right"></i>
                                </button>
                            </td>
                          </tr>
                      </form>
                  </div>
              </div>
    </body>
  </html>