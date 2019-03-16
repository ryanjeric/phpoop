<?php
	while($row=mysql_fetch_assoc($query))
                    {
                      $userid[] = $row['id'];
                      $username[] = $row['username'];
                      $lname[] = $row['lname'];
                      $fname[] = $row['fname'];
                      $mname[] = $row['mname'];
                      $datecreated[] = $row['datecreated'];
                      $position[] = $row['position'];
                      $status[] = $row['status'];
                      $usertype[] = $row['usertype'];
                    }

                   
                    $numbers = $pag->paginate(
                      $userid,
                      $username,
                      $lname,
                      $fname,
                      $mname,
                      $datecreated,
                      $position,
                      $status,
                      $usertype,
                      5);
                    $userid = $pag->userid();
                    $username = $pag->username();
                    $lname = $pag->lname();
                    $fname = $pag->fname();
                    $mname = $pag->mname();
                    $datecreated = $pag->datecreated();
                    $position = $pag->position();
                    $status = $pag->status();
                    $usertype = $pag->usertype();

                    echo"<br><br><table class=\"bordered responsive-table\">
                    <thead>
                         <tr>
                             <th data-field=\"userid\">USER ID</th>
                             <th data-field=\"Username\">User Name</th>
                             <th data-field=\"name\">Name</th>
                             <th data-field=\"datecreated\">Date Created</th>
                             <th data-field=\"position\">Position</th>
                             <th data-field=\"status\">Status</th>
                             <th data-field=\"control\">Control</th>
                         </tr>
                       </thead>";
?>