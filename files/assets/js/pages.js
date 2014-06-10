var lastpage = "";
var loadedpages = new Array();

// WHEN PAGE FINISHES LOADING (only runs ones)
$(document).ready(function(){	
	var page = window.location.hash;
	if(!page){page = "#home";}	
	loadmenu(page);
	
	// SET MENU CLICKS	
	$('#menu a').on('click', function(event){
		loadpage(this.hash);
  	}); 
});

// LOAD MENU
function loadmenu(page){
	$("#menu").html('<img src="img/loading.gif" width="25" height="25" />');	
	$.ajax({
		type: "GET",
		url: "/pages/menu.php",
		timeout: 25000,
		cache: false,
		success: function(data){ 
			$("#menu").html(data);
			loadpage(page);	
		},
		error: function(x, t, m){
			$("#menu").html('<a id="reloadmenu" href="/" onclick="loadmenu();return false;">Error loading menu, please click here to try again.</a>');
			loadpage(page);	
		}
	});
}

// CHECK URL
function checkpageurl(){
	var hash = window.location.hash;
	if(hash && hash != lastpage){
		loadpage(hash);
	}
}
window.onhashchange = checkpageurl;

// RELOAD BUTTON (shown when error loading page)
$(document).on("click","#reloadpage",function(){	 
	var page = $(this).attr("href");
	var pagename = page.substr(1);
	loadedfbuttons = []; //clear loaded button divs
	loadpagediv("/pages/"+pagename+".php",page+"_page");	
});

// LOADPAGE
function loadpage(page){	
	if(page != lastpage){ //change page	
		if(lastpage != ""){			
			$('#menu a[href="'+lastpage+'"]').removeClass('active');
			$(lastpage+"_page").slideUp("slow");	
		}
		$('#menu a[href="'+page+'"]').addClass('active');				
		lastpage = page;
		var pagename = page.substr(1);
		if(loadedpages.indexOf(pagename) == -1){ 		
			loadedpages.push(pagename);
			loadpagediv("/pages/"+pagename+".php",page+"_page");	
		}else{$(page+"_page").slideDown("slow");}		
	}
}

// LOADPAGEDIV
function loadpagediv(target,div){	
	$('#loading').fadeIn("slow");
	$.ajax({
		type: "GET",
		url: target,
		timeout: 25000,
		cache: false,
		success: function(data){ 
			$('#loading').fadeOut("slow");
			$(div).html(data);
			$(div).slideDown("slow");			
		},
		error: function(x, t, m){
			$('#loading').fadeOut("slow");
			var relink = div.split('_');
			relink = relink[0];
			$(div).html('<div id="errorcell"><h1>Error loading page content</h1><p>Please <a href="'+relink+'" id="reloadpage">click here</a> to try again.<p></div>');
			$(div).slideDown("slow");			
		}
	});	
}
