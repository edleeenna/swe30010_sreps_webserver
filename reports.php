<?php
  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "Reports";

  // Variable to assign extra css files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "css" folder. 
  //$extra_css = "";
  
  // Variable to assign extra javascript files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "js" folder.
  $extra_js = "reports.js";

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
 <?php
  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/report_functions.php';
  
  if (isset($_GET) && $_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET) ) {
    // Flaoting back button
?>
  <div class="container"> 
      <p>
        <a class="btn-floating btn-large waves-effect waves-light" href="/reports.php" title="Return to Report Selection"><i class="material-icons">keyboard_backspace</i></a>
      </p>
<?php
    
    
    $result = '';  // store result into here to allow for use with export  
    
    switch ($_GET['type']){
      case "sales_by_week":
        $pageTitle = "Sales by week";
        echo "<p>Sales by week report</p>".PHP_EOL;
        echo "<p>UNIMPLEMENTED</p>".PHP_EOL;

        $lastdate   = "";
        $allSaleQuery = ""; /* */
        include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/db_connect.php';
        include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/stock_functions.php';
        include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/Paginator.class.php';
        include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/utilities.php';
        $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 10;
        $page       = ( isset( $_GET['page'] ) )  ? $_GET['page']  : 1;
        $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 3;
        $query = <<<SQL
        SELECT sale_datetime, orderline_stock_id, stock_name, orderline_qty, (orderline_qty * orderline_price) as subtotal FROM orderlines
        INNER JOIN sales ON orderline_sale_id = sale_id
        WHERE sale_datetime >= '2017/03/07' AND sale_datetime <= DATE_ADD('2017/03/08', INTERVAL 1 DAY)
        ORDER BY sale_datetime, orderline_stock_id
SQL;
        $Paginator  = new Paginator( $conn, $query );
        $results    = $Paginator->getData( $limit, $page );
?>
    <div class="container">
      <table class="striped" border="1">
        <tr>
<?php  
        foreach($results->fields as $field)    {
?>
          <th><?php echo get_column_name($field); ?></th>
<?php
        }
        //<th></th><th></th></tr>
?>
        </tr>
<?php    
        for( $i = 0; $i < count( $results->data ); $i++ ) {
?>
        <tr>
<?php
          foreach($results->data[$i] as $cell) {
?>
          <td><?php echo $cell; ?></td>
<?php
          }
        //<td><a class="waves-effect waves-light btn" href="/sales/edit_sale.php?sale_id=<? php echo $results->data[$i]["sale_id"]? >" title="Edit item <? php echo $results->data[$i]["sale_id"]? >">Edit</a></td>
        //<td><a class="waves-effect waves-light btn" href="/sales/view_sale.php?sale_id=<? php echo $results->data[$i]["sale_id"]? >" title="View item <? php echo $results->data[$i]["sale_id"]? >">View</a></td>
?>
        </tr>
<?php
      
      //if ($lastdate == "") $lastdate = $results->data['sale_datetime'];
        //if ($lastdate != $results->data['sale_datetime']) echo $results->data['sale_datetime']."<br>".PHP_EOL;
        //for ($i = 0; $i < count( $results->data ); $i++ ) {}
        /* <tr>
          <td></td>
        </tr> */
        }  
?>
<?php
    //}
?>
      </table>
    </div>
<?php
        // SELECT sale_datetime, orderline_stock_id, orderline_qty, (orderline_qty * orderline_price) as subtotal FROM orderlines INNER JOIN sales ON orderline_sale_id = sale_id WHERE sale_datetime >= '2017/03/07' AND sale_datetime <= DATE_ADD('2017/03/08', INTERVAL 1 DAY) ORDER BY sale_datetime, orderline_stock_id
        // for week dd/mm/yyy to dd/mm/yyy
        // day | stock id | qty sold | total price per stock ($) | total price per day
        // ----|----------|----------|-------------              |
        //  1  | 0000001  | 4        | 32.65                     |
        //     | 0000130  | 2        | 16.32                     | xxx.xx
        //  2  |          |          |
        // ...
        //
        // total          |          |                           | xxx.xx
        
        // execute appropriate func from report_functions.php
        
        // display results
        
        break;  //  END  case "sales_by_week":
// ************************************************************************************************************************************
      case "sales_by_month":
        echo "<p>Sales by month report</p>".PHP_EOL;
        echo "<p>UNIMPLEMENTED</p>".PHP_EOL;
        
        // for month dd/mm/yyy to dd/mm/yyy
        // week starting  | stock id | qty sold | total price per stock ($) | total price per week
        // ---------------|----------|----------|-------------              |
        //  dd/mm/yyyy    | 0000001  | 4        | 32.65                     |
        //                | 0000130  | 2        | 16.32                     | xxx.xx
        //  dd/mm/yyyy    |          |          |
        // ...
        //
        // total          |          |          |                           | xxx.xx

        
        // execute appropriate func from report_functions.php
        
        // display results
        
        break;
      case "sales_by_product":
        echo "<p>Sales by product report</p>".PHP_EOL;
        echo "<p>UNIMPLEMENTED</p>".PHP_EOL;
        
        // for period dd/mm/yyy to dd/mm/yyy
        // stock id | qty sold | total price per stock ($) 
        // ---------|----------|-------------              
        // 0000001  | 4        | 32.65                     
        // 0000130  | 2        | 16.32                     
        //          |          |
        // ...
        //
        // total    |          | xxx.xx

        
        // execute appropriate func from report_functions.php
        
        // display results
        
        break;
      case "sales_by_supplier":
        echo "<p>Sales by supplier report</p>".PHP_EOL;
        echo "<p>UNIMPLEMENTED</p>".PHP_EOL;
        
        // for period dd/mm/yyy to dd/mm/yyy
        // supplier id | stock id | qty sold | total price per stock ($) | total price per supplier
        // ------------|----------|----------|-------------              |
        //  000011     | 0000001  | 4        | 32.65                     |
        //             | 0000130  | 2        | 16.32                     | xxx.xx
        //  000022     |          |          |
        // ...
        //
        // total       |          |          |                           | xxx.xx

        
        // execute appropriate func from report_functions.php
        
        // display results
        
        break;
      case "high_demand_stock":
        echo "<p>High demand stock report</p>".PHP_EOL;
        echo "<p>UNIMPLEMENTED</p>".PHP_EOL;
        
        // execute appropriate func from report_functions.php
        
        // display results
        
        break;
      case "predict":
        echo "<p>Predictions report</p>".PHP_EOL;
        echo "<p>UNIMPLEMENTED</p>".PHP_EOL;
        
        // execute appropriate func from report_functions.php
        
        // display results
        
        break;
        
      default:
        header("Location:/reports.php");
        break;
    } //End Case

    
    // Floating menu button
?>    <div class="fixed-action-btn horizontal">
        <a class="btn-floating btn-large red" title="Menu"><i class="large material-icons">menu</i></a>
        <ul>
          <li><a class="btn-floating blue" title="Print"><i class="material-icons">print</i></a></li>
          <li><a class="btn-floating green" title="Export" href="stock/stockexportprocess.php"><i class="material-icons">file_download</i></a></li>
        </ul>
      </div>        
  </div>
<?php
  }
  else {
?>
  <div class="container">
    <form id="report" method="get" action="/reports.php">
      <div class="input-field"> 
        <select id="type" name="type">
          <option value="" disabled selected>Select report type to generate</option>        
          <option value="sales_by_week">Sales by week</option>
          <option value="sales_by_month">Sales by month</option>
          <option value="sales_by_product">Sales by product</option>
          <option value="sales_by_supplier">Sales by supplier</option>
          <option value="high_demand_stock">High demand stock</option>
          <option value="predict">Predict</option>        
        </select>
        <label>Report type</label>
      </div>
      
      <div class="center-align">
        <button class="btn waves-effect waves-light" type="reset">Reset<i class="material-icons right">clear</i></button>
        <button class="btn waves-effect waves-light" type="submit">Submit<i class="material-icons right">send</i></button>
      </div>
    </form>
  </div>
<?php
  }
?>
</main>

<?php
/*
  </body>
*/
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
