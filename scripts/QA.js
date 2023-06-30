function loadLesson(id) {
    var curDiv = document.getElementById("inner_vid");
    curDiv.removeChild(curDiv.childNodes[0]);
    var request = createRequest();
     if (request == null) 
         {
     alert("Unable to create request");
     return;
         } else if (request !== null) 
         {  
          request.onreadystatechange = vidShow;
          request.open("GET", "videos/" + id + ".html", true); // num is actually the global variable gloIndex
          request.send(null);
         }
}
  
function vidShow() {    
    if (request.readyState == 4) {
      if(request.status == 200) {
        if(request.statusText == "OK") 
        {
          console.log("The request is all good");  
          document.getElementById("inner_vid").innerHTML = request.responseText;     
          var video = document.getElementById("inner_vid");
          var vidKid = video.childNodes[0];
          console.log(vidKid);
          vidKid.addEventListener("timeupdate", reportProgress);
          lessonSetUp(vidKid.id);
        } else 
        {
          console.log("The request is not good");
        }       
      }
    }
}

function switchDisplay() {
    var parent = this.parentNode;
    var target = parent.getElementsByTagName("div")[1];
    if (target.style.display == "none") 
    {
    target.style.display="block";
    } else {
    target.style.display="none";
    }
    return false;
}
  
  
function lessonSetUp(id) {
      console.log(id);
    var request = createRequest();
     if (request == null) 
         {
     alert("Unable to create request");
     return;
         } else if (request !== null) 
         {  
          request.onreadystatechange = getValue;
          request.open("GET", "questions/" + id + "a.html", true); // num is actually the global variable gloIndex
          request.send(null);
         }
  }

function getValue() {
    if (request.readyState == 4) {
        if(request.status == 200) {
          if(request.statusText == "OK") 
          {
            console.log("The second request is all good");  
            document.getElementById("cludge").innerHTML = request.responseText;  
          } else 
          {
            console.log("The request is not good");
          }       
        }
      }
  }

  function testPathLess() {
    document.body.removeChild(document.getElementById("overlay"));
    document.body.removeChild(document.getElementById("msg"));
    window.location.assign("fibon_update_les_order.php");
  }

 
function stopCheck(playTime, num, id) {
  visCue();
  var times = document.getElementById("times").innerHTML;
  var Qindex;
  Qindex = times.split(",");
  num = gloIndex;
  var video = document.getElementById("inner_vid");
  var vidKid = video.childNodes[0];
  console.log(num + " after assigned from gloIndex");
  console.log("questions/"+id+"check"+num+".html");
  document.getElementById("start").disabled=true;
  document.getElementById("stop").disabled=true;
  document.getElementById("pause").disabled=true;
  
  if(playTime == Qindex[0]) 
  {
    vidKid.currentTime = playTime + 1;
    var request = createRequest();
    if (request == null) 
    {
      alert("Unable to create request");
      return;
    } else if (request !== null) 
      {
        request.onreadystatechange = showQues;
        request.open("GET", "questions/"+id+"check"+num+".html", true); // num is actually the global variable gloIndex
        request.send(null);     
      }
  }      
  if (playTime == Qindex[1]) 
  {
    vidKid.currentTime = playTime + 1;
    console.log(num + " after second question starts");
    var request = createRequest();
      if (request == null) 
      {
        alert("Unable to create request");
        return;
      } else if (request !== null) 
      {
        request.onreadystatechange = showQues;
        request.open("GET", "questions/"+id+"check"+num+".html", true); // num is actually the global variable gloIndex
        request.send(null);     
      }
  }  
  if (playTime == Qindex[2]) 
  {
    vidKid.currentTime = playTime + 1;
    console.log(num + " after third question starts");
    var request = createRequest();
      if (request == null) 
      {
        alert("Unable to create request");
        return;
      } else if (request !== null) 
      {
        request.onreadystatechange = showQues;
        request.open("GET", "questions/"+id+"check"+num+".html", true); // num is actually the global variable gloIndex
        request.send(null);     
      }
  }   
  if (playTime == Qindex[3]) 
  {
    vidKid.currentTime = playTime + 1;
    console.log(num + " after fourth question starts");
    var request = createRequest();
      if (request == null) 
      {
        alert("Unable to create request");
        return;
      } else if (request !== null) 
      {
        request.onreadystatechange = showQues;
        request.open("GET", "questions/"+id +"check"+num+".html", true); // num is actually the global variable gloIndex
        request.send(null);     
      }
  }                                   
}
      
