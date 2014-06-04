/* LOAD2DIV
- load the contents of a page into a div (or span, p, etc)
- target = the target file.. without .php extention
- div = the id or class of the element to load the result into
- get = some extra stuff we want to send to the target.. ex: ?id=123&abs=954
- error will be loaded into the div when it failes to load
(there is a aditional function to handel the reload on error)
*/

function load2div(target,div,get){
	$.ajax({
		type: "GET",
		url: "/ajax/"+target+".php"+get,
		timeout: 25000,
		cache: true,
		async: false,
		success: function(data){ 
			$(div).html(data);
		},
		error: function(x, t, m){
			$(div).html('<div class="erroredit"><h1>Error loading content</h1><p>Please <a href="'+div+"-"+target+"-"+get+'" id="reload2div">click here</a><p></div>');
		}
	});	
}

/* RELOAD2DIV 
- reload div when load2div failes and the link is clicked
*/
$(document).on("click","#reload2div",function(){	 
	var page = $(this).attr("href");
	var page_data = page.split('-');	
	$(page_data[0]).html('<div style="vertical-align:middle; text-align:center; margin-top:20px;"><img src="img/loading.gif" width="40" height="40" /></div>');
	load2div(page_data[1],page_data[0],page_data[2]);
	return false;
});

/* LBUTTON2DIV (link button to div)
- load stuff to a div when a link is clicked lbutton2div (class="lbutton2div")
- the link button needs to have the class 
- the link of a button needs to contain a href with the div name (ex: href="#maindisplay")
- the id of the button needs to contain a id with load-id-file-get 
(ex: id="load-123-punishments-id")
- this function uses load2div to load the data
(the above example would load the contents of punishments.php into the maindisplay_div)

Note: some things in this function are note needed or might look wierd, however they are very 
usful for implementing other things in the future
*/
$(document).on("click",".lbutton2div",function(){
	var button_id = $(this).attr("href"); // for opening the _div
	var button_name = $(this).attr("id");  // open or load-id-file-get	
	var name_data = button_name.split('-');
	var name_div = button_id+"_div";
	
	if(name_data[0] == "load"){ // if load
	  var name_id = name_data[1];	
		var name_file = name_data[2];
		var name_get = name_data[3];
	  
	  var get = "";
		if(name_get){
			get = "?"+name_get+"="+name_id;
			// this could be fixed to support multiple parameters...
			// however i would consider using a form post instead
			// and then serialize the data
		}			
		load2div(name_file,name_div,get);
	}
	
	// if no load... well we dont have that yet.. i personaly use more then just load
	// thats why its there.. 
	
  return false;
});
