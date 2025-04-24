<?php
       session_start();
       if(!isset($_SESSION["studentname"]))
       {
           echo"<script>open('../signin.php','_self')</script>";   
       }
       
       if(!isset($_SESSION["id"]) )
       {
           echo"<script>open('../signin.php','_self')</script>";   
       }

       if(!isset($_SESSION["subjectname"]))
       {
           echo"<script>open('../signin.php','_self')</script>";   
       }

       if(!isset($_SESSION["questionset"]))
       {
           echo"<script>open('../signin.php','_self')</script>";   
       }
?>

<!DOCTYPE html>
<html lang="">
       <head>
              <meta charset="utf-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <title>Title Page</title>
              <link rel="icon" href="../images/logo.png" type="png/x-icon" />
              <!-- Bootstrap CSS -->
              <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
              <!-- jQuery -->
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
              <!-- Bootstrap JavaScript -->
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
              <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
              <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
              <!--[if lt IE 9]>
                     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
                     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
              <![endif]-->
              <style>
                     .stdpage1{
                            width: 100%;
                            height: 510px;
                          
                     }
                     .user3{
                          
                          
                            top: 100px;
                            padding: 20px;
                            background-color: white;
                            border-radius: 20px;
                            box-shadow: 1px 1px 10px black;
                            overflow: scroll;
                          
                     }
                     form #question{
                            font-weight: bold;
                     }
                     ::-webkit-scrollbar {
                            display: none;
                     }
                    
              </style>
       </head>
       <body style="background-image: url('images/startpagebackgr.jpg'); background-size: 100% 100%;">
              
              <?php
                     require("dbcon.php");
                     include("../header/header.php");
                     $subjectid=$_SESSION["id"];
                     $subjectname=$_SESSION["subjectname"];
                     $set= $_SESSION["questionset"];
                     
              ?>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 stdpage1">
                     
                    
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                     
                    </div>
                    
                     
                     <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8 user3">
                            
                            <table class="table table-bordered table-responsive table-hover">
                                   <thead>
                                          <tr>
                                                 <th>Q.No</th>
                                                 <th>Question</th>
                                                 <th>You-Selected</th>
                                                 <th>Answer</th>
                                                 <th>Marks</th>
                                          </tr>
                                   </thead>
                                   <tbody>
                                        <?php
                                         $one=1;
                                         $zero=0;
                                         $countmarks=0;
                                         $countwmarks=0;
                                          $sql="select * from tbltemp";
                                          $res=mysqli_query($link,$sql);
                                          if(mysqli_num_rows($res)>0)
                                          {
                                                 while($row=mysqli_fetch_array($res))
                                                 {
                                                      
                                                        echo "<tr>";
                                                        echo "<td>".$row[3]; "</td>";
                                                        $totalque=$row[3];
                                                        echo "<td>".$row[4]; "</td>";
                                                        echo "<td>".$row[5]; "</td>";
                                                        echo "<td>".$row[6]; "</td>";
                                                        if($row[5]==$row[6])
                                                        {
                                                           echo "<td>" .$one; "</td>";
                                                           $countmarks=$countmarks+1;
                                                        }
                                                        else
                                                        {
                                                           echo "<td style='color: red'>" .$zero; "</td>";
                                                           $countwmarks=$countwmarks+1;
                                                        }
                                                        echo "</tr>";
                                                 }
                                          }
                                        ?>
                                   </tbody>
                            </table>
                          
                            <p>Total Question :- <b><?php echo $totalque ?></b></p>
                            <p>Total Marks :- <b><?php echo $totalque ?> </b></p>
                            <p>Wrong Answer :- <b><?php echo $countwmarks ?> </b></p>
                            <p>Right Answer :- <b><?php echo $countmarks ?> </b></p>
                            <p>Obtained Marks :- <b><?php echo $countmarks ?></b></p>

                            <!-- <button type="button" class="btn btn-danger btn-block" onclick="destroy()">Exit</button> -->

                            <a href="../savepages/destroyresult.php?btnsavename=&totalque=<?php echo $totalque; ?>&wrongans=<?php echo $countwmarks; ?> &rightans=<?php echo $countmarks; ?>" type="button" class="btn btn-danger btn-block">
                                   <span aria-hidden="true">Exit</span>
                            </a>
                     </div>
                     
                     
                     <script>
                            function destroy()
                            {
                                   open("../savepages/destroyresult.php","_self");
                            }
                     </script>
                            
                          
                            
                    
              </div>
              
            
              <!-- jQuery -->
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
              <!-- Bootstrap JavaScript -->
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       </body>
</html>
