<?php

// DB table to use
$table = 'tma';
 
// Table's primary key
$primaryKey = 'id_tma';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id_tma', 'dt' => 0 ),
    array( 'db' => 'nilai',  'dt' => 1 ),
    array( 'db' => 'waktu',   'dt' => 2 ),
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'bengawan_solo',
    'host' => 'localhost'
);

 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);