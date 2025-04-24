<?php
       session_start();
       if(!isset($_SESSION["studentname"]))
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
                     }
                     @media screen and (max-width:400px){
                            .user3{
                                   top:130px;
                            }
                     }
                    
              </style>
       </head>
       <body style="background-image: url('images/startpagebackgr.jpg'); background-size: 100% 100%;">
              
              <?php
                     include("../header/header.php");
                     include("../header/menubar.php");
                     include("../savepages/search.php");
                     $subjectid=$_SESSION["id"];
                     $subjectname=$_SESSION["subjectname"];
                     
              ?>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 stdpage1">
                     
                     
                     <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            
                     </div>
                     
                     <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 user3" >
                            
                            <form action="" method="POST" role="form">
                                   <div class="form-group">
                                          <label for="">Subject</label>
                                          <input type="text" class="form-control" id="" placeholder="Input field" value="<?php echo $subjectname; ?>" readonly>
                                   </div>
                                  
                             </form> 
                                 
                         <hr>
                           
                           <table class="table table-bordered ">
                            <thead>
                                   <tr>
                                          <th>Question-Set</th>
                                          <th>Option</th>
                                   </tr>
                            </thead>
                            <tbody>
                                  <?php
                                          require("dbcon.php");
                                          $sql="select *from tblquestionset where trim(id)='$subjectid' and trim(subjects)='$subjectname'";
                                          $res=mysqli_query($link,$sql);
                                          if(mysqli_num_rows($res)>0)
                                          {
                                                 while($row=mysqli_fetch_array($res))
                                                 {
                                                        echo"<tr>";
                                                        echo"<td>".$row[2]; "</td>";
                                                        ?>
                                                        <td>
                                                           <a href="questionpaper.php" type="button" class="btn btn-success">
                                                          <span aria-hidden="true">Get-Paper</span></a> 
                                                        </td>    
                                                        <?php
                                                        echo"</tr>";
                                                 }
                                          }


                                  ?>
                            </tbody>
                           </table>
                           
                            
                     </div>
                     
                     
              </div>
              
            
              <!-- jQuery -->
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
              <!-- Bootstrap JavaScript -->
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       </body>
</html>
