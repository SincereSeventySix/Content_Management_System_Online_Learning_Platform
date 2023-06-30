<?php
require_once('fibon_header_top.php');
require_once('fibon_nav_guest.php');
echo <<<_END

  

   <div id="index">
    <div id="courseWrap"></div>
    <div id="courseWrap2">
      <a href="fibon_fow.php"><div class="course" id="fow"><p>The Word Families</p></div></a>
      <a href="fibon_soe.php"><div class="course" id="sos"><p>The Spirit of English</p></div></a>
      <a href="fibon_twa.php"><div class="course" id="twa"><p>The Writing Academy</p></div></a>
    </div>   
</div>
<div id="home_but_hold">
<button  id="home_but"><a href="fibon_form.php">Take Otutor Test</a></button>
<button id="home_but2"><a href="fibon_form.php">Try One Month Free</a></button>
</div>

<div class="footer">
         <p>Copyright &copy; otutoronline.com, all rights reserved.</p>
         <p></p>
</div>
</body> 
<script src="scripts/utils.js"></script>
<script src="scripts/fibon.js"></script>
</html>
_END;

?>