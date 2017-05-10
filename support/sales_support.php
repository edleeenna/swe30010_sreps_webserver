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
	    <h3>Add Sale</h3>
      Change this text later. Screen shot, with description of what the parts are and for. Description of how you would use them.
      Perhaps take them through from start to finish, how to do a complete run.
	    <h3>Edit Sale</h3>
      Change this text later. Screen shot, with description of what the parts are and for. Description of how you would use them.
      Perhaps take them through from start to finish, how to do a complete run.
	    <h3>View Sale Item</h3>
      Change this text later. Screen shot, with description of what the parts are and for. Description of how you would use them.
      Perhaps take them through from start to finish, how to do a complete run.
	 
               <div class="row">
          <div class="col s12">
             <h3>View All Sales</h3>
            <p>This will take you through how to navigate to and how to view all stock from the database.</p>
            </div>
          
          <div class="row">
          <div class="col s3">
            <img class="responsive-img materialboxed" src="/images/navtomanagesales.png" alt="how to nav to managesales" />
            <p></p>
          </div>
             <div class="col s3">
            <img class="responsive-img materialboxed" src="/images/navtoviewallsales.png" alt="how to nav to view all stock" />
               <p></p>
          </div>
             <div class="col s3">
            <img class="responsive-img materialboxed" src="/images/viewallsales.png" alt="how to view all stock" />
               <p></p>
          </div>
		    <div class="col s3">
            <img class="responsive-img materialboxed" src="/images/viewsalefromallsales.png" alt="how to view all stock" />
               <p></p>
          </div>
                     
        </div>
    </main>
<?php
  //Ending of body tag is in tail.php
  include $_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/tail.php';
?>
