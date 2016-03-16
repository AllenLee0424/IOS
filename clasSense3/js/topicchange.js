$(function(){
	
	
	
	$( ".target" ).change(function() {
      
  var topic = $( ".target option:selected" ).val()
		
		var data            = 'topic='+ topic;
		
		$.ajax({
			type: "POST",
			data: data,
			url: "topicchange.php",
			success: function(html)
			{
				window.location = 'index.php';
			}
	     });		
		
		
		});

  $( ".target2" ).change(function() {
      
  var topic = $( ".target2 option:selected" ).val()
	
		var data            = 'topic='+ topic;
		
		$.ajax({
			type: "POST",
			data: data,
			url: "topicchange.php",
			success: function(html)
			{
				window.location = 'index.php';
			}
	     });		
		
		
		});
 $( ".target3" ).change(function() {
      
  var topic = $( ".target3 option:selected" ).val()
	
		var data            = 'topic='+ topic;
		
		$.ajax({
			type: "POST",
			data: data,
			url: "topicchange.php",
			success: function(html)
			{
				window.location = 'index.php';
			}
	     });		
		
		
		});

  
  
});
	
	
