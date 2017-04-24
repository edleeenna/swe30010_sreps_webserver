<?php
  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "Home";

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
  //include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/nav.php';
?>
    
    </nav>
    <main>
      <div style="text-align:center">
        <p>
          <!-- <a class="waves-effect waves-light btn-large" href="/sales/add_sale.php">Quick Sale</a> -->
          <a class="waves-effect waves-light btn-large" href="/search/search.php">Search</a>
          <a class="waves-effect waves-light btn-large" href="/stock/manage_stock.php">Manage Stock</a>
          <a class="waves-effect waves-light btn-large" href="/sales/manage_sales.php">Manage Sales</a>
        </p>
        <p>
          <a class="waves-effect waves-light btn-large" href="/predictions.php">Predictions</a> 
          <a class="waves-effect waves-light btn-large" href="/support.php">Support</a> 
        </p>
      </div>
    </main>
<?php
/*
  </body>
*/
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
