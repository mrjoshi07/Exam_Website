<?php
       session_start();
       require("dbcon.php");
       $subjectid=$_SESSION["id"];
       $subjectname=$_SESSION["subjectname"];
       $set= $_SESSION["questionset"];
       $count=$_SESSION["count"];
       if(isset($_POST["btnsub"]))
       {
             
              $question=$_POST["question"];
              $option=$_POST["A$count"];
              $correctans=$_POST["correctans"];
              $sql="select *from tbltemp where questionno='$count' and id='$subjectid' and subject='$subjectname' and questionset='$set'";
              $res=mysqli_query($link,$sql);
              if(mysqli_num_rows($res)>0)
              {
                     $sql="delete from tbltemp where id='$subjectid' and subject='$subjectname' and questionset='$set' and questionno='$count'";
                     if(mysqli_query($link,$sql))
                     {
                            echo "<script>alert('Answer updated....')</script>";
                            echo"<script>open('../master/questionpaper.php','_self')</script>";       
                     }
        
              }
            
              $sql="insert into tbltemp values('$subjectid','$subjectname','$set','$count','$question','$option','$correctans')";
              if(mysqli_query($link,$sql))
              {
                     echo"<script>open('../master/questionpaper.php','_self')</script>";  
              }
       } 
      
?>