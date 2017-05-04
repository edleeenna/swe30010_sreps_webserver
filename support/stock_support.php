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
      Work in progress.
      <h2>Stock Support</h2>
      Support for how to use the sections of the sales system.
        <div class="row">
          <div class="col s12">
             <h3>View All Stock Items</h3>
            </div>
          
          <div class="row">
          <div class="col s4">
            <img src="/images/navtomanagestock.png" alt="how to nav to managestock" height="200" width="300"/>
          </div>
             <div class="col s4">
            <img src="/images/navtoviewallstock.png" alt="how to nav to view all stock" height="200" width="300"/>
          </div>
             <div class="col s4">
            <img src="/images/viewallstock.png" alt="how to view all stock" height="200" width="300"/>
          </div>
                     
        </div>
     
       
      Change this text later. Screen shot, with description of what the parts are and for. Description of how you would use them.
      Perhaps take them through from start to finish, how to do a complete run.
      <h3>View Stock Item</h3>
      Change this text later. Screen shot, with description of what the parts are and for. Description of how you would use them.
      Perhaps take them through from start to finish, how to do a complete run.
      <h3>Edit Stock Item</h3>
      Change this text later. Screen shot, with description of what the parts are and for. Description of how you would use them.
      Perhaps take them through from start to finish, how to do a complete run.
      <h3>Add Stock Item</h3>
      Change this text later. Screen shot, with description of what the parts are and for. Description of how you would use them.
      Perhaps take them through from start to finish, how to do a complete run.
      <h3>Delete Stock Item</h3>
      Change this text later. Screen shot, with description of what the parts are and for. Description of how you would use them.
      Perhaps take them through from start to finish, how to do a complete run.
      </div>
        </main>
<?php
  //Ending of body tag is in tail.php
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
