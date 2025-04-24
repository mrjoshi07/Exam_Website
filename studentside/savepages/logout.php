<?php
       session_start();
       session_destroy();
       echo "<script>open('../startpage1.php','_self')</script>";
?>