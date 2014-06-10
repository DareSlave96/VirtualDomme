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
		url: target+".php"+get,
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


// SAVEBUTTON
$(document).on("click",".savebutton",function(){
	
	var button_name = $(this).attr("name"); // for loading_ and saved_	
	phptarget = $(this).attr("alt"); // for scripts that resive the post.... ex: if $_POST['phptarget'] == X
	var form = this.form;	
	var form_id = $(form).attr("id");
	
	var data = $(form).serialize(); // serialize form data... target script can get this in $_POST[]
	$("#loading_"+button_name).fadeIn("slow");	
	var target = $('#'+form_id+' input[name=target]').val(); //take target from hidden form field called target
	
	post2ajax(target,data,button_name,phptarget);
	
return false;
});	

// POST2AJAX
function post2ajax(target,post_data,button_name,phptarget){
	//alert("tar="+target+" - p2a="+post_data);
	$("#saved_"+button_name).removeClass();		
	post_data += "&phptarget=" + encodeURIComponent(phptarget); 
	$.ajax({
		type: "POST",
		url: "/ajax/"+target+".php",
		timeout: 25000,
		cache: false,
		data: post_data,
		success: function(response){ //OK|message
			$("#loading_"+button_name).fadeOut("slow");
			var response_data = response.split('|');
			var response_msg = response_data[1];	
			if(response_data[0] == "OK" || response_data[0] == "RELOAD"){
				$("#saved_"+button_name).addClass('green');
				$("#saved_"+button_name).text(response_msg);
				$("#saved_"+button_name).fadeIn("slow").delay(5000).fadeOut("slow");
			}else{
				$("#saved_"+button_name).addClass('red');
				$("#saved_"+button_name).text(response_msg);
				$("#saved_"+button_name).fadeIn("slow");
			}			
			
			if(response_data[0] == "RELOAD"){			
				var reload_type = response_data[2];
				var reload_target = response_data[3];
				var reload_div = response_data[4];
				var reload_get = response_data[5];
				loadedfbuttons = [];
				
				if(reload_type == "page"){
					//loadpagediv("/ajax/card.php","#card_page");
					loadpagediv("/ajax/"+reload_target+".php","#"+reload_div);
				}else if(reload_type == "div"){
					// load2div("card_edit","#edit16_div","?card_id=16")
					load2div(reload_target,"#"+reload_div,"?"+reload_get)
				}			
			}
		error: function(x, t, m){
			//alert(x+" - "+t+" - "+m);
			$("#loading_"+button_name).fadeOut("slow");
			$("#saved_"+button_name).addClass('red');
			$("#saved_"+button_name).text('Failed to connect, please try again');
			//$("#saved_"+button_name).fadeIn("slow").delay(5000).fadeOut("slow");
			$("#saved_"+button_name).fadeIn("slow");
		}
	});
}
