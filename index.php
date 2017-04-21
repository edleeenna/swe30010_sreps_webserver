<?php
  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "Home";

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
  // Nav would go here .. not on Index Page.
  //include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/nav.php';
?>
    
    </nav>
    <main>
      <div style="text-align:center">
        <p>
          <a class="waves-effect waves-light btn-large disabled" href="sales/quick_sale.php">Quick Sale</a>
          <!-- <a class="waves-effect waves-light btn-large" href="search.php">Search</a> -->
          <a class="waves-effect waves-light btn-large" href="displaystock.php">Search</a>
          <!-- <a class="waves-effect waves-light btn-large" href="stock/manage.php">Manage Stock</a> -->
          <a class="waves-effect waves-light btn-large" href="edit_stock.php">Manage Stock</a>
        </p>
        <p> <a class="waves-effect waves-light btn-large disabled" href="stock/predictions.php">Predictions</a> <a class="waves-effect waves-light btn-large disabled" href="support.php">Support</a> </p>
      </div>
    </main>
<?php
/*
  </body>
*/
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
