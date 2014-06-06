// SHOW ERRORS
ini_set('display_errors', 1); error_reporting(E_ALL);
// or not: 	error_reporting(E_ALL ^ E_NOTICE);

// SET CHARSET (for input)
header('Content-Type: text/html; charset=utf-8');
// <form action="action.php" accept-charset="utf-8">

// SET TIMEZOME 
date_default_timezone_set('America/Los_Angeles'); 

// SET DEFINES
define('DS', DIRECTORY_SEPARATOR);
if(empty($_SERVER['DOCUMENT_ROOT'])){
   $_SERVER['DOCUMENT_ROOT'] = dirname(dirname(__FILE__));   
}
define('ROOT', $_SERVER["DOCUMENT_ROOT"] . DS);   
define('RES' , ROOT . 'res' . DS);
define('SES', ROOT . 'res' . DS . 'ses' . DS);

define('LIB', ROOT); // LIB = library (the place the classes are stored... currently set to root)
// this is used in the autoloader and might be used in other scripts
// if you deside to move stuff to other folders or such.. you dont need to change the scripts  
// but just the definition itself.
// ex: include('library/_func.php'); VS include(LIB.'/_func.php'); 

// SET AUTOLOADER (for loading classes without including them first)
function __autoload($className){
    $file = LIB . $className . '.php';
    if(file_exists($file)) {
        require_once $file;
    }else{
		echo "error: file not found"; exit;
	}
}

/* OPTIONAL (view loader)
additional script required for loading the view
This is great for using for example templates (or adding multiple styles)
- in simple:
  it loads a file and sends a data array to it.. and then stores the output of that in a variable
  that variable can then be echo'ed to output the html
- I personaly use this to limmit the amount of code on "style" pages or html pages.... as in the page
  contains a minimum amount of code so its easy to work with for none programmers... the data that page
  needs can be used with a simple array output like <?php echo $data['id']; ?>
  
// VIEW LOADER
class view{
	public function __construct(){	

	}
	public function get($fileName, $data){
		$viewFile = VIEW . $fileName . ".php"; 
        if(file_exists($viewFile)){
			ob_start();
            include_once($viewFile);	
			return ob_get_clean();	
        }else{
			echo "error including view"; exit;
		}
	}	
}
*/
