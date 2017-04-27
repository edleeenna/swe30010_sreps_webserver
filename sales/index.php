<?php
  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "Manage Sales";

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
      		<a class="waves-effect waves-light btn-large" href="/sales/view_all_sales_.php">View All Sales</a>
			<a class="waves-effect waves-light btn-large" href="/sales/view_sale.php">View Sale</a>
        	<a class="waves-effect waves-light btn-large" href="/sales/edit_sale.php">Edit Sale </a>
        	<a class="waves-effect waves-light btn-large" href="/sales/add_sale.php">Add Sale</a>
    	</div>
    </main>
<?php
/*
  </body>
*/
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
