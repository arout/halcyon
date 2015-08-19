<?php
/**
 * Andrew Rout, 9/28/2014
 *
 * === Purpose ===
 *
 * Run this script daily as a cron to perform daily
 * backups of MySQL databases.
 * The backups will be stored above web root, located
 * in the /home/dynamica/_DB_BACKUPS/ directory, as an
 * .sql file for easy importing with phpMyAdmin
 */

// Example folder names and database tables. See docs for more info
$database = array( 'backend' => 'database_backend', 'demo' => 'database_demo', 'leads' => 'database_leads', 'lists' => 'database_lists', 
	'splash_pages' => 'database_splash_pages', 'subscribe' => 'database_subscribe', 'test_environment' => 'database_testEnvironment', 'wp' => 'database_wp' );

foreach( $database as $folder => $db ) {

	$mysqlDatabaseName 	= $db;
	$mysqlUserName 		= 'database_example';
	$mysqlPassword 		= '';
	$mysqlHostName 		= '';
	$mysqlExportPath 	= '/home/user_name/backup_folder/'.$folder.'/'; // Make sure /home/user_name/backup_folder matches the location set in cleanup.php

	$filename = date("Y") .'_'. date("m") .'_'.date("d") .'_'. time().'.sql';

	$command = 'mysqldump --opt -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' > ' .$mysqlExportPath.$filename;
	exec( $command, $output=array(), $worked );
	switch( $worked ){
	case 0:
	echo 'Database <b>' .$mysqlDatabaseName .'</b> successfully exported to <b>~/' .$mysqlExportPath .'</b>';
	break;
	case 1:
	echo 'There was a warning during the export of <b>' .$mysqlDatabaseName .'</b> to <b>' .$mysqlExportPath .'</b><br>';
	break;
	case 2:
	echo 'There was an error during export. Please check your values:<br/><br/><table><tr><td>MySQL Database Name:</td><td><b>' .$mysqlDatabaseName .'
	</b></td></tr><tr><td>MySQL User Name:</td><td><b>' .$mysqlUserName .'
	</b></td></tr><tr><td>MySQL Password:</td><td><b>NOTSHOWN</b></td></tr><tr><td>MySQL Host Name:</td><td><b>' .$mysqlHostName .'</b></td></tr></table>';
	break;
	}
}