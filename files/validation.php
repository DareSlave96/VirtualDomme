//////////////////////
// VALIDATION CLASS //
//////////////////////

class validation{
	
	public function __construct(){
		
    }
	
	// NUMBER
	public function number($num){
		if(is_numeric($num)){
			return TRUE;
		}
		return FALSE;		
	}
	
	// ASCII 
	public function ascii($data){
		if(!mb_detect_encoding($data, 'ASCII', true)){
			return FALSE;				
		}
		return TRUE;
	}
	
	// TEXT 
	public function text($data){		
		if(preg_match("/^[a-zA-Z0-9-_]+$/", $data) && $data != ""){return TRUE;}
		return FALSE;
	}

}
