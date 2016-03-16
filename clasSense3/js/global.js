// JavaScript Document
$(function(){
	$("#user").focus();
	$("input:text,textarea,input:password").focus(function() {
		$(this).addClass("cur_select");
    });
    $("input:text,textarea,input:password").blur(function() {
		$(this).removeClass("cur_select");
    });

	$('.loginbtn').click(function(){
		
	//$("#login").on('click',".btn",function(){
    //alert("sign");
		var user = $("#user").val();
		var pass = $("#pass").val();
		var topic = $("#topicSelect").val();
		var date = $("#date").val();
		if(user==""){
			$('<div id="msg" />').html("Username could not be empty").appendTo('.sub').fadeOut(2000);
			$("#user").focus();
			return false;
		}
		if(pass==""){
			$('<div id="msg" />').html("Password could not be empty").appendTo('.sub').fadeOut(2000);
			$("#pass").focus();
			return false;
		}
		
		$.ajax({
			type: "POST",
			url: "login.php?action=login",
			dataType: "json",
			data: {"user":user,"pass":pass,"topic":topic,"date":date},
			beforeSend: function(){
				$('<div id="msg" />').addClass("loading").html("Log in...").css("color","#999").appendTo('.sub');
			},
			success: function(json){
				if(json.success==1){
					$("#login_form").remove();
					 window.location = 'TopicSelect.php';
					var div =  "<div id='result'> </p><p><a href='#' id='logout'>Log out/a></p> </div>";
					
					document.getElementById("login").innerHTML =  "<div id='result'> </p><p><a href='#' id='logout'>Log out</a></p> </div>";
					
					//$("#myPopup").append(div);
				}else{
					$("#msg").remove();
					$('<div id="errmsg" />').html(json.msg).css("color","#999").appendTo('.sub').fadeOut(2000);
					return false;
					
				}
				
			}
		});
	});
		$('.finishbtn').click(function(){
		
	var topic = $("#topicSelect").val();
		var date = $("#date").val();

	 var data = 'topic='+topic + '& date=' + date ;	 
		$.ajax({
			type: "POST",
			url: "login.php?action=topic",
			data: data,
			beforeSend: function(){
					//alert('before');
			},
			success: function(msg){
					//alert('done');
					
					 window.location = 'mainpage.php';
					
					
			
				
			}
		});
	});
	$(".login").on('click',".logout",function(){
		$.post("login.php?action=logout",function(msg){
	//	alert("log");
			if(msg==1){
			    $("#result").remove();
			  			 						  
			   window.location = 'LoginPage.php';
			   // $("#myPopup").append(div);
			    
			    
			}
		});
	});
});