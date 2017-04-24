<?php
  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "Support";

  // Variable to assign extra css files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "css" folder. 
  //$extra_css = "";
  
  // Variable to assign extra javascript files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "js" folder.
  //$extra_js = "";

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
	<div style="text-align:center">
        <p>
			<a class="waves-effect waves-light btn-large" href="/support/stock_support.php">Stock Support</a>
			<a class="waves-effect waves-light btn-large" href="/support/sales_support.php">Sales Support</a>
        </p>
	</div>
</main>
<?php
/*
  </body>
*/
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
