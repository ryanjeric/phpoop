<?php
  include_once('../class/dbfunction.php');
  require 'mysession.php';

  if(isset($_POST['peek'])){
    $id = $_POST['userid'];
    $getdata = new dbFunction();

    $account = $getdata->myaccount($id);
  }
  if(!isset($_POST['peek'])){
    header("Location: manageaccount.php");
  }
?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      <script src="../js/jquery.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
              $("[clk]").click(function(){
                    $('#modal1').openModal();
             });
          });
          function goBack() {
          window.history.back();
          }    
        </script>
    <title>USER INFO| SUPERADMIN</title>
    </head>
    <body class="white darken-2">
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
    <?php require 'nav.php'; ?>
              <div class="row">
                  <div class="col m12 white" style="padding:20px">
                      <h3 class="left-align lead"><i class="mdi-action-accessibility"></i>User Info</h3><hr>
                      <form method=POST>
                      <table>
                        <tr>
                        <td colspan="3"><h5>User Account</h5></td>
                        </tr>
                        <tr>
                          <td class="input-field col s6">
                              <input type="text" name="username" id="disabled" readonly value="<?php echo $account[0]; ?>" />
                              <label for="disabled">Username</label>
                          </td>
                          <td class="input-field col s6">
                              <input type="hidden" name="email2" readonly value="<?php echo $account[5]; ?>" />
                              <input type="email" name="email" id="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,3}$" maxlength="100" length="100" 
                              value="<?php echo $account[5]; ?>" />
                              <label for="email">Email</label>
                          </td> 
                        </tr>
                        <tr>
                          <td colspan="3"><h5>Personal Info</h5></td>
                        </tr>
                        <tr>
                          <td class="input-field col s6">
                              <input type="text" name="fname" readonly id="fname" pattern="[A-Za-z\s]+" required maxlength="30" length="30" value="<?php echo $account[2]; ?>" />
                              <label for="fname">First Name</label>
                          </td>
                          <td class="input-field col s6">
                              <input type="text" name="lname" readonly id="lname" pattern="[A-Za-z\s]+" required maxlength="30" length="30" value="<?php echo $account[4]; ?>" />
                              <label for="lname">Last Name</label>
                          </td> 
                        </tr>
                        <tr>
                          <td class="input-field col s6">
                              <input type="text" name="mname" readonly id="mname" pattern="[A-Za-z\s]+" required maxlength="30" length="30" value="<?php echo $account[3]; ?>" />
                              <label for="mname">Midlle Name</label>
                          </td>
                          <td class="input-field col s6">
                              <input type="text" name="address" readonly id="address" pattern="[A-Za-z0-9#,.\s]+" required maxlength="150" length="150" value="<?php echo $account[6]; ?>" />
                              <label for="address">Address</label>
                          </td> 
                        </tr>
                        <tr>
                          <td class="input-field col s6">
                              <input type="text" name="Company" readonly id="Company" pattern="[A-Za-z\s]+" required maxlength="50" length="50" value="<?php echo $account[7]; ?>" />
                              <label for="Company">Company</label>
                          </td>
                          <td class="input-field col s6">
                              <input type="text" name="Contactno" readonly id="Contactno" pattern="[0-9]{11}" required maxlength="11" length="11" value="<?php echo $account[8]; ?>" />
                              <label for="Contactno">Contact No.</label>
                          </td> 
                        </tr>
                        <tr>
                          <td class="input-field col s6">
                              <input type="text" name="position" readonly id="Position" pattern="[A-Za-z\s]+" maxlength="30" length="30" value="<?php echo $account[9]; ?>" />
                              <label for="Position">Position</label>
                          </td>
                          <td class="input-field col s6">
                              <input type="text" name="usertype" readonly id="usertype" readonly value="<?php echo $account[11]; ?>" />
                              <label for="usertype">Usertype</label>
                          </td>
                        </tr>
                        <tr>                          
                          <td class="input-field col s6">
                            <a onclick="goBack()" class="btn waves-effect waves-yellow lead">
                              BACK<i class="mdi-navigation-arrow-back right"></i>
                            </a>
                          </td>
                        </tr>                     
                        </table>
                        </form>
                  </div>
              </div>
    </body>
  </html>