<?php
namespace Hal\Core;

/**
 * File:    /app/code/core/system/Logger.php
 * Purpose: Handles system and user-defined event logging
 */

class Logger {

	public function __construct() {
		ini_set('log_errors', 'On');
		ini_set('error_log', LOG_PATH.'system.log');
	}

	public function save($message = NULL, $logfile = 'system.log') {

		# Logging function for both user-defined and system errors

		if (!is_null($message)) {

			chmod(LOG_PATH.$logfile, 0644);

			if ($message instanceof Exception) {

				$print_to_file = "EXCEPTION OCCURED\r\nDate\Time: ".date("Y-m-d H:i:s")."\r\n
	            File name: $message->getFile()\r\nLine Number: $message->getLine()\nMessage: $message->getMessage()" .PHP_EOL;

				$open = fopen(LOG_PATH.$logfile, "ab");
				fwrite($open, $print_to_file);
				fclose($open);

				return true;
			} else {

				$print_to_file = "### Log Entry ###\r\nDate\Time: ".date("Y-m-d H:i:s")."\r\n$message\r\n" .PHP_EOL;

				$open = fopen(LOG_PATH.$logfile, "a+");
				fwrite($open, $print_to_file);
				fclose($open);

				return true;
			}

		} else {
			$print_to_file = "### NOTICE ###\nDate\Time: ".date("Y-m-d H:i:s")."\n
	            Cannot print a <null> message".PHP_EOL;

			$open = fopen(LOG_PATH.$logfile, "a+");
			fwrite($open, $print_to_file);
			fclose($open);

			return false;
		}
	}

	public function clean() {

		# Maximum size of log file allowed, in bytes ( 100000000 = 100 MB)
		$max_size = 100000000;

		chdir(LOG_PATH);

		foreach (glob("*.log") as $_file) {

			if (filesize($_file) >= $max_size) {

				$tar = new \PharData(basename($_file, ".log").'-error-log-archive.tar');
				$tar->addFile($_file);
				$tar->compress(\Phar::GZ);

				# Move tarball to archives folder once complete
				if (is_readable('archive/'.$_file.'-error-log-archive.tar')) {
					rename($_file.'-error-log-archive.tar', 'archive/'.$_file.'-error-log-archive.tar');
				} else {

					rename($_file.'-error-log-archive.tar', 'archive/'.$_file.'_'.time().'-error-log-archive.tar');
				}
			}
		}
	}
}
