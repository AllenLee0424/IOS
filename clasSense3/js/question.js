
$(function() {

//function to submit form
//using ajax
    $("#Submit").click(function(e) {
        e.preventDefault();
        var form = $('#postform');
        var query = $("#query").val();
        var sentiment = $('input[name=sentiment]:checked').val();
       
        
        var privatepublic = $('#privatepublic').val();
        
        
   
       
       // var dataString = 'name='+ name + '& email=' + email + '& phone=' + phone + '& comment=' + comment;
		var dataString = 'query=' +query +'& sentiment=' + sentiment+ '& privatepublic=' + privatepublic;
        if(query=='')
        {
	       alert("Question could not be empty");
           // $('.success').fadeOut(200).hide();
           // $('.error').fadeIn(200).hide();
        }
        else
        {
	      
            $.ajax({
                type: "POST",
                url: "question.php",
               //dataType: 'jason', // request type html/json/xml
                   data: dataString,// serialize form data 
                   
               
                success: function(){
                
                    $('#form').fadeOut(200).hide();
                    $('.success').fadeIn(200).show();
                    $('.error').fadeOut(200).hide();
                  
                    window.location = 'index.php';
                }
            });
        }
        return false;
    });
});



