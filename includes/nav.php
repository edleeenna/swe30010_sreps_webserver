      <div class="container">
        <!-- Dropdown Structure -->
        <ul id="StockDown" class="dropdown-content">
          <li><a href="/stock/" data-constrainwidth="false"><i class="material-icons">reorder</i>Manage Stock</a></li>
          <li><a href="/stock/view_all_stock.php"><i class="material-icons">view_list</i>All Stock</a></li>
          <li><a href="/stock/view_stock.php"><i class="material-icons">view_array</i>View Stock</a></li>
          <li><a href="/stock/add_stock.php"><i class="material-icons">note_add</i>Add Stock</a></li>
          <li><a href="/stock/edit_stock.php"><i class="material-icons">mode_edit</i>Edit Stock</a></li>
          <li><a href="/stock/delete_stock.php" data-constrainwidth="false"><i class="material-icons">delete</i>Delete Stock</a></li>
        </ul>
        <ul id="SaleDown" class="dropdown-content">
          <li><a href="/sales/" data-constrainwidth="false"><i class="material-icons">receipt</i>Manage Sales</a></li>
          <li><a href="/sales/view_all_sales.php"><i class="material-icons">view_list</i>All Sales</a></li>
          <li><a href="/sales/view_sale.php"><i class="material-icons">view_array</i>View Sale</a></li>
          <li><a href="/sales/add_sale.php"><i class="material-icons">note_add</i>Add Sale</a></li>
          <li><a href="/sales/edit_sale.php"><i class="material-icons">mode_edit</i>Edit Sale</a></li>
        </ul>
        <div class="nav-wrapper">
          <!-- Dropdown Trigger -->
          <ul class="right hide-on-med-and-down">
            <li><a href="/">Home</a></li>
            <li><a href="/sales/add_sale.php">Quick Sale</a></li>
            <li><a href="/search.php">Search</a></li>
            <li><a class="dropdown-button" data-constrainwidth="false" data-hover="true" href="#" data-activates="StockDown">Manage Stock<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-button" data-constrainwidth="false" data-hover="true" href="#" data-activates="SaleDown">Manage Sales<i class="material-icons right">arrow_drop_down</i></a></li>
           <li><a href="/reports.php">Reports</a></li>
            <li><a href="/support/">Support</a></li>
          </ul>
        </div>
      </div>
