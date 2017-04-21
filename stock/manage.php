<?php
  $pageTitle = "Manage Stock";
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/head.php';
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/nav.php';
?>
    <main>
      Manage Stock
    </main>
<nav>
  <div class="nav-wrapper">
    <a href="#" class="brand-logo">PHP SRePS</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="./index.php">Home</a></li>
      <li><a href="./addstock.php">Add Stock</a></li>
      <li><a href="./edit_stock.php">Edit Stock</a></li>
      <li><a href="./edit_stock_levels.php">Edit Stock Levels</a></li>
      <li><a href="./displaystock.php">Display Stock</a></li>
    </ul>
  </div>
</nav>
<?php
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
