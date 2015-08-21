<?php
namespace Fusion\System;

class Loader {	
	
	// The file being requested
	public $_file;
	// The directory containing requested file
	protected $_dir;
	protected $db;
	public $toolbox;
	public $data;
	protected $config;
	protected $session;
	
	public function __construct( $c ) {
	
	    $this->db = $c['database'];
	    $this->toolbox = $c['toolbox'];
	    $this->config = $c['config'];
	    $this->session = $c['session'];
	}
    
    public function file($file) {
        
		$filename = BASEPATH.$file;

		if ( is_readable( $filename ) ) {
			require_once $filename;
		} 
		else {
			echo '<div class="alert alert-danger"><h1>Fatal Error</h1>
			<h4>Could not load file: '. $filename .'</h4>
			Please ensure that the file exists and permission to read the file (644)
			</div>';
		}
	}
    
	public function folder($dir) {
		return $this->_dir = $dir;
	}

	public function config($className) {
		
		foreach( $className as $className ){
			
			$filename = SYSTEM_PATH."config/" . $className . ".php";
			if ( is_readable( $filename ) ) {
				require_once $filename;
			} 
			else {
				echo '<div class="alert alert-danger"><h1>Fatal Error</h1>
				<h4>Could not load core system file: '. $className .'.php</h4>
				Please ensure that the file exists and permission to read the file (644)
				</div>';
				exit;
			}
		}
	}	

	public function hooks($className) {
		
		foreach( $className as $className )
		{
			$filename = SYSTEM_PATH."hooks/" . $className . ".php";
			if ( is_readable( $filename ) ) {
				require_once $filename;
			}
			else {
				echo '<div class="alert alert-danger"><h1>Fatal Error</h1>
				<h4>Could not load hook file: <code>'. $className .'.php</code></h4>
				Please ensure that the file exists and permission to read the file (644)
				</div>';
				exit;
			}
		}
	}
	
	public function model($file) {
	
        $dir = MODELS_DIR;
		$file = ucwords($file);
		
		if( is_readable( $dir.$file.'Model.php' ) ) {
			require_once( $dir.$file.'Model.php' );
			$this->model = $file.'Model';
			return $this->model = new $this->model($this->db, $this->toolbox, $this->toolbox);
		}
		else
			require_once( $dir.'errors/model.php' );
    }

    public function tool($tool) {
		
		return $this->toolbox["$tool"];
	}

    public function toolbox($helper) {

	# Load a Toolbox helper
	return $this->toolbox["$helper"];
    }
	
    public function view($file, $data = NULL ){
    	
        $dir = VIEWS_DIR;

		if( is_readable($dir.$file.'.php') ) {
			require_once( $dir.$file.'.php' );
		}
		elseif( is_readable($dir.$file.'.inc') ) {
			require_once( $dir.$file.'.php' );
		}
		elseif( is_readable($dir.$file.'.html') ) {
			require_once( $dir.$file.'.php' );
		}
		elseif( is_readable($dir.$file.'.htm') ) {
			require_once( $dir.$file.'.php' );
		}
		elseif( is_readable($dir.$file.'.shtml') ) {
			require_once( $dir.$file.'.php' );
		}
		else {
			$filename = $dir.$file;
			self::viewerror($filename, $data);
		}
    }

    public function viewerror($file, $data = NULL){
    	
        $dir = VIEWS_DIR;

		if( is_readable($dir.$file.'.php') ) {
			require_once( $dir.$file.'.php' );
		}
		else {
			$filename = $file;
			require_once($dir.'errors/view.php');
		}
    }

    public function template($file, $data = NULL, $config){
		
        $dir = TEMPLATE_BASE_PATH;

		if( is_readable($dir.$file.'.php') ) {
			require_once( $dir.$file.'.php' );
		}
		elseif( is_readable($dir.$file.'.inc') ) {
			require_once( $dir.$file.'.php' );
		}
		elseif( is_readable($dir.$file.'.html') ) {
			require_once( $dir.$file.'.php' );
		}
		elseif( is_readable($dir.$file.'.htm') ) {
			require_once( $dir.$file.'.php' );
		}
		elseif( is_readable($dir.$file.'.shtml') ) {
			require_once( $dir.$file.'.php' );
		}
		else
			require_once($dir.'errors/template.php');
    }
}
