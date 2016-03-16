$(function(){

	
	$('#postdiv').on('click', 'img.commentbtn', function() {
	//$("img.commentbtn").click(function(){
		 // the_id = substr($(this).attr('id'), 7);
		 
		the_id = $(this).attr('id');
		the_id = the_id.substring(7);
		//alert(  the_id);
		$("#div"+the_id).toggle("slow");
	});
	
	 
	
	$('#postdiv').on('click', 'input.commentsubmit', function(){
	//$("input.commentsubmit").click(function(){
		the_id = $(this).attr('id');
		
		the_id = the_id.substring(6);
		
	var commentString = $("#div"+ the_id+ " form input").val();
	if(commentString!=""){
	//alert(commentString);
	var data            = 'comment='+ commentString + '& id=' + the_id;

	//the main ajax request
	$.ajax({
			type: "POST",
			data: data,
			url: "comment.php",
			success: function(html)
			{
				//$("#div"+the_id+" ul ").html(html).trigger("create");
				 $("#div"+the_id+" ul ").append(html);
                  
			}
	});		}else{
		alert("comment could not be empty");
	}
		});
		
	});