function showQues() {
    if (request.readyState == 4) {
      if(request.status == 200) {
        if(request.statusText == "OK") 
        {
          document.getElementById("concept_video_holder").style.visibility = "hidden";
          document.getElementById("inner1").innerHTML = request.responseText;
          show();
          var elements = document.getElementsByTagName("div");  
            for (var i = 0; i < elements.length; i++) 
            { // collapse all sections
              if (elements[i].className == "elements") 
            {
              elements[i].style.display="none";
            } else if (elements[i].className == "label") 
            {
            elements[i].onclick=switchDisplay;
            document.getElementById("submit").addEventListener("click", checkAnswer);
            }
          }       
        } else 
        {
          console.log("The request is not good");
        }       
      }
  }
}

function checkAnswer() {
  var check0 = document.getElementById("check0");
  var check1 = document.getElementById("check1");
  var check2 = document.getElementById("check2");
  var check3 = document.getElementById("check3");
  var answers = new Array;
  answers.push(check0.innerHTML);
  answers.push(check1.innerHTML);
  answers.push(check2.innerHTML);
  answers.push(check3.innerHTML);
  console.log(answers[0]);
  num = gloIndex;
  var answerp = document.getElementById("answerp");
  var correct;
  var answer = getRadioVal(gloIndex);

  if (answer == answers[num]) 
        {
          correct = true;
          document.getElementById("start").disabled=false;
          answerp.innerHTML = "";
          answerp.innerHTML = "Correct! Press play when you're ready to continue!";
          setTimeout(UndovisCue, 1000);
          setTimeout(clearAns, 4000); 
          return;
        } else if (answer !== answers[num]) 
        { 
          correct = false;
          answerp.innerHTML = "";
          answerp.innerHTML = "Sorry, please try again!";
          return;     
        }
        else if (answer == "")
        { 
          correct = "";
          answerp.innerHTML = "You must choose an answer to continue";
          return;
        }             
} 

function clearAns() {
  var curDiv = document.getElementById("inner1"); 
  console.log(curDiv.childNodes);
  var answerp = document.getElementById("answerp");
  answerp.innerHTML = "";
  curDiv.removeChild(curDiv.childNodes[0]);
  document.getElementById("concept_video_holder").style.visibility = "visible";
  gloIndex = gloIndex + 1;
}

function getRadioVal() {
  var val; 
    if (val !== "") 
    {    
    var rate_value = document.querySelectorAll('input');   // get list of radio buttons with specified name
    for (var i=0, len=rate_value.length; i<len; i++) // loop through list of radio buttons
    {
      if (rate_value[i].checked ) 
      { // radio checked?
        val = rate_value[i].value; // if so, hold its value in val
        break; // and break out of for loop
      }
    }
    return val; // return value of checked radio or undefined if none checked     
    } else 
    {
      return val;
    }  
}

function AfterLess() {
  setTimeout(LessAfter, 2000);
 }

 function LessAfter() {
  var name = document.getElementById("lname").innerHTML;
  if(name == null) 
  {
   return;
  }
    else if (name !== null) {
      var lessoverlay = document.createElement("div");
      lessoverlay.setAttribute("id", "overlay");
      lessoverlay.setAttribute("class", "overlay");
      document.body.appendChild(lessoverlay);
  
      var lessmsg = document.createElement("div");
      var lesstxt = document.createTextNode("Well Done! You finished:         " +"'"+name+"'");
      lessmsg.appendChild(lesstxt);
      lessmsg.setAttribute("id", "msg");
      lessmsg.setAttribute("class", "overlaymsg");
      document.body.appendChild(lessmsg);
    
      var lessbutton1 = document.createElement("button");
      var lessbuttxt1 = document.createTextNode("Save Progress");
      lessbutton1.appendChild(lessbuttxt1);
      lessbutton1.setAttribute("class", "testBut");
      lessmsg.appendChild(lessbutton1);
      lessbutton1.setAttribute("href", "fibon_update_les_order.php");

      lessbutton1.onclick=testPathLess;
 }
}
