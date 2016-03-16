$(function(){
	
	
	$("#popularpost").click(function(){
		 // the_id = substr($(this).attr('id'), 7);
		
		var data = "popular=1"; 
		
		
		$.ajax({
			type: "POST",
			data: data,
			url: "addpost2.php",
			success: function(html)
			{
						$('#postdiv').empty();
						$('#postdiv').html(html).trigger("create");
						$('.postingquery').emoticonize({
				//delay: 800,
				//animate: false,
				//exclude: 'pre, code, .no-emoticons'
			});
			$('.emo').emoticonize({
				//delay: 800,
			animate: false,
				//exclude: 'pre, code, .no-emoticons'
			});
				//$("#postdiv").listview("refresh"); 
				// $('#postdiv').append(html);
			// location.reload();
                    
			}
	});		
	});
	
	$("#allpost").click(function(){
		 // the_id = substr($(this).attr('id'), 7);
		
	var	data = "all=1"; 
		
		
		$.ajax({
			type: "POST",
			data: data,
			url: "addpost2.php",
			success: function(html)
			{
				$('#postdiv').empty();
								 $('#postdiv').html(html).trigger("create");
								 $('.postingquery').emoticonize({
				//delay: 800,
				//animate: false,
				//exclude: 'pre, code, .no-emoticons'
			});
			$('.emo').emoticonize({
				//delay: 800,
			animate: false,
				//exclude: 'pre, code, .no-emoticons'
			});
								// $("#postdiv").listview("refresh");
								 
				// $('#postdiv').append(html);
              //location.reload();
			}
	});		
	});
	
});