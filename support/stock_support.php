<?php
  // Variable to set the local (current) page title [NOT Site Title].
  $pageTitle = "Stock Support";

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
        <h2>Stock Support</h2>
      Support for how to use the sections of the sales system. Click on an image to enlarge it for easier viewing.
        <div class="row">
          <div class="col s12">
             <h3>View All Stock Items</h3>
            <p>This will take you through how to navigate to and how to view all stock from the database.</p>
            </div>
          
          <div class="row">
          <div class="col s4">
            <img class="responsive-img materialboxed" src="/images/navtomanagestock.png" alt="how to nav to managestock" />
            <p>From the home page, click on "Manage Stock" as shown in the image above. This will take you to the "Manage Stock" page and will present you with a few options to choose from</p>
          </div>
             <div class="col s4">
            <img class="responsive-img materialboxed" src="/images/navtoviewallstock.png" alt="how to nav to view all stock" />
               <p>On this page you will see a list of buttons that will take you to various pages of the website related to stock. From here, you will want to click on the first button on the left side: "View All Stock"</p>
          </div>
             <div class="col s4">
            <img class="responsive-img materialboxed" src="/images/viewallstock.png" alt="how to view all stock" />
               <p>You should now be able to view all stock from the database. Underneath the heading is the button "Export to CSV", this will export the stock table in CSV format in an excel spreadsheeet.
                You should be able to view all fields related to stock as well as two buttons for "edit" and "view". Clicking on "edit" will allow you edit the details of that stock item and clicking "view" will 
                 allow you to view the details of only that item.</p>
          </div>
                     
        </div>
       <div class="row">
          <div class="col s12">
             <h3>View Single Stock Item</h3>
            <p>This will take you through how to navigate to view a single stock and how to select an item to View.</p>
            </div>
          
          <div class="row">
          <div class="col s3">
            <img class="responsive-img materialboxed" src="/images/navtomanagestock.png" alt="how to nav to managestock" />
            <p>From the home page, click on "Manage Stock" as shown in the image above. This will take you to the "Manage Stock" page and will present you with a few options to choose from</p>
          </div>
             <div class="col s3">
            <img class="responsive-img materialboxed" src="/images/viewsinglestock.png" alt="how to nav to view all stock" />
               <p>You should now be presented with options related to managing stock. From here you want to click on "View Stock".</p>
          </div>
             <div class="col s3">
            <img class="responsive-img materialboxed" src="/images/viewsinglestockitem.png" alt="how to view all stock" />
               <p>On this page you will be able to select the item ID of the stock you want to view. Choose and item and click "submit". If you make a mistake, you can click on "reset" and start again</p>
          </div>
              <div class="col s3">
            <img class="responsive-img materialboxed" src="/images/viewsinglestockitem2.png" alt="how to view all stock" />
               <p>You should now be able to view the details of the selected stock item</p>
          </div>
                     
        </div>
       
     
    <div class="row">
          <div class="col s12">
             <h3>Edit Stock Item</h3>
            <p>This will take you through how to edit stock</p>
            </div>
          
          <div class="row">
          <div class="col s3">
            <img class="responsive-img materialboxed" src="/images/navtomanagestock.png" alt="how to nav to add stock" />
            <p>From the home page, click on "Manage Stock" as shown in the image above. This will take you to the "Manage Stock" page and will present you with a few options to choose from</p>
          </div>
             <div class="col s3">
            <img class="responsive-img materialboxed" src="/images/navtoeditstock.png" alt="how to nav to add stock" />
               <p>On this page you will see a list of buttons that will take you to various pages of the website related to stock. From here, you will want to click on the second button from the right as seen in the image above: "Edit Stock"</p>
          </div>
             <div class="col s3">
               <img class="responsive-img materialboxed" src="/images/selectitemtoedit.png" alt="how to add stock"/>
               <p>From here you will be able select the ID of a stock item you would like to edit. Choose and item and click "edit". If you make a mistake, click "reset" to try again.</p>
          </div>
             <div class="col s3">
            <img class="responsive-img materialboxed" src="/images/editstockitem.png" alt="stock added"/>
               <p>On this page, you will be able to see the fields of the stock item. Click on the field you'd like to change to edit it and click submit. If you make a mistake, "reset" to try again.</p>
          </div>
                     
        </div>
         <div class="row">
          <div class="col s12">
             <h3>Add Stock Item</h3>
            <p>This will take you through how to navigate to "add stock".</p>
            </div>
          
          <div class="row">
          <div class="col s3">
            <img class="responsive-img materialboxed" src="/images/navtomanagestock.png" alt="how to nav to add stock" />
            <p>From the home page, click on "Manage Stock" as shown in the image above. This will take you to the "Manage Stock" page and will present you with a few options to choose from</p>
          </div>
             <div class="col s3">
            <img class="responsive-img materialboxed" src="/images/navtoaddstock.png" alt="how to nav to add stock" />
               <p>On this page you will see a list of buttons that will take you to various pages of the website related to stock. From here, you will want to click on the second button from the right as seen in the image above: "Add Stock"</p>
          </div>
             <div class="col s3">
            <img class="responsive-img materialboxed" src="/images/addstockitem1.png" alt="how to add stock" />
               <img class="responsive-img materialboxed" src="/images/addstockitem2.png" alt="how to add stock"/>
               <p>You should now be presented with a form with all the necessary fields to add stock. Enter the prompted details and then click submit at the end of the form to add the stock to the database. If you make a mistake, you can click on reset to reset the form and start again</p>
          </div>
             <div class="col s3">
            <img class="responsive-img materialboxed" src="/images/stockadded.png" alt="stock added"/>
               <p>After clicking submit, the webpage will take you to a page that will show you all the details of the stock item you just added.</p>
          </div>
                     
        </div>
       <div class="row">
          <div class="col s12">
             <h3>Delete Stock Item</h3>
            <p>This will take you through how to delete a stock item.</p>
            </div>
          
          <div class="row">
          <div class="col s2">
            <img class="responsive-img materialboxed" src="/images/navtomanagestock.png" alt="how to nav to managestock" />
            <p>From the home page, click on "Manage Stock" as shown in the image above. This will take you to the "Manage Stock" page and will present you with a few options to choose from</p>
          </div>
             <div class="col s2">
            <img class="responsive-img materialboxed" src="/images/navtodeletestock.png" alt="how to nav to view all stock" />
               <p>You should now be presented with options related to managing stock. From here you want to click on "Delete Stock".</p>
          </div>
             <div class="col s2">
            <img class="responsive-img materialboxed" src="/images/selectitemtodelete.png" alt="how to view all stock" />
               <p>On this page you will be able to select the item ID of the stock you want to Delete. Choose and item and click "submit". If you make a mistake, you can click on "reset" and start again</p>
          </div>
              <div class="col s2">
            <img class="responsive-img materialboxed" src="/images/deleteitem.png" alt="how to view all stock" />
               <p>Here you should be able to view the item details of the stock you would like to delete. Click on "deleete" to delete the stock item or "reset" if you make a mistake</p>
          </div>
             <div class="col s2">
            <img class="responsive-img materialboxed" src="/images/ConfirmDelete.png" alt="how to view all stock" />
               <p>After clicking on the delete button, an alert will appear to confirm deletion. Click "ok" to confirm or "cancel" to cancel.</p>
          </div>
                     
        </div>
        </main>
<?php
  //Ending of body tag is in tail.php
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
