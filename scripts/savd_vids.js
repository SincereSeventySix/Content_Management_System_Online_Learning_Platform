window.onload = init;

function init() {
  setTimeout(displayPopupVids, 3200);
}

function displayPopupVids() {
  var vidBut = document.getElementById('buttonHL2');
  var vidButClass = vidBut.childNodes[0];
  if (vidButClass.classList.contains("video_saved"))
  {
    return;
  } else if (vidButClass.classList.contains("video_blank")) 
  {
    var overlay = document.createElement("div");
    overlay.setAttribute("id", "overlay");
    overlay.setAttribute("class", "overlay"); 
    document.body.appendChild(overlay);
  
    var msg = document.createElement("div");
    var txt = document.createTextNode("You Have No Saved Video-Lessons Yet.");
    msg.appendChild(txt);
    msg.setAttribute("id", "msg");
    msg.setAttribute("class", "overlaymsg");
    document.body.appendChild(msg);
    
    var button1 = document.createElement("button");
    var buttxt1 = document.createTextNode("Got It, Thanks!");
    button1.appendChild(buttxt1);
    button1.setAttribute("class", "testBut");

    msg.appendChild(button1);
  
    button1.onclick=restore;
  }
}

function showVid(id){
  var curDiv = document.getElementById("vid_player");
  console.log(curDiv.childNodes[0]);
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
  var curDiv = document.getElementById("vid_player");
  
  if (request.readyState == 4) {
    if(request.status == 200) {
      if(request.statusText == "OK") 
      {
        console.log(curDiv.childNodes[0]);
        console.log("The request is all good");  
        document.getElementById("vid_player").innerHTML = request.responseText;
        var vidKid = curDiv.childNodes[0];
        console.log(vidKid);
        vidKid.controls=true;
        console.log(curDiv.childNodes[0]);
      } else 
      {
        console.log("The request is not good");
      }       
    }
  }
}

