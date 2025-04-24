<?php
       require("dbcon.php");
       session_start();
       $subjectid=$_SESSION["id"];
       $subjectname=$_SESSION["subjectname"];
       $set= $_SESSION["questionset"];
       $stdname= $_SESSION["studentname"];

       if(isset($_GET["btnsavename"]))
       {
              $totalque=$_GET["totalque"];
              $totalmarks=$_GET["totalque"];
              $wrongans=$_GET["wrongans"];
              $rightans=$_GET["rightans"];
              $obtmarks=$_GET["rightans"];
              $sql="insert into tblexamuser values('$stdname','$subjectid','$subjectname','$set','$totalque','$totalmarks','$wrongans','$rightans','$obtmarks')";
              if(mysqli_query($link,$sql))
              {
                     echo "<script>alert('Thank You...')</script>";
              }
       
       }

       $sql="truncate tbltemp";
       if(mysqli_query($link,$sql))
       {
              unset($_SESSION["id"]);
              unset($_SESSION["subjectname"]);
              unset($_SESSION["questionset"]);
              unset($_SESSION["count"]);
              echo "<script>open('../master/subjects.php','_self')</script>";
       }

?>