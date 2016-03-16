v<div id="pagethree" data-role="page">

    <?php 
	           include('nav3.php');
           ?>

    <div role="main" class="ui-content">


        <div class="ui-field-contain" id="submitdiv">
            <h2 align="center">Search</h2>

            <!-- <fieldset  data-role="controlgroup" data-type="horizontal">
            <legend>Select Topic:</legend>
            <input type="checkbox" name="radio-choice" id="radio-choice-1" value="choice-1" >
            <label for="radio-choice-1">#CreateClass</label>
           
            <input type="checkbox" name="radio-choice" id="radio-choice-2" value="choice-2">
            <label for="radio-choice-2">#VariableType</label>
           
            <input type="checkbox" name="radio-choice" id="radio-choice-3" value="choice-3">
            <label for="radio-choice-3">#CreateObject</label>
           
            <input type="checkbox" name="radio-choice" id="radio-choice-4" value="choice-4">
            <label for="radio-choice-4">#Statement</label>
          </fieldset>-->
            <br>
            <form id="searchform" class="ui-body ui-body-a ui-corner-all"  method="GET" action="search.php">
                <input type="search" name="search" id="search-basic" value="" placeholder="What is your query?">



 <label for="flip-b">Search:</label>
	<select name="slider"  id="searchtoday" data-role="slider">
		
		<option value="today">Today</option>
                <option value="all">All date</option>
	</select> 


                <input type="submit" name="submitsearch" class="submitBtn" id="submitBtn" value="Search">
                <!--data-inline ="true"  -->

            </form>
</div>

             <div id="searchpostdiv">
	             <ul  id="resultlist" class='postinglist' >
                
                    
                </ul>

            </div>

        

    </div>
</div>
