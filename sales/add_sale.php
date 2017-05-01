<?php
  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "Add Sale";

  // Variable to assign extra css files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "css" folder. 
  //$extra_css = "";
  
  // Variable to assign extra javascript files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "js" folder.
  $extra_js = "add_sales.js";

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
      <form id="add_sales" method="post" >
        <fieldset>
          <legend>Add Sales Item</legend>
          <div class="input-field">
            <input type="text" id="html_sales_datetime" name="html_sales_datetime" class="validate">
            <label for="html_sales_name">Sales Date/Time</label>
          </div>
        </fieldset>
        <p>
            <input type="reset" value="Reset">
            <input type="submit" value="Submit">
        </p>
      </form>
    </div>

</main>
<?php
/*
  </body>
*/
 if (isset ($_POST["html_sales_datetime"])){
    $salesDateTime = $_POST["jobNo"];
  }

  include "includes/db_connect.php";

    $insertQuery = "insert into sales (sale_datetime) values ('$salesDateTime')";

    $selectQuery = "SELECT `sale_id` FROM `sales` WHERE `sale_datetime`= '$salesDateTime';";

    //insert sale into database
    $insertResult = mysqli_query($conn, $insertQuery);

    $selectResult = mysqli_query($conn, $selectQuery);

    if(!$insertResult || !$selectResult) {
    echo "<p class=\"wrong\"> Something is wrong with", $query, "</p>";
    }

    else {
      echo "<p> Successfully added sale to database </p>";
      echo "<p> Sale id: $selectResult. </p>";
      echo "<p>Sale Date/Time: $salesDateTime.  </p>";

    }

      mysqli_close($conn);

  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
