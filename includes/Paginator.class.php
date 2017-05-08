<?php
 
class Paginator {
 
	private $_conn;
	private $_limit;
	private $_page;
	private $_query;
	private $_total;

	// executes an initial query to the database to obtain the total number of rows returned in the query
	public function __construct( $conn, $query ) { 
	    $this->_conn = $conn;
	    $this->_query = $query;
	 
	    $rs= $this->_conn->query( $this->_query );
	    $this->_total = $rs->num_rows;
	     
	}
	
	public function getData( $limit = 10, $page = 1 ) {
	    $this->_limit   = $limit;
	    $this->_page    = $page;
	 
	    if ( $this->_limit == 'all' ) {
	        $query      = $this->_query;
	    } else {
	        $query      = $this->_query . " LIMIT " . ( ( $this->_page - 1 ) * $this->_limit ) . ", $this->_limit";
	    }
	    $rs             = $this->_conn->query( $query );
	 
	    while ( $row = $rs->fetch_assoc() ) {
	        $results[]  = $row;
	    }
	    $i =0;
	    while ( $finfo = $rs->fetch_field()) {
     		 $fields[] = $finfo->name;
   		 }
	 
	    $result         = new stdClass();
	    $result->page   = $this->_page;
	    $result->limit  = $this->_limit;
	    $result->total  = $this->_total;
	    
	    $result->fields = $fields;
	    $result->data   = $results;
	 
	    return $result;
	}
	
	public function createLinks( $links, $list_class, $query = '' ) {
	    if ( $this->_limit == 'all' ) {
	        return '';
	    }
	 
	 	$class_default = 'waves-effect';
	 	$class_disabled = 'disabled';
	 	$class_active = 'active';
	 
	    $last       = ceil( $this->_total / $this->_limit );
	 
	    $start      = ( ( $this->_page - $links ) > 0 ) ? $this->_page - $links : 1;
	    $end        = ( ( $this->_page + $links ) < $last ) ? $this->_page + $links : $last;
	 
	 	$html       = '<!-- Pagination links -->'.PHP_EOL;
	    $html       .= '<ul class="' . $list_class . '">'.PHP_EOL;
	 
	    $class      = ( $this->_page == 1 ) ? $class_disabled : $class_default;
	    $html       .= '<li class="'.$class.'"><a href="?'.(( $query != '' ) ? ($query.'&amp;') : '').'page='.( 1 ).'"><i class="material-icons">first_page</i></a></li>'.PHP_EOL;	                // jump to start
	    $html       .= '<li class="'.$class.'"><a href="?'.(( $query != '' ) ? ($query.'&amp;') : '').'page='.( $this->_page - 1 ).'"><i class="material-icons">chevron_left</i></a></li>'.PHP_EOL;    // back one page
	 
	    if ( $start > 1 ) {
	        $html   .= '<li class="'.$class.'"><a href="?'.(( $query != '' ) ? ($query.'&amp;') : '').'page=1">1</a></li>'.PHP_EOL;
	        $html   .= '<li class="disabled"><span>...</span></li>'.PHP_EOL;
	    }
	 
	    for ( $i = $start ; $i <= $end; $i++ ) {
	        $class  = ( $this->_page == $i ) ? $class_active : $class_default;
	        $html   .= '<li class="'.$class.'"><a href="?'.(( $query != '' ) ? ($query.'&amp;') : '').'page='.$i.'">'.$i.'</a></li>'.PHP_EOL;
	    }
	 
	    if ( $end < $last ) {
	        $html   .= '<li class="disabled"><span>...</span></li>'.PHP_EOL;
	        $html   .= '<li class="'.$class.'"><a href="?'.(( $query != '' ) ? ($query.'&amp;') : '').'page='.$last.'">'.$last.'</a></li>'.PHP_EOL;
	    }
	 
	    $class      = ( $this->_page == $last ) ? $class_disabled : $class_default;
	    $html       .= '<li class="'.$class.'"><a href="?'.(( $query != '' ) ? ($query.'&amp;') : '').'page='.( $this->_page + 1 ).'"><i class="material-icons">chevron_right</i></a></li>'.PHP_EOL;        // forward one page  
	    $html       .= '<li class="'.$class.'"><a href="?'.(( $query != '' ) ? ($query.'&amp;') : '').'page='.( $last ).'"><i class="material-icons">last_page</i></a></li>'.PHP_EOL;                    // jump to end

	 
	    $html       .= '</ul>'.PHP_EOL;
	 
	    return $html;
	}
 
}