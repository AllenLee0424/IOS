
$(function(){
	
	
	$('#searchpostdiv').on('click', 'a.vote_up', function() {
	//$("a.vote_up").click(function(){
	//get the id
	
	the_id = $(this).attr('id');
	the_id = the_id.substring(6);
   var like =  (parseInt($("#searchvotes_count2"+the_id).html(), 10)+1);
   var likedown =  (parseInt($("#searchvotes_count2"+the_id).html(), 10)-1);
   
	//fadeout the vote-count 
	$("span#searchvotes_count"+the_id).fadeOut("fast");
	
	//the main ajax request
		$.ajax({
			type: "POST",
			data: "action=vote_up&id="+$(this).attr("id").substring(6),
			url: "vote2.php",
			success: function(html)
			{
				if(html==1)
				$("#searchvotes_count2"+the_id).text(like);
				else if(html==2){
					$("#searchvotes_count2"+the_id).text(likedown);
				}
							//$("span#votes_count"+the_id).html(msg);
				//fadein the vote count
				///$("span#votes_count"+the_id).fadeIn();
				//remove the spinner
				//$("span#vote_buttons"+the_id).remove();
				//$("span#votes_count2"+the_id).text(parseInt($("span#votes_count2"+the_id).text())+1);
				
				//create a like table
				//the like table will store each post (post)'s no matter likes and dislikes
			}
		});
	});
	$('#searchpostdiv').on('click', 'a.vote_down', function() {
	//$("a.vote_down").click(function(){
	//get the id
	
	the_id = $(this).attr('id');
	the_id = the_id.substring(6);

var dislike =  (parseInt($("#searchvotes_count3"+the_id).html(), 10)+1);
var dislikedown =  (parseInt($("#searchvotes_count3"+the_id).html(), 10)-1);
	// show the spinner
	//$(this).parent().html("<img src='images/spinner.gif'/>");
	
	//the main ajax request
		$.ajax({
			type: "POST",
			data: "action=vote_down&id="+$(this).attr("id").substring(6),
			url: "vote2.php",
			success: function(html)
			{
				if(html==1)
				$("#searchvotes_count3"+the_id).text(dislike);
           else if(html==3){
	           
	           $("#searchvotes_count3"+the_id).text(dislikedown);

           }
				///$("span#votes_count"+the_id).fadeOut();
				//$("span#votes_count"+the_id).html(msg);
				//$("span#votes_count"+the_id).fadeIn();
				//$("span#vote_buttons"+the_id).remove();
			}
		});
	});






	
	$('#postdiv').on('click', 'a.vote_up', function() {
	//$("a.vote_up").click(function(){
	//get the id
	the_id = $(this).attr('id');
   var like =  (parseInt($("#votes_count2"+the_id).html(), 10)+1);
   var likedown =  (parseInt($("#votes_count2"+the_id).html(), 10)-1);
      //like = parseInt(like,10) +1;
	// show the spinner
	//$(this).parent().html("<img src='images/spinner.gif'/>");
	
	//fadeout the vote-count 
	$("span#votes_count"+the_id).fadeOut("fast");
	
	//the main ajax request
		$.ajax({
			type: "POST",
			data: "action=vote_up&id="+$(this).attr("id"),
			url: "vote2.php",
			success: function(html)
			{
				if(html==1)
				$("#votes_count2"+the_id).text(like);
				else if(html==2){
					$("#votes_count2"+the_id).text(likedown);
				}
							//$("span#votes_count"+the_id).html(msg);
				//fadein the vote count
				///$("span#votes_count"+the_id).fadeIn();
				//remove the spinner
				//$("span#vote_buttons"+the_id).remove();
				//$("span#votes_count2"+the_id).text(parseInt($("span#votes_count2"+the_id).text())+1);
				
				//create a like table
				//the like table will store each post (post)'s no matter likes and dislikes
			}
		});
	});
	$('#postdiv').on('click', 'a.vote_down', function() {
	//$("a.vote_down").click(function(){
	//get the id
	
	the_id = $(this).attr('id');
var dislike =  (parseInt($("#votes_count3"+the_id).html(), 10)+1);
var dislikedown =  (parseInt($("#votes_count3"+the_id).html(), 10)-1);
	// show the spinner
	//$(this).parent().html("<img src='images/spinner.gif'/>");
	
	//the main ajax request
		$.ajax({
			type: "POST",
			data: "action=vote_down&id="+$(this).attr("id"),
			url: "vote2.php",
			success: function(html)
			{
				if(html==1)
				$("#votes_count3"+the_id).text(dislike);
           else if(html==3){
	           
	           $("#votes_count3"+the_id).text(dislikedown);

           }
				///$("span#votes_count"+the_id).fadeOut();
				//$("span#votes_count"+the_id).html(msg);
				//$("span#votes_count"+the_id).fadeIn();
				//$("span#vote_buttons"+the_id).remove();
			}
		});
	});
});	
