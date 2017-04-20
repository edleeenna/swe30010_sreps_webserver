<?php
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
          <a class="waves-effect waves-light btn-large" href="search.php">Search</a>
          <a class="waves-effect waves-light btn-large" href="stock/manage.php">Manage Stock</a>
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
