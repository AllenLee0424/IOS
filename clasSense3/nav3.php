   <div style="background-color:#c73380;" data-role="header">
                <a  style="background-color:#c73380;   color: white; text-shadow: none;"href="#myPopup3" data-rel="popup"  data-icon="home"> &nbsp;Sign out/Change Data/Topic </a>
                <h1 style="color: white;    text-shadow: none;">ClasSense</h1>

                <a   onclick="myFunction()" style="background-color:#c73380;"href="#"  data-icon="refresh"  >&nbsp;</a>






                <script>
                    function myFunction() {
                        location.reload();
                    }
                </script>

                <!-- pop up information -->
                <!-- not done yet-->

                <div data-role="popup" id="myPopup3" data-position-to="origin" data-transition="flip" class="ui-content" style="min-width:250px;">
                 
                    <div class="login" >
                        <?php
                        if (isset($_SESSION['user'])) {
                            ?>
                            <div class= "result" id="result">
<div data-role="fieldcontain">
                    <label for="select-choice-1" class="select">Topic:</label>
                    <select class="target3" name="select-choice-1" >
                        <?php
                        //get the topic list from database 
                        $sql = "SELECT * FROM Topics;";
                        $retval = mysql_query($sql, $link);
                        if (!$retval) {
                            die('Could not enter data: ' . mysql_error());
                        }

                        while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {

                            $topicName = $row['topicName'];
                            $topicID = $row['topicID'];
                            $tt = $_SESSION['topic'];
                            if($tt==$topicID){
	                            
	                         echo "<option value='" . $topicID . "' selected >" . $topicName . "</option>";   
                            }else{
                            echo "<option value='" . $topicID . "'>" . $topicName . "</option>";
                            }
                        }
                        ?>

                    </select>
                </div>
  <div id = "div1"class="ui-grid-a">
                <div id="blocka" class="ui-block-a">
                    <div data-role="fieldcontain">
                        <label for="text-basic">Date</label>
                        <input id="date3" type="text" class="date-input-inline" data-inline="false" data-role="date" >
                    </div>
                </div>
                <br>
                <div id ="blockb" class="ui-block-b">
                    <a  id="changedate" href="#" class="ui-btn ui-icon-edit ui-btn-icon-notext ui-corner-all" data-inline="true">No text</a>

                </div>
            </div>

                            </p><p><a href='#' class='logout'>Sign out</a></p>
                    </div>

                <?php } else { ?>
                    <div id="login_form">
                        <p><label>Username:</label> <input type="text" class="input" name="user" id="user" /></p>
                        <p><label>Password:</label> <input type="password" class="input" name="pass" id="pass" /></p>
                        <div class="sub">
                            <input type="submit" class="btn" value="Log In" />
                        </div>
                    </div>
                <?php } ?> 
            </div>
            <!-- </form>-->
        </div>
        <!-- end pop up-->
    </div>

    <!-- start navbar -->

    <div data-role="navbar" data-position="fixed">
        <ul >
            <li><a  href="#pageone" class="ui-btn ui-btn-icon-left ui-icon-grid">Display all posts</a></li>
            <li><a  href="#pagetwo" class="ui-btn ui-icon-edit ui-btn-icon-left">Create a new post</a></li>
            <li><a   href="#pagethree"  class="ui-btn ui-btn-icon-left ui-icon-search" >Search</a></li>

        </ul>
    </div>
