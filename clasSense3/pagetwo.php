
<!-- Start of second page -->
<div id="pagetwo" data-role="page">
	
	<?php 
	           include('nav2.php');
           ?>


    <div data-role="main">

        <form id="postform" class="ui-body ui-body-a ui-corner-all"  method="POST" action="question.php">


            <h2  align="center">Create a new post</h2>


            <textarea  name="query" id="query" class="emojis-wysiwyg" placeholder="What is your question?"></textarea>
         
<a  style="background-color:#c73380;   color: white; text-shadow: none;"href="#myPopupEmo" data-rel="popup"  data-icon="home"><img src="img/happy.png" alt="emoticon" height="28" width="28">  </a>

<div data-role="popup" id="myPopupEmo" data-position-to="origin" data-transition="flip" class="ui-content" style="min-width:250px;">
	<p>
	<a class ="emo" id="emo1">:-)</a><a class ="emo" id="emo2">:)</a><a class ="emo" id="emo2">:o)</a><a class ="emo" id="emo4">:^)</a><a class ="emo" id="emo5">:-9</a>  
	
	<a class ="emo" id="emo6">;-)</a> 
	<a class ="emo" id="emo7">:-P</a> 
	<a class ="emo" id="emo8">:-p</a> 
	<a class ="emo" id="emo9">:-Þ</a> 
	<a class ="emo" id="emo10">:-b</a> 
	<a class ="emo" id="emo11">:-O</a> 
	<a class ="emo" id="emo12">:-/</a> 
	<a class ="emo" id="emo13">:-#</a> 
	
	<a class ="emo" id="emo14">:'(</a> 
	<a class ="emo" id="emo15">B-)</a> 
	<a class ="emo" id="emo16">8-)</a> 
	<a class ="emo" id="emo17">:-\</a> 
	<a class ="emo" id="emo18">;*(</a> 
	<a class ="emo" id="emo19">:]</a> 
	<a class ="emo" id="emo20">:&gt;</a> 
	
	
	
	</p>
	
	<p><a class ="emo" id="emo21">=]</a> 
		<a class ="emo" id="emo22">=)</a> 
	<a class ="emo" id="emo23">8)</a> 
	<a class ="emo" id="emo24">8-)</a> 
	<a class ="emo" id="emo25">:}</a> 
	<a class ="emo" id="emo26">:D</a> 
	<a class ="emo" id="emo27">8D</a> 
	<a class ="emo" id="emo28">XD</a> 
	<a class ="emo" id="emo29">xD</a> 
	<a class ="emo" id="emo30">:(</a> 
<a class ="emo" id="emo31">:&lt;</a> 

	<a class ="emo" id="emo32">:[</a> 
	<a class ="emo" id="emo33">:{</a> 
	<a class ="emo" id="emo34">=(</a> 
	<a class ="emo" id="emo35">;)</a> 
	<a class ="emo" id="emo36">;]</a> 
	<a class ="emo" id="emo37">;D</a> 
	<a class ="emo" id="emo38">:P</a> 
	<a class ="emo" id="emo39">:p</a> 
	</p>
</div>
 
  
<script>
	
		$(".emo").click(function(){
			// $('#query').val($('#query').val()+':)');
			the_id = $(this).attr('id');
			var emo = $("#"+the_id).text();
			var content = $('#query').val();
			var position = $("#query").getCursorPosition();
var newContent = content.substr(0, position) + " "+ emo+ " " + content.substr(position);
$('#query').val(newContent);
		//$("#query").append(":)");
		});
		
(function ($, undefined) {
    $.fn.getCursorPosition = function () {
        var el = $(this).get(0);
        var pos = 0;
        if ('selectionStart' in el) {
            pos = el.selectionStart;
        } else if ('selection' in document) {
            el.focus();
            var Sel = document.selection.createRange();
            var SelLength = document.selection.createRange().text.length;
            Sel.moveStart('character', -el.value.length);
            pos = Sel.text.length - SelLength;
        }
        return pos;
    }
})(jQuery);
</script>
 </p>


            <fieldset   data-role="controlgroup" data-mini="true" data-type="horizontal">
                <legend class ="emo" >Choose a emotion: </legend>
                <input  type="radio" name="sentiment" id="Neutral" value="Neutral" checked="checked" />
                <label for="Neutral">Neutral</label>
                
                <input  type="radio" name="sentiment" id="Curiosity" value="Curiosity"  />
                <label for="Curiosity">Curiosity</label>
                
                   <input  type="radio" name="sentiment" id="Interest" value="Interest"  />
                <label for="Interest">Interest</label>
                
                 <input  type="radio" name="sentiment" id="Satisfaction" value="Satisfaction"  />
                <label for="Satisfaction">Satisfaction</label>
                
                   <input  type="radio" name="sentiment" id="Confident" value="Confident"  />
                <label for="Confident">Confident</label>
                
                 <input  type="radio" name="sentiment" id="Enthusiastic" value="Enthusiastic"  />
                <label for="Enthusiastic">Enthusiastic</label>
                
                
                 <input  type="radio" name="sentiment" id="Confusion" value="Confusion"  />
                <label for="Confusion">Confusion</label>
                 <input  type="radio" name="sentiment" id="Dissatisfied" value="Dissatisfied"  />
                <label for="Dissatisfied">Dissatisfied</label>
                
                 <input  type="radio" name="sentiment" id="Disappointment" value="Disappointment"  />
                <label for="Disappointment">Disappointment</label>
                
                
                  <input  type="radio" name="sentiment" id="Boredom" value="Boredom"  />
                <label for="Boredom">Boredom</label>
                <input  type="radio" name="sentiment" id="Frustration" value="Frustration"  />
                <label for="Frustration">Frustration</label>
               

               

        

               

             

                <input  type="radio" name="sentiment" id="Dispirited" value="Dispirited"  />
                <label for="Dispirited">Dispirited</label>

  <input  type="radio" name="sentiment" id="Hopefulness" value="Hopefulness" />
                <label for="Hopefulness">Hopefulness</label>
              
               
             
                
               
               
            </fieldset>



                       <label for="flip-b">Private/Public:</label>
	<select name="slider" id="privatepublic" data-role="slider">
		
		<option value="public">Public</option>
                <option value="private">Private</option>
	</select> 
	
            <input  class="submitbtn" type="submit" id="Submit" value="Submit">
            <!--data-inline ="true"  -->
        </form>




    </div>

</div>
