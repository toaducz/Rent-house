<?php
session_start(); 
session_destroy(); 
header("location:index.php"); //ve index sau khi dang nhap
?>