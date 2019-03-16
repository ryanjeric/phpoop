<?php
  include_once('../class/dbfunction.php');
  require 'mysession.php'; 
        $obj = new dbFunction();
        $id=$_SESSION['id'];
        $account=$obj->myaccount($id);
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

        </script>
    <title>HOME | SUPERADMIN</title>
    </head>
    <body class="white darken-2">
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
    <?php require 'nav.php';?>
              <div class="row">
                  <div class="col m12 white" style="padding:20px">
                      <h1 class="center-align lead"><i class="mdi-action-accessibility"></i>Welcome</h1><hr>
                      <center>
                      <table class="center-align">
                        <tr><td><h4>NAME : <?php echo $account[4] .",".$account[2] ." " .$account[3]; ?></td></tr>
                        <tr><td><h4>Usertype : <?php echo $account[11]; ?></td></tr>
                      </table>
                  </div>
              </div>
    </body>
  </html>