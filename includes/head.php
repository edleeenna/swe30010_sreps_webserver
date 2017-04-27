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
    <meta name="description" content="Peoples Health Pharmacy">
    <meta name="keywords" content="Peoples Health Pharmacy Sales Reporting and Prediction System">
    <meta name="author" content="Development Project 2 2017 Semester 1 Group 0">

    <title><?php if ($pageTitle <> "") echo $pageTitle." - "; echo $siteTitle;?></title>

    <link rel="icon" type="image/png" href="/images/medicine-32x32.png" sizes="32x32"/>
    <link rel="icon" type="image/png" href="/images/medicine-16x16.png" sizes="16x16" />

    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/css/common.css"/>
    <link type="text/css" rel="stylesheet" href="/css/materialize.min.css" media="screen,projection"/>
<?php
  // This section enables each page to add it's own extra CSS file(s), for page specific components.
  // Handle extra css files.
  if (isset($extra_css)) {
    //echo '$extra_css set<br>'.PHP_EOL;
    $filesPresent=false;
    $fileList = "";
    if (is_array($extra_css)) {
      //echo '$extra_css is an array with '.sizeof($extra_css).' entries.<br>'.PHP_EOL;
      foreach ($extra_css as $entry) {
        //echo "    $entry.<br>".PHP_EOL;
        if ($entry != "") {
          if (!$filesPresent) $filesPresent = True;
          $fileList .= '    <link rel="stylesheet" href="/css/'.$entry.'" type="text/css">'.PHP_EOL;
        }
      }
    }
    else {
      //echo '$extra_css is NOT an array.<br>'.PHP_EOL;
      //echo "    $extra_css.<br>".PHP_EOL;
      if ($extra_css != "") {
        if (!$filesPresent) $filesPresent = True;
        $fileList .= '    <link rel="stylesheet" href="/css/'.$extra_css.'" type="text/css">'.PHP_EOL;
      }
    }
    if ($fileList != "") {
      echo '    <!-- extra css entries -->'.PHP_EOL;
      echo $fileList;
    }
    //echo PHP_EOL;
  }
?>

    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="/js/materialize.min.js"></script>
<?php   
  // This section enables each page to add it's own extra javascript file(s), for page specific components or functionality.
  // Handle extra javascript files.
  if (isset($extra_js)) {
    //echo '$extra_js set<br>'.PHP_EOL;
    $filesPresent=false;
    $fileList = "";
    if (is_array($extra_js)) {
      //echo '$extra_js is an array with '.sizeof($extra_js).' entries.<br>'.PHP_EOL;
      foreach ($extra_js as $entry) {
        //echo "    $entry.<br>".PHP_EOL;
        if ($entry != "") {
          if (!$filesPresent) $filesPresent = True;
          $fileList .= '    <script type="text/javascript" src="/js/'.$entry.'"></script>'.PHP_EOL;
        }
      }
    }
    else {
      //echo '$extra_js is NOT an array.<br>'.PHP_EOL;
      //echo "    $extra_js.<br>".PHP_EOL;
      if ($extra_js != "") {
        if (!$filesPresent) $filesPresent = True;
        $fileList .= '    <script type="text/javascript" src="/js/'.$extra_js.'"></script>'.PHP_EOL;
      }
    }
    if ($fileList != "") {
      echo '    <!-- extra javascript entries -->'.PHP_EOL;
      echo $fileList;
    }
    //echo PHP_EOL;
  }
?>
  </head>
  <body>
    <nav class="nav-extended">
<?php
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/header.php';
?>
