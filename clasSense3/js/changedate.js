$(function(){
	
	
	$(".ui-block-b a").click(function(){
		
		
		var date = $("#date").val();
		if(date!=""){
		var data            = 'date='+ date;
		
		$.ajax({
			type: "POST",
			data: data,
			url: "changedate.php",
			success: function(html)
			{
				window.location = 'index.php';
			}
	     });		
		
	}	
		});
	
	$(".ui-block-b a").click(function(){
		
		
		var date = $("#date2").val();
		if(date!=""){
		var data            = 'date='+ date;
		
		$.ajax({
			type: "POST",
			data: data,
			url: "changedate.php",
			success: function(html)
			{
				window.location = 'index.php';
			}
	     });		
		
	}	
		});
		$(".ui-block-b a").click(function(){
		
		
		var date = $("#date3").val();
		if(date!=""){
		var data            = 'date='+ date;
		
		$.ajax({
			type: "POST",
			data: data,
			url: "changedate.php",
			success: function(html)
			{
				window.location = 'index.php';
			}
	     });		
		
	}	
		});
	
	
	});