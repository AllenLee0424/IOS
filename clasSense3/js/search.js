$(function() {
// $('#submitBtn').on('click', 'input.submitBtn', function() {
   $("#submitBtn").click(function(e) {
	   //   e.preventDefault();
        // getting the value that user typed
        var searchString    = $("#search-basic").val();
         var searchtoday = $('#searchtoday').val();
        // forming the queryString
        var data            = 'search='+ searchString +'& searchtoday='+ searchtoday;
          
       
         if(searchString=='')
        {
            $('.success').fadeOut(200).hide();
            $('.error').fadeIn(200).show();
        }
        // if searchString is not empty
        else {
            // ajax call
            $.ajax({
                type: "POST",
                url: "search.php",
                data: data,
               beforeSend: function(html) { // this happens before actual call
               // $("#resultlist").html(''); 
                //    $("#searchresults").show();
                  //  $(".word").html(searchString);
               },
               success: function(html){ // this happens after we get results
                   // $("#results").show();
                   // $("#resultlist").append(html);
                    $('#resultlist').empty();
				$('#resultlist').html(html).trigger("create");
                  
              }
            });    
        }
        return false;
    });
});
