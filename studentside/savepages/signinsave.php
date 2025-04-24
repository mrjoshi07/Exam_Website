<?php
       require("dbcon.php");
       session_start();
       if(isset($_SESSION["studentname"]))
       {
              if($_SESSION["usertype"]=="Student")
              {
                     echo"<script>alert('Welcome Student')</script>";
                     echo"<script>open('../master/subjects.php','_self')</script>";
              }
       }
       else if(isset($_POST["btnstudentlogin"]))
       {
            
              $logid=trim($_POST["txtstudentid"]);
              $password=trim($_POST["txtstudentpass"]); 
              $sql="select id,usertype,name,mobile from tblsignup where mobile='$logid' and password='$password'";
              $res=mysqli_query($link,$sql);
              if(mysqli_num_rows($res)>0) 
              { 
                    
                     if($row=mysqli_fetch_array($res))
                     {
                            
                            $text=$row["usertype"];
                            $trimmed=trim($text);
                           
                            if($trimmed=="Student")
                            {
                            
                                   $_SESSION["usertype"]=$trimmed;
                                   $_SESSION["studentname"]=$row["name"]; 
                                   $_SESSION["studentid"]=$row["id"];
                                   echo"<script>alert('Welcome Dear ')</script>";
                                   echo"<script>open('../master/subjects.php','_self')</script>";
                                
                            }
                            else
                            {
                                   echo"<script>alert('Invalid Logid & Password')</script>";
                                   echo"<script>open('../signin.php','_self')</script>";
                            }
                     }
                 
              }
              else
              {
                     echo"<script>alert('Inavalid id or password')</script>";
                     echo"<script>open('signin.php','_self')</script>";
              }
       }
?>