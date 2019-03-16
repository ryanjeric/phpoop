<?php
  include_once('../class/dbfunction.php');
  require 'mysession.php'; 
        if(!isset($_GET['search'])){
          header("location: manageaccount.php");
        }
        if(isset($_POST['delete'])){
         $uid = $_GET['delete'];

         $delete = new dbfunction();
         $del = $delete->delete($uid);

         if ($del){
                ?>
                <script>Materialize.toast('Account Deleted', 4000)</script>
                <?php
          }
          else{
            ?>
                <script>Materialize.toast('Account Not Deleted', 4000)</script>
                <?php
          }

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
              $("[rst]").click(function(){
                    $("[name=search]").val('');
             });
         
          });             

        </script>
    <title>SEARCH RESULT | SUPERADMIN</title>
    </head>
    <body class="white darken-2">
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
               <?php include('nav.php');
                $get=$_GET['search'];
                ?>
              <div class="row">
                  <div class="col m12 white" style="padding:20px">
                      <h3 class="left-align lead"><i class="mdi-social-people-outline left"></i>User/s Account</h3><hr>
                  </div>
                  <div class="col m12 white">
                       <form method=GET name='SEARCH'>
                          <div class="row">
                            <div class="input-field col s12">
                              <i class="mdi-action-search prefix"></i>
                              <input id="icon" type="text" name="search" class="validate" maxlength="25" value='<?php echo $get; ?>'>
                              <label for="icon">SEARCH</label>
                              <a href="manageaccount.php" class="waves-effect waves-red btn" rst style="margin-right:20px">CLEAR SEARCH</a>
                        </form>
                        <a href="adduser.php" class="waves-effect waves-green btn right" style="margin-right:20px">ADD USER</a>  
                  </div>
                  <div class="col m12 white">
                  <?php


                    $pag = new dbfunction();

                    $query = mysql_query("SELECT * FROM user where username LIKE '$get%' or lname LIKE '$get%' or fname LIKE '$get%' ") or die(mysql_error());
                    $numrows = mysql_num_rows($query); 

                    if($numrows==0)
                    {
                      echo"<br><center><h1>NO RESULT</h1></center>";
                    }
                    else
                    {
                      include('fetch.php');

                      $counter = count($userid);
                    for($x=0;$x<$counter;$x++)
                    {
                      echo "<tr>
                      <td>".$userid[$x]."</td>
                      <td>". $username[$x] ."</td>
                      <td>". $lname[$x] .",". $fname[$x] ." " .$mname[$x]. "</td>
                      <td>". $datecreated[$x] ."</td>
                      <td>". $position[$x] ."</td>
                      <td>". $status[$x] ."</td>
                      <td>";


                      if($usertype[$x]=='SUPERADMIN')
                      {
                        echo"<form method=POST action='userinfo.php' class='left'>
                        <input type='hidden' name='userid' value=".$userid[$x]." />
                        <button type='submit' name='peek' class='btn-floating btn-small waves-effect waves-light green' style='margin-right:10px'><i class='mdi-action-done'></i></button>
                      </form>[SUPER ADMIN]";
                      }
                      else{
                      echo"
                      <form method=POST action='userinfo.php' class='left'>
                        <input type='hidden' name='userid' value=".$userid[$x]." />
                        <button type='submit' name='peek' class='btn-floating btn-small waves-effect waves-light green' style='margin-right:10px'><i class='mdi-action-done'></i></button>
                      </form>
                      <form method=POST action='editinfo.php?userid=".$userid[$x]."' class='left'>
                        <button type='submit' name='edit' class='btn-floating btn-small waves-effect waves-light orange' style='margin-right:10px'><i class='mdi-editor-mode-edit'></i></button>
                      </form>
                      <form method=POST id=".$userid[$x]." class='left' action='manageaccount.php?delete=".$userid[$x]."'>";
                      ?>                     
                        <span onclick="return confirm('Are you sure you want to delete this Account?')"><button type='submit' name='delete' class='btn-floating btn-small waves-effect waves-light red' style='margin-right:10px'><i class='mdi-navigation-close'></i>
                        </button></span>  
                      <?php

                      echo "</form>";
                      }
                      echo"
                      </td>
                      </tr>";                   
                    }


                    echo"</table><ul class=\"pagination right\">";
                      foreach($numbers as $num){ 
                    echo '<li class="waves-effect teal"><a href="searchresult.php?page='.$num.'&search='.$get.'" style="color:white">'.$num.'</a></li>';
                    }
                    echo "</ul>";
                    }
                
                  ?>
                  </div>
              </div>
    </body>
  </html>