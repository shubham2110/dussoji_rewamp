<?php

class DbConnector {//extends SystemComponent {

var $theQuery;
var $link;

//*** Function: DbConnector, Purpose: Connect to the database ***
public function __construct(){

    $host='localhost';
    $user='admin';
    $pass='pwd';
    $db= 'dussoji';
    
    
    // Connect to the database
    $this->link = mysqli_connect($host, $user, $pass);
    mysqli_select_db($this->link,$db);
    register_shutdown_function(array(&$this, 'close'));
    }
   
    

//*** Function: query, Purpose: Execute a database query ***
function query($query) {
    $this->theQuery = $query;
    return mysqli_query($this->link,$query);
}

//*** Function: getQuery, Purpose: Returns the last database query, for debugging ***
function getQuery() {
    return $this->theQuery;
}

//*** Function: getNumRows, Purpose: Return row count, MySQL version ***
function getNumRows($result) {
    return mysqli_num_rows($result);
}

//*** Function: fetchArray, Purpose: Get array of query results ***
function fetchArray($result) {
    return mysqli_fetch_array($result);
}

//*** Function: close, Purpose: Close the connection ***
function close() {
    mysqli_close($this->link);
}

function escapeString($val){
    return mysqli_real_escape_string($this->link,$val);
}

function getSingleRow($result){
    return mysqli_fetch_assoc($result);
}

function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);
        
        echo '<script>console.log( "Debug Objects: ' . $output . '" );</script>';
}
}
?>
