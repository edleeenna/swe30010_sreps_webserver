<?php
  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "Sale Added";

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


<?php
/*
  </body>
*/
 if (isset ($_POST["html_sales_datetime"])){
    $salesDateTime = $_POST["html_sales_datetime"];
  }

  include "includes/db_connect.php";

    $insertQuery = "insert into sales (sale_datetime) values ('$salesDateTime')";

       //insert sale into database
    $insertResult = mysqli_query($conn, $insertQuery);

     if(!$insertResult) {
      echo("Error description: " . mysqli_error($conn));
    }

    else {
      echo "<p> Successfully added sale to database </p>";
      echo "<p>Sale Date/Time: $salesDateTime.  </p>";

    }

      mysqli_close($conn);
echo "</main>";
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
