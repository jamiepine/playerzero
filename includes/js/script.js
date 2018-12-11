
function sendToConsole(message, delay) {
   
    var timeStamp = Math.floor(Date.now() / 1000);
    
    setTimeout(function() {
    		$('#console').append("<div class=\"line_bright\">[zero] " + message + "</div>");
//    		    setTimeout(function() {
//					$('.line_bright').addClass('line_fadeout');
//    			}, 500);     
     }, delay);      
}
function sendToConsole2(message, delay) {
   

    
    setTimeout(function() {
    		$('#console').append("<div class=\"line_bright\">[guest] " + message + "</div>");
    		    setTimeout(function() {
					$('.line_bright').addClass('line_fadeout');
    			}, 500);     
     }, delay);      
}






setTimeout(function(){
    document.getElementById('line1').style.visibility = "visible";
    },100);
    setTimeout(function(){
    document.getElementById('line2').style.visibility = "visible";
    },200);
    setTimeout(function(){
    document.getElementById('line3').style.visibility = "visible";
    },300);
    setTimeout(function(){
    document.getElementById('line4').style.visibility = "visible";
    },1000);
    setTimeout(function(){
    document.getElementById('line5').style.visibility = "visible";
    },1300);
    setTimeout(function(){
    document.getElementById('menu1').style.visibility = "visible";
    },1500);
    setTimeout(function(){
    document.getElementById('menu2').style.visibility = "visible";
    },1550);
    setTimeout(function(){
    document.getElementById('menu3').style.visibility = "visible";
    },1600);
    setTimeout(function(){
    document.getElementById('menu4').style.visibility = "visible";
    },1650);
    setTimeout(function(){
    document.getElementById('menu5').style.visibility = "visible";
    },1700);
    setTimeout(function(){
    document.getElementById('menu6').style.visibility = "visible";
    },1750);
    setTimeout(function(){
    document.getElementById('menu7').style.visibility = "visible";
    },1800);
    setTimeout(function(){
    document.getElementById('menu8').style.visibility = "visible";
    },1850);
    setTimeout(function(){
    document.getElementById('console_input').style.visibility = "visible";
    	var input = document.getElementById('command');
			input.focus();
			input.select();
    },1900);
    
    setTimeout(function(){
    document.getElementById('contentwrapper').style.opacity = "1";
    	var myElement = document.querySelector("#sidebar_content");
		myElement.style.color = "#7b7b7b";
    },2000);

	setTimeout(function(){
    // closeNav();
    document.getElementById('sidebar_open').style.display = "block";
    document.getElementById('logo').style.visibility = "visible";
    },2300);


    

    
    
    
 // setTimeout(function(){
 // document.getElementById('initialiser').style.display = "none";
 // },2000);
 //  setTimeout(function(){
//   document.getElementById('menu').style.display = "none";
// },2000);
   
   
   

   
    
/* Open the Nav */
function openNav() {
	//HIDE OPEN BUTTON
	document.getElementById("sidebar_open").style.display = "none";
	//CLOSE SIDEBAR
    $('#sidebar').addClass('navOpen');
    $('#pageHeader').addClass('navOpen');
    $('#contentcolumn').addClass('navOpen');
    
    $('#sidebar').removeClass('navClosed');
    $('#pageHeader').removeClass('navClosed');
    $('#contentcolumn').removeClass('navClosed');
    //SHOW CLOSE BUTTON
	document.getElementById("sidebar_close").style.display = "block";
	
	//    	var input2 = document.getElementById('command');
	//		input2.focus();
	//		input2.select();
}

/* Close the Nav */
function closeNav() {
	//HIDE CLOSE BUTTON
	document.getElementById("sidebar_close").style.display = "none";
	//CLOSE SIDEBAR
    $('#sidebar').removeClass('navOpen');
    $('#pageHeader').removeClass('navOpen');
    $('#contentcolumn').removeClass('navOpen');
    
    $('#sidebar').addClass('navClosed');
    $('#pageHeader').addClass('navClosed');
    $('#contentcolumn').addClass('navClosed');
    //SHOW OPEN BUTTON
	document.getElementById("sidebar_open").style.display = "block";
}



function loadPage(filename, menuid) {
	
	var timeStamp = Math.floor(Date.now() / 1000);
	
    $('.selected').removeClass('selected');
    setTimeout(function() {
    $('#console').append("<div class=\"line_bright\">["+ timeStamp +"] Loading data from "+ filename +"</div>");
    }, 200);    
    setTimeout(function() {
       $('.line_bright').addClass('line_fadeout');
    }, 500);
    $("#contentcolumn").load(filename, function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success")
        $('#console').append("<div class=\"line_bright\">[06:06:18+00:00] Success</div>");
        window.history.pushState("object or string", "Title", "?page="+ filename +"");    
        setTimeout(function() {
           $('.line_bright').addClass('line_fadeout');
           $(menuid).addClass('selected');
        }, 500);
        if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
    });
}


    