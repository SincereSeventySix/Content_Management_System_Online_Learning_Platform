<?php
echo <<<_END

  <div id="preConHold">
    <div class="preConVids"></div>
    <div class="preConVids"></div>
    <div class="preConVids"></div>
    <div class="preConVids"></div>
    <div class="preConVids"></div>
  </div>

  <div id="wrapwork">
    <div id="inner_vid">
    <div title="No Lesson Loaded" id="logoVid"> </div> 
  </div>
  

  <div id="controls">
    <button title="Play Current Lesson" id="start"></button>
    <button title="Stop Current Lesson" id="stop"></button>
    <button title="Pause Current Lesson" id="pause"></button>
    <span id="feedback"></span>
  </div>

  <div id="cludge"> </div>


      <div id="cvh_outer">
      <p id="lessonOrder">$session_user's Otutor</p>
       <div id="concept_video_holder">
       <ol id="video_table">
         
_END;

$user = $_SESSION['user_id'];
$name = $user . $_SESSION['username'] . '_les_order';
$dbc = mysqli_connect("localhost", "root", "", "students");
$query = "SELECT * FROM $name";
$data = mysqli_query($dbc, $query);
$butCount1 = 30;
$butCount2 = 1;

if ($data !== FALSE)
{
  while ($row = mysqli_fetch_array($data)) 
  {
    if ($row['les_stat'] == 0 && $row['cur_less'] == 1)
    {
      $toolId = "\"" . $row['les_loc']  . "\"";
      $butName = $row['les_name'];
      echo  '<li title="' . $_SESSION['username'] . '\'s Active Video-Lesson" class="lesson_active nostyle" id=' . $toolId . ' onclick="loadLesson(this.id); highLightLes(this.id)">' . $butName . '</li>';
      $butCount1 = $butCount1 - 1;
      $butCount2 = $butCount2 + 1;
    }
    elseif ($row['les_stat'] == 1 && $row['cur_less'] == 1)
    {
      $toolId = "\"" . $row['les_loc']  . "\"";
      $butName = $row['les_name'];
      echo  '<li title="' . $_SESSION['username'] . '\'s Completed Video-Lesson" class="lesson_complete nostyle">' . $butName . '</li>';
      $butCount1 = $butCount1 - 1;
      $butCount2 = $butCount2 + 1;
    }
    elseif ($row['les_stat'] == 0 && $row['cur_less'] == 0)
    {
      $toolId = "\"" . $row['les_loc']  . "\"";
      $butName = $row['les_name'];
      echo  '<li title="' . $_SESSION['username'] . '\'s Inactive Video-Lesson"  class="lesson_inactive nostyle">' . $butName . '</li>';
      $butCount1 = $butCount1 - 1;
      $butCount2 = $butCount2 + 1;
    }
    
  }  
    for ($butCount2; $butCount2 < 31; $butCount2++) 
  {
    echo '<li  class="lesson_inactive nostyle">' . $butCount2 . '</li>';
  }
}
else
{
  for ($butCount2; $butCount2 < 31; $butCount2++) 
 {
  echo '<li title="' . $_SESSION['username'] . '\'s Future Lessons" class="lesson_inactive nostyle">Lesson TBA ' . $butCount2 . '</li>';
 }
}
mysqli_close($dbc);

  echo <<<_END

      </ol>
          
       </div>
      </div>
    <div id="inner1"></div> 
    
  
  
    <div id="inner2">
        <img title="Plato" class="contain" src="userImages/plato.png" alt="profile picture">
          <div id="inner3"></div>
    </div>
       
</div>
   </body>
   <script src="scripts/utils.js"></script>
   <script src="scripts/QA.js"></script>
   <script src="scripts/divhide.js"></script>
   <script src="scripts/jquery-3.4.1.js"></script>
</html>
_END;
?>
 