<?php
  include_once('../class/dbfunction.php');
  require 'mysession.php'; 
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
              $("[clr]").click(function(){
                    $("[name=username]").val('');
                    $("[name=email]").val('');
                    $("[name=Password]").val('');
                    $("[name=REPassword]").val('');
                    $("[name=fname]").val('');
                    $("[name=mname]").val('');
                    $("[name=lname]").val('');
                    $("[name=position]").val('');
                    $("[name=address]").val('');
                    $("[name=Company]").val('');
                    $("[name=Contactno]").val('');
             });
          });             
        </script>
    <title>Add User | SUPERADMIN</title>
    </head>
    <body class="white darken-2">
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
    <?php require 'nav.php'; ?>
  <?php
    if(isset($_POST['add'])){
         $username = $_POST['username'];
         $email = $_POST['email'];
         $pass = $_POST['Password'];
         $repass = $_POST['REPassword'];
         $fname = $_POST['fname'];
         $lname = $_POST['lname'];
         $mname = $_POST['mname'];
         $address = $_POST['address'];
         $Company = $_POST['Company'];
         $Contactno = $_POST['Contactno'];
         $position = $_POST['position'];
         $Status = $_POST['stat'];

         $function = new dbFunction();

         $md5pass = md5($pass);
         $md5repass = md5($repass);

         if(strlen($pass)<4){
          ?>
                <script>Materialize.toast('Password Should be at least 5 characters long!', 4000)</script>
          <?php
         }
         else if($md5pass == $md5repass){
            $emailcheck = $function->email($email);
            $usernamecheck = $function->user($username);
            if ($usernamecheck){
                ?>
                <script>Materialize.toast('Username Already Exist!', 4000)</script>
                <?php
            }
            else if($emailcheck){
                ?>
                <script>Materialize.toast('Email Already Exist!', 4000)</script>
                <?php
            }
            
            else{
              $Add = $function->adduser($username,$email,$pass,$fname,$lname,$mname,$address,$Company,$Contactno,$position,$Status);
                if($Add){        
                  echo'<script type="text/javascript">alert("ADD USER SUCCESSFULL");</script>';
                  echo'<script language="JavaScript"> window.location.href ="adduser.php" </script>';
                }
                else{
                  ?>
                  <script>Materialize.toast('USER NOT ADDED!', 4000)</script>
                  <?php
                }
            }
        }
        else{
          ?>
          <script>Materialize.toast('Confirm Password not Match!', 4000)</script>
          <?php
        }
}


  ?>
              <div class="row">
                  <div class="col m12 white" style="padding:20px">
                      <h3 class="left-align lead"><i class="mdi-social-people-outline left"></i>ADD USER</h3><hr>
                   <form method=POST>
                      <table>
                        <tr>
                        <td colspan="3"><h5>User Account</h5></td>
                        </tr>
                        <tr>
                          <td class="input-field col s6">
                              <input type="text" name="username" required pattern="[A-Za-z0-9]+" id="user" maxlength="25" length="25" />
                              <label for="user">Username</label>
                          </td>
                          <td class="input-field col s6">
                             
                              <input type="email" name="email" id="email" required pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,3}$" maxlength="100" length="100" />
                              <label for="email">Email</label>
                          </td> 
                        </tr>
                        <tr>               
                          <td class="input-field col s6">
                              <input type="password" name="Password" id="pass" required pattern="[A-Za-z0-9]+" maxlength="25" length="25" />
                              <label for="pass">Password</label>
                          </td>
                          <td class="input-field col s6">
                              <input type="password" name="REPassword" id="repass" required pattern="[A-Za-z0-9]+" maxlength="25" length="25" />
                              <label for="repass">Re-type Password</label>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="3"><h5>Personal Info</h5></td>
                        </tr>
                        <tr>
                          <td class="input-field col s6">
                              <input type="text" name="fname" id="fname" required pattern="[A-Za-z\s]+" maxlength="30" length="30" />
                              <label for="fname">First Name</label>
                          </td>
                          <td class="input-field col s6">
                              <input type="text" name="lname" id="lname" required pattern="[A-Za-z\s]+" maxlength="30" length="30" />
                              <label for="lname">Last Name</label>
                          </td> 
                        </tr>
                        <tr>
                          <td class="input-field col s6">
                              <input type="text" name="mname" id="mname" required pattern="[A-Za-z\s]+" maxlength="30" length="30" />
                              <label for="mname">Midlle Name</label>
                          </td>
                          <td class="input-field col s6">
                              <input type="text" name="address" id="address" required pattern="[A-Za-z0-9#,.\s]+" maxlength="150" length="150" />
                              <label for="address">Address</label>
                          </td> 
                        </tr>
                        <tr>
                          <td class="input-field col s6">
                              <input type="text" name="Company" id="Company" required pattern="[A-Za-z\s]+" maxlength="50" length="50" />
                              <label for="Company">Company</label>
                          </td>
                          <td class="input-field col s6">
                              <input type="text" name="Contactno" id="Contactno" required pattern="[0-9]{11}" maxlength="11" length="11" />
                              <label for="Contactno">Contact No.</label>
                          </td> 
                        </tr>
                        <tr>
                          <td class="input-field col s6">
                              <input type="text" name="position" required id="Position" maxlength="30" length="30" />
                              <label for="Position">Position</label>
                          </td>
                          <td class="input-field col s6">Status
                              <p>
                                  <input name="stat" class="with-gap" type="radio" checked id="test1" value="ACTIVE" />
                                  <label for="test1">Active</label>           
                                  <input name="stat" class="with-gap" type="radio" id="test2" value="DEACTIVATE" />
                                  <label for="test2">Deactivate</label>
                              </p>
                          </td>
                        </tr>
                        <tr>                          
                          <td class="input-field col s6">
                            <a clk class="btn waves-effect waves-yellow lead">
                                 Add<i class="mdi-content-add right"></i>
                            </a>

                            <div id="modal1" class="modal">
                                  <div class="modal-content">
                                    <h4>Add this Account?</h4>
                                    <p>Are you sure?</p>
                                  </div>
                                  <div class="modal-footer">
                                    <a class="modal-action modal-close waves-effect waves-green btn-flat">NO<i class="mdi-content-clear right"></i></a>
                                     <button type="submit" name="add" class="btn-flat waves-effect waves-green">Yes 
                                    <i class="mdi-action-add right"></i>
                                  </button>                                 
                              </div>
                            </div>
                            <a clr class="btn waves-effect waves-yellow lead">
                              RESET<i class="mdi-content-undo right"></i>
                            </a>
                            <a href="manageaccount.php" class="btn waves-effect waves-red lead">
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