<?php 
session_start(); 
 
unset($_SESSION['login']); 
unset($_SESSION['level']); 
header('Location: guest/index.php'); 
exit;