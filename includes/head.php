<?php
  if (session_id()==''){
    session_start();
  }
?>
<!DOCTYPE HTML>
<!--
    * File Name    : <?php echo basename($_SERVER['PHP_SELF'])."\r\n";?>
    * Author       : John V.
    * Date Created : <?php echo date ("d F Y", filectime(basename($_SERVER['PHP_SELF'])))."\r\n";?>
    * Version      : 1.0
    * Last Modified: <?php echo date ("d F Y", filemtime(basename($_SERVER['PHP_SELF'])))."\r\n";?>
    * Description  :
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="SIG Managment System">
    <meta name="keywords" content="SIG Managment System">
    <meta name="author" content="Adaptive Silicon">

    <title>Pharmacy</title>
    <link rel="stylesheet" href="css/common.css" type="text/css">
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <!-- A script developed by John Resig that magically makes the new HTML5 elements visible to older versions of IE -->
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--<script type="text/javascript" src="js/scripts.js">-->
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
   
    <!--</script>-->

  </head>
  <body>
<?php
  include 'header.php';
  include 'nav.php';
?>
