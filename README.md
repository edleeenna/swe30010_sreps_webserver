# PHP-SRePS

[Web Server Index](https://sreps.azurewebsites.net/)  
[phpMyAdmin](https://sreps.scm.azurewebsites.net/phpMyAdmin/)  
  


# Website Structure 
PHP-SRePS  
~~~
|--/css  
|  |--main.css  
|  |--materialize.css  
|  
|--/fonts  
|  |--roboto/  
|  
|--/includes  
|  |--/mysql  
|  |  |--db_connect.php  
|  |--header.php  
|  |--footer.php  
|  
|--/js  
|  |--materialize.js  
|  
|--index.php  
|--/stock
|  |--view_all_stock.php // view all stock items
|  |--add_stock.php      // single stock items 
|  |--edit_stock.php     // single stock items 
|  |--view_stock.php     // single stock items 
|--/sales  
|  |--view_all_sales.php // view all sales items
|  |--add_stock.php      // single sale 
|  |--edit_stock.php     // single sale 
|  |--view_stock.php     // single sale 
|--/search 
|  |--search_stock.php   // single sale 
|  |--search_sales.php   // single sale 
|--/help
|--prediction.php
~~~


# nav links
manage_stock <-> view_stock
             <-> edit_stock
             <-> add_stock
             
view_stock <->  edit_stock

view_all_stock <-> view_stock
               <-> edit_stock
               
view_all_sale <-> view_sale
              <-> edit_sale
              <-> add_stock
              
view_sale     <-> edit_sale
  
