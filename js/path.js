$(function(){
	
	// container is the DOM element;
	// userText is the textbox
	
	var container = $("#container")
		userText = $('#userText1'); 
	
	// Shuffle the contents of container
	container.getPath();

	// Bind events
	userText.click(function () {
		
	  userText.val("");
	  
	}).bind('keypress',function(e){
		
		if(e.keyCode == 13){
			
			// The return key was pressed
			
			container.getPath({
				var pathdir: userText.val()
			});
			
			//userText.val("");
		}

	});

	// Leave a 4 second pause
	return pathdir
	
	
});

