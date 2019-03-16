<?php
  include_once('../class/dbfunction.php');
  require 'mysession.php'; 
          $obj = new dbFunction();
          $uid = $_GET['userid'];
          $account=$obj->myaccount($uid);
        
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
    <title>Edit User | SUPERADMIN</title>
    </head>
    <body class="white darken-2">
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
    <?php require 'nav.php'; ?>
  <?php
    if(isset($_POST['update']))
        {
         $email = $_POST['email'];
         $email2 = $_POST['email2'];
         $pass = $_POST['Password'];
         $repass = $_POST['REPassword'];
         $fname = $_POST['fname'];
         $lname = $_POST['lname'];
         $mname = $_POST['mname'];
         $address = $_POST['address'];
         $Company = $_POST['Company'];
         $Contactno = $_POST['Contactno'];
         $position = $_POST['position'];
         $status = $_POST['stat'];
         
         $function = new dbFunction();

         $md5pass = md5($pass);
         $md5repass = md5($repass);
         if(strlen($pass)<4 and strlen($pass)!=NULL){
          ?>
                <script>Materialize.toast('Password Should be at least 5 characters long!', 4000)</script>
          <?php
         }
         else if($md5pass == $md5repass) {
            $emailcheck = $function->checkemail($email,$email2);
            if(!$emailcheck){
              $action = $function->updatemyaccount($uid,$email,$pass,$fname,$lname,$mname,$address,$Company,$Contactno,$position,$status);
              if($action){        
                echo'<script type="text/javascript">alert("UPDATE SUCCESSFULL");</script>';
                echo'<script language="JavaScript"> window.location.href ="editinfo.php?userid='.$uid.'" </script>';
               }
               else{
                ?>
                <script>Materialize.toast('No Update!', 4000)</script>
                <?php
               }

            }
            else{
              ?>
                <script>Materialize.toast('Email Already Exist!', 4000)</script>
                <?php
            }
            
         }
         else
         {
          ?>
          <script>Materialize.toast('Confirm Password not Match!', 4000)</script>
          <?php
         }
        }
  ?>
              <div class="row">
                  <div class="col m12 white" style="padding:20px">
                      <h3 class="left-align lead"><i class="mdi-action-accessibility"></i>Update this Account</h3><hr>
                      <form method=POST>
                      <table>
                        <tr>
                        <td colspan="3"><h5>User Account</h5></td>
                        </tr>
                        <tr>
                          <td class="input-field col s6">
                              <input type="hidden" name="useridz" value=<?php echo $uid; ?> />
                              <input type="text" name="username" id="disabled" readonly value="<?php echo $account[0]; ?>" />
                              <label for="disabled">Username</label>
                          </td>
                          <td class="input-field col s6">
                              <input type="hidden" name="email2" value="<?php echo $account[5]; ?>" />
                              <input type="email" name="email" id="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,3}$" maxlength="100" length="100" 
                              value="<?php echo $account[5]; ?>" />
                              <label for="email">Email</label>
                          </td> 
                        </tr>
                        <tr>               
                          <td class="input-field col s6">
                              <input type="password" name="Password" id="pass" pattern="[A-Za-z0-9]+" value="" maxlength="25" length="25" />
                              <label for="pass">Change Password</label>
                          </td>
                          <td class="input-field col s6">
                              <input type="password" name="REPassword" id="repass" pattern="[A-Za-z0-9]+" value="" maxlength="25" length="25" />
                              <label for="repass">Re-type Password</label>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="3"><h5>Personal Info</h5></td>
                        </tr>
                        <tr>
                          <td class="input-field col s6">
                              <input type="text" name="fname" id="fname" pattern="[A-Za-z\s]+" required maxlength="30" length="30" value="<?php echo $account[2]; ?>" />
                              <label for="fname">First Name</label>
                          </td>
                          <td class="input-field col s6">
                              <input type="text" name="lname" id="lname" pattern="[A-Za-z\s]+" required maxlength="30" length="30" value="<?php echo $account[4]; ?>" />
                              <label for="lname">Last Name</label>
                          </td> 
                        </tr>
                        <tr>
                          <td class="input-field col s6">
                              <input type="text" name="mname" id="mname" pattern="[A-Za-z\s]+" required maxlength="30" length="30" value="<?php echo $account[3]; ?>" />
                              <label for="mname">Midlle Name</label>
                          </td>
                          <td class="input-field col s6">
                              <input type="text" name="address" id="address" pattern="[A-Za-z0-9#,.\s]+" required maxlength="150" length="150" value="<?php echo $account[6]; ?>" />
                              <label for="address">Address</label>
                          </td> 
                        </tr>
                        <tr>
                          <td class="input-field col s6">
                              <input type="text" name="Company" id="Company" pattern="[A-Za-z\s]+" required maxlength="50" length="50" value="<?php echo $account[7]; ?>" />
                              <label for="Company">Company</label>
                          </td>
                          <td class="input-field col s6">
                              <input type="text" name="Contactno" id="Contactno" pattern="[0-9]{11}" required maxlength="11" length="11" value="<?php echo $account[8]; ?>" />
                              <label for="Contactno">Contact No.</label>
                          </td> 
                        </tr>
                        <tr>
                          <td class="input-field col s6">
                              <input type="text" name="position" id="Position" pattern="[A-Za-z\s]+" maxlength="30" length="30" value="<?php echo $account[9]; ?>" />
                              <label for="Position">Position</label>
                          </td>
                          <td class="input-field col s6">Status
                              <p>
                                  <input name="stat" class="with-gap" type="radio" <?php  if($account[10]=='ACTIVE'){ echo'checked'; }   ?> id="test1" value="ACTIVE" />
                                  <label for="test1">Active</label>           
                                  <input name="stat" class="with-gap" type="radio"  <?php  if($account[10]=='DEACTIVATE'){ echo'checked'; }   ?> id="test2" value="DEACTIVATE" />
                                  <label for="test2">Deactivate</label>
                              </p>
                          </td>
                        </tr>
                        <tr>                          
                          <td class="input-field col s6">
                            <a clk class="btn waves-effect waves-yellow lead">
                                 Update<i class="mdi-action-system-update-tv right"></i>
                            </a>

                            <div id="modal1" class="modal">
                                  <div class="modal-content">
                                    <h4>Update Account</h4>
                                    <p>Are you sure?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <a class="modal-action modal-close waves-effect waves-green btn-flat">NO<i class="mdi-content-clear right"></i></a>
                                     <button type="submit" name="update" class="btn-flat waves-effect waves-green">Yes 
                                    <i class="mdi-action-system-update-tv right"></i>
                                  </button>                                 
                              </div>
                            </div>
                            <a href='manageaccount.php' class="btn waves-effect waves-yellow lead">
                              Cancel<i class="mdi-content-clear right"></i>
                            </a>
                          </td>
                        </tr>                     
                        </table>
                        </form>
                  </div>
              </div>
    </body>
  </html>