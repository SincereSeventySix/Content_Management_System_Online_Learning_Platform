window.onload=function() {

  // events for buttons
  var start = document.getElementById("start");
  start.onclick = startPlayback;
  var stop = document.getElementById("stop");
  stop.onclick = stopPlayback;
  var pause = document.getElementById("pause");
  pause.onclick = pausePlayback;
  
  // video fallback
  var detect = document.createElement("video");
  if (!detect.canPlayType) {
    document.getElementById("controls").style.display="none";
  }
  setTimeout(function() {displayPopup();}, 4000);
}

function highLightLes(id) {
  var outerDiv = document.getElementById('concept_video_holder');
  var outerDiv2 = outerDiv.childNodes[1];
  var list = outerDiv2.getElementsByClassName('lesson_active');
  for (var i=0; i<list.length; i++) {
    if (list[i].classList.contains("highLightL"))
    {
      list[i].classList.remove("highLightL");
      list[i].setAttribute("class", "lesson_inactive");
    } 
  }
  var active = document.getElementById(id);
  active.classList.add("highLightL");
}

function startPlayback() {
  var start = document.getElementById("start");
  var stop = document.getElementById("stop");
  var stop = document.getElementById("stop");
  start.style.backgroundColor = "#fcebe1";
  stop.style.backgroundColor = "";
  pause.style.backgroundColor = "";
  var video = document.getElementById("inner_vid");
  var vidKid = video.childNodes[0];
  vidKid.play();
  document.getElementById("pause").disabled=false;
  document.getElementById("stop").disabled=false;
  this.disabled=true;
}

function pausePlayback() {
  var start = document.getElementById("start");
  var stop = document.getElementById("stop");
  var stop = document.getElementById("stop");
  start.style.backgroundColor = "";
  stop.style.backgroundColor = "";
  pause.style.backgroundColor = "#fcebe1";
  var video = document.getElementById("inner_vid");
  var vidKid = video.childNodes[0];
  vidKid.pause();
  this.disabled=true;
  document.getElementById("start").disabled=false;
  document.getElementById("stop").disabled=true;
}

var gloIndex = 0;

function stopPlayback() {
  var start = document.getElementById("start");
  var stop = document.getElementById("stop");
  var stop = document.getElementById("stop");
  start.style.backgroundColor = "";
  stop.style.backgroundColor = "#fcebe1";
  pause.style.backgroundColor = "";
  var video = document.getElementById("inner_vid");
  var vidKid = video.childNodes[0];
  vidKid.pause();
  gloIndex = 0;
  vidKid.currentTime=0;
  document.getElementById("start").disabled=false;
  document.getElementById("pause").disabled=true;
  this.disabled=false;
}
 


function visCue() {
  var butStart = document.getElementById("start");
  var butStop = document.getElementById("stop");
  var butPause = document.getElementById("pause");

  butStart.style.opacity = ".50";
  butStop.style.opacity = ".50";
  butPause.style.opacity = ".50";
}

function UndovisCue() {
  var butStart = document.getElementById("start");
  var butStop = document.getElementById("stop");
  var butPause = document.getElementById("pause");

  butStart.style.opacity = "1";
  butStop.style.opacity = "1";
  butPause.style.opacity = "1";
}

function reportProgress() {
  
  var video = document.getElementById("inner_vid");
  var vidKid = video.childNodes[0];
  var vidKidId = video.childNodes[0].id;
  var times = document.getElementById("times").innerHTML;
  var Qindex;
  Qindex = times.split(",");
  
  var playTime = Math.round(this.currentTime);
  console.log(playTime);
  var div = document.getElementById("feedback");
  div.innerHTML = playTime;
  if (playTime == Qindex[0]) 
  {
    pausePlayback();
    stopCheck(playTime, gloIndex, vidKidId); 
    return;
  } else if (playTime == Qindex[1]) 
   { 
    pausePlayback();
    stopCheck(playTime, gloIndex, vidKidId);
    return; 
   }else if (playTime == Qindex[2]) 
   { 
    pausePlayback();
    stopCheck(playTime, gloIndex, vidKidId);
    return; 
   }
   else if (playTime == Qindex[3]) 
   { 
    pausePlayback();
    stopCheck(playTime, gloIndex, vidKidId);
    return; 
   }
   vidKid.addEventListener("ended", AfterLess); 
  }


  






  



  
  