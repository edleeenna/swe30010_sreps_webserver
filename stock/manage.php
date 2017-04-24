<?php
  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "Manage Stock";

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
 		<a class="waves-effect waves-light btn-large disabled" href="/stock/view_stock.php">View Stock Item</a>
        <a class="waves-effect waves-light btn-large" href="/stock/view_all_stock.php">View All Stock</a>
        <a class="waves-effect waves-light btn-large" href="/stock/edit_stock.php">Edit Stock Item</a>
        <a class="waves-effect waves-light btn-large" href="/stock/add_stock.php">Add Stock Item</a>
    </main>
<?php
/*
  </body>
*/
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
