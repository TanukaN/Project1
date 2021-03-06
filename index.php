<?php
    ini_set('display_errors', 'On');				//Debugging messages set to 'ON'
    error_reporting(E_ALL);	

    class Manage {						//Defining a class with autoload function to attempt to load undefined class
	public static function autoload($class) {
	    include $class . '.php';
	}
    }
    spl_autoload_register(array('Manage', 'autoload'));
    
    $obj = new main();						//Instantiating object for class main	
    
    class main {
	public function __construct() {
	    $pageRequest = 'uploadForm';
	    if(isset($_REQUEST['page'])) {
		$pageRequest = $_REQUEST['page'];
	    }
	    $page = new $pageRequest;
	    if($_SERVER['REQUEST_METHOD'] == 'GET') {
		$page->get();
	    } else {
		$page->post();
	    }
	}
    }
?>
