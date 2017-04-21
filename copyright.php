<?php
  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "Copywrite";

  // Variable to assign extra css files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "css" folder. 
  $extra_css = "";
  
  // Variable to assign extra javascript files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "js" folder.
  $extra_js = "";

  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/head.php';
/*
  <body>
*/
?>
<?php
  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/nav.php';
?>
    
</nav>

<main>
	<div class="container"> 
		<p>Copywrite</p> 
		<p>Icons made by <a href = "http://www.freepik.com" title = "Freepik" >Freepik </a> from <a href="http://www.flaticon.com"title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></p>
	</div>
</main>
<?php
/*
  </body>
*/
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
