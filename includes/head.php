<?php
  if (session_id()==''){
    session_start();
  }
  $siteTitle = "PHP - SRePS";
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

    <title>PHP - SRePS</title>
    <title><?php if ($pageTitle <> "") echo $pageTitle." - "; echo $siteTitle;?></title>

    <link rel="icon" type="image/png" href="/images/medicine-32x32.png" sizes="32x32"/>
    <link rel="icon" type="image/png" href="/images/medicine-16x16.png" sizes="16x16" />

    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/css/common.css"/>
    <link type="text/css" rel="stylesheet" href="/css/materialize.min.css" media="screen,projection"/>
<?php
  // This line enables each page to add it's own extra CSS file, for page specific components.
  if ($extra_css != "") echo '    <link type="text/css" rel="stylesheet" href="css/'.$extra_css.'"/>'.PHP_EOL;
?>

    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="/js/materialize.min.js"></script>
<?php   
  // This line enables each page to add it's own extra javascript file, for page specific components or functionality.
  if ($extra_js != "") echo '    <script type="text/javascript" src="js/'.$extra_js.'"></script>'.PHP_EOL;
?>
  </head>
  <body>
    <nav class="nav-extended">
<?php
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/header.php';
?>
