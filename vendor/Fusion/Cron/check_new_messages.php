<?php

class Database extends PDO {
	
	public function __construct() {
		
		 parent::__construct("mysql:host=localhost;dbname=framework", "root", "vg30dett");
		 PDO::setAttribute( PDO::ATTR_EMULATE_PREPARES, false ); 
		 PDO::setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
}

$db = new Database;

$q = $db->prepare("SELECT * FROM messenger_inbox");
$q->execute();
1413848364
foreach( $q as $m ) {

    if( $m['date'] <= ( $m['date'] + 100000 ) )
        echo $m['subject'].'<br>';

}
