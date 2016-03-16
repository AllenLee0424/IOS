$(function() {
	
	$("#signBtn").click(function(e) {
	      e.preventDefault();
var username = $('#username').val();
var password = $('#password').val();
var FName = $('#firstname').val();
	var LName = $('#lastname').val();


if(username.size ==0 || password.size== 0 || FName.size ==0 ||LName == ''){
	alert("some empty");
}

 else {
	 
	 var data = 'username='+username + '& password=' + password + '& FName=' +  FName +'& LName=' + LName;
	 
	            // ajax call
             $.ajax({
                type: "POST",
                url: "signup.php",
                data: data,
               beforeSend: function(html) { // this happens before actual call
               // 
                //    $("#searchresults").show();
                  //  $(".word").html(searchString);
               },
               success: function(html){ // this happens after we get results
                   // $("#results").show();
                    //$("#resultlist").append(html);
                    
	                    // alert(html);
	                     
	                     if(html =='1'){
		                      window.location = 'TopicSelect.php';

	                     }
                                       //alert("done");
              
            }
            });

            
            
            
            
            
            
            
            
           }            


	
	
	
	
	
	
	
	
	
	
	});
	
	
	});