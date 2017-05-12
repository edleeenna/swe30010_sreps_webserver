<?php
  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "Sales Support";
  
  // Variable to assign extra css files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "css" folder. 
  //$extra_css = "";
  
  // Variable to assign extra javascript files into the head of the page. just the file name needs to go in the quotes.
  // All files should reside in the "js" folder.
  //$extra_js = "";
  
  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/head.php';
  //Start of body and nav tags are in head.php
  include $_SERVER[ 'DOCUMENT_ROOT' ].'/includes/nav.php';
  ?>    
</nav>
<main>
  <div class="container">
  Work in progress.
  <h2>Sales Support</h2>
  Support for how to use the sections of the sales system.
  <div class="row">
  <div class="col s12">
    <h3>Addt Sale</h3>
    <p>This will take you through how to navigate to and how to add sale to the database.</p>
  </div>
  <div class="row">
  <div class="col s4">
    <img class="responsive-img materialboxed" src="/images/navtomanagesales.png" alt="how to nav to managesales" />
    <p>From the home page click on the "Manage Sales" button as shown above to navigate to the "Manage Sales" page</p>
  </div>
  <div class="col s4">
    <img class="responsive-img materialboxed" src="/images/navtoaddsale.png" alt="how to nav to add sale" />
    <p>From Manage Sales, click on the "edit Sale" button as shown above.</p>
  </div>
  <div class="col s4">
    <img class="responsive-img materialboxed" src="/images/addsale.png" alt="how to add sale" />
    <p></p>
  </div>

  <div class="row">
  <div class="col s12">
    <h3>Edit Sale</h3>
    <p>This will take you through how to navigate to and how to edit a single sale from the database.</p>
  </div>
  <div class="row">
  <div class="col s3">
    <img class="responsive-img materialboxed" src="/images/navtomanagesales.png" alt="how to nav to managesales" />
    <p>From the home page click on the "Manage Sales" button as shown above to navigate to the "Manage Sales" page</p>
  </div>
  <div class="col s3">
    <img class="responsive-img materialboxed" src="/images/navtoeditsale.png" alt="how to nav to edit sale" />
    <p>From Manage Sales, click on the "edit Sale" button as shown above.</p>
  </div>
  <div class="col s3">
    <img class="responsive-img materialboxed" src="/images/selectsaletoedit.png" alt="how to view all stock" />
    <p>Select the sale you'd wish to edit from the dropdown box and click submit. If you make a mistake you can click on the cancel button to start again.</p>
  </div>
  <div class="col s3">
    <img class="responsive-img materialboxed" src="/images/editsale.png" alt="how to view all stock" />
    <p>You should now be taken to this page which allows you to edit sales. Now, you can add or remove orderlines. Edit the sale as you wish</p>
  </div>
  <div class="row">
  <div class="col s12">
    <h3>View a Single Sale</h3>
    <p>This will take you through how to navigate to and how to view a single sale from the database.</p>
  </div>
  <div class="row">
  <div class="col s3">
    <img class="responsive-img materialboxed" src="/images/navtomanagesales.png" alt="how to nav to managesales" />
    <p>From the home page click on the "Manage Sales" button as shown above to navigate to the "Manage Sales" page</p>
  </div>
  <div class="col s3">
    <img class="responsive-img materialboxed" src="/images/navtoviewsinglesale.png" alt="how to nav to view all stock" />
    <p>From Manage Sales, click on the "View Sale" button as shown above. It is the second button from the left.</p>
  </div>
  <div class="col s3">
    <img class="responsive-img materialboxed" src="/images/selectsaletoview.png" alt="how to view all stock" />
    <p>From here you should select an order you'd like to view and click submit. If you make a mistake click "reset" and start again</p>
  </div>
  <div class="col s3">
    <img class="responsive-img materialboxed" src="/images/viewasalefromallsales.png" alt="how to view all stock" />
    <p>After clicking on "Submit" button should be taken to a page like above. It should show you all sales for that particular date, including item name, quantity and price</p>
  </div>
  <div class="row">
    <div class="col s12">
      <h3>View All Sales</h3>
      <p>This will take you through how to navigate to and how to view all sales from the database.</p>
    </div>
    <div class="row">
      <div class="col s3">
        <img class="responsive-img materialboxed" src="/images/navtomanagesales.png" alt="how to nav to managesales" />
        <p>From the home page click on the "Manage Sales" button as shown above to navigate to the "Manage Sales" page</p>
      </div>
      <div class="col s3">
        <img class="responsive-img materialboxed" src="/images/navtoviewallsales.png" alt="how to nav to view all stock" />
        <p>From Manage Sales, click on the "View all Sales" button as shown above. It is the first button from the left.</p>
      </div>
      <div class="col s3">
        <img class="responsive-img materialboxed" src="/images/viewallsales.png" alt="how to view all stock" />
        <p>You should now be able to view all sales from the database. You will be able to view certain reports by date by clicking on the options above the table and then the button "View Report". You may also edit a sale by clicking the buttong "edit" from the edit column or view all sales on that sales date by clicking "view" from the view column</p>
      </div>
      <div class="col s3">
        <img class="responsive-img materialboxed" src="/images/viewasalefromallsales.png" alt="how to view all stock" />
        <p>By clicking on the "view" button should be taken to a page like above. It should show you all sales for that particular date, including item name, quantity and price</p>
      </div>
    </div>
  </div>
</main>
<?php
  //Ending of body tag is in tail.php
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
  ?>
