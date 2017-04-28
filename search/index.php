<?php
  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "Search";
  
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
  // Nav would go here .. not on Index Page.
  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/nav.php';
?>
    
    </nav>
    <main>
 		<div style="text-align:center">
      		<a class="waves-effect waves-light btn-large" href="/search/sales_search.php">Search Sales Item</a>
        	<a class="waves-effect waves-light btn-large" href="/search/stock_search.php">Search Stock Item</a>
    	</div>
    </main>
<?php
/*
  </body>
*/
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>