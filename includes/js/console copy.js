$("document").ready(function() {
    $("#console_input").submit(function() {
	    
	    //Define the array to send back 
        var data = {
            "response": "null",
            "link": "null",
            "commandtype": "null",
            //DEBUG
            "keywords": "null",
            "input_noPunc": "null",
            "topic": "null",
            "isQuestion": "null",
            "isAboutMe": "null",
            "isAboutUser": "null",
            "isAboutKnowledge": "null",
            "positiveWords": "null",
        };
        data = $(this).serialize() + "&" + $.param(data);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "includes/console.php", //Relative or absolute path to response.php file
            data: data,
            success: function(data) {
               sendToConsole2(data["command"])
               if (data["response"] == "null") {
	               
			   	// do nothing 
			   	
			   	} else if (data["commandtype"] == "/load") {
                    loadPage(data["link"])	
                    
                } else if (data["commandtype"] == "/memes") {
					alert("my name jeff");
					
				} else if (data["commandtype"] == "clear") {
                    setTimeout(function() {
                        $("#console").empty();
                        sendToConsole("Gone. But I'll remember...")
                    }, 100);					
                } else if (data["commandtype"] == "cls") {
                    $("#console").empty();
                    								   			
				} else {
					sendToConsole(data["response"], 600)					
				}
				
               
               console.log("Server Response:" + data["json"])
            },
            error: function(data) {
                sendToConsole("Error connecting to server")
            }
        });
        //reset command textbox
        document.getElementById('command').value = "";
        
        return false;
    });
});