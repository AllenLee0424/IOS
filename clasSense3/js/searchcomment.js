$(function(){
	/*$("li.commentlist img.commentbtn").toggle(function(){
		alert("done");
$(this).next("li.commentlist div").slideUp();
},function(){
$(this).next("li.commentlist div").slideDown();
})
	*/
	
	
	$('#searchpostdiv').on('click', 'img.commentbtn', function() {
	//$("img.commentbtn").click(function(){
		 // the_id = substr($(this).attr('id'), 7);
		 
		the_id = $(this).attr('id');
		the_id = the_id.substring(13);
		//alert(  the_id);
		$("#searchdiv"+the_id).toggle("slow");
				//alert(  the_id);
		
	});
	
	 
	/*	
	$("li.commentlist").click(function(){
	//get the id
	the_id = $(this).attr('id');
   $("#comment"+the_id).
	// show the spinner
	//$(this).parent().html("<img src='images/spinner.gif'/>");
	
	//fadeout the vote-count 
	//$("span#votes_count"+the_id).fadeOut("fast");
	*/
	$('#searchpostdiv').on('click', 'input.commentsubmit', function(){
	//$("input.commentsubmit").click(function(){
		the_id = $(this).attr('id');
		
		the_id = the_id.substring(12);
		
	var commentString = $("#searchdiv"+ the_id+ " form input").val();
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
				 $("#searchdiv"+the_id+" ul ").append(html);
                   // alert(html);
			}
	});		}
		});
		
	});
