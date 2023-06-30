function $(id) {
  return document.getElementById(id);
}

function displayPopup() {
  var testTaken = document.getElementById('errorTest');
  var testValue = testTaken.innerHTML;
  if (testValue == "Test Taken")
  {
    return;
  } else if (testValue == "Test not Taken") 
  {
    var overlay = document.createElement("div");
    overlay.setAttribute("id", "overlay");
    overlay.setAttribute("class", "overlay"); 
    document.body.appendChild(overlay);
  
    var msg = document.createElement("div");
    var txt = document.createTextNode("Take the Test to Start Building your Otutor!");
    msg.appendChild(txt);
    msg.setAttribute("id", "msg");
    msg.setAttribute("class", "overlaymsg");
    document.body.appendChild(msg);
    
    var button1 = document.createElement("button");
    var buttxt1 = document.createTextNode("Take Test");
    button1.appendChild(buttxt1);
    button1.setAttribute("class", "testBut");

    msg.appendChild(button1);
    button1.setAttribute("href", "fibon_test.php");
  
    var button2 = document.createElement("button");
    var buttxt2 = document.createTextNode("Later");
    button2.setAttribute("class", "testBut");
    button2.appendChild(buttxt2);
    msg.appendChild(button2);
    
    button1.onclick=testPath;
    button2.onclick=restore;
  }
}


function restore() {
    document.body.removeChild(document.getElementById("overlay"));
    document.body.removeChild(document.getElementById("msg"));
}

function testPath() {
    document.body.removeChild(document.getElementById("overlay"));
    document.body.removeChild(document.getElementById("msg"));
    window.location.assign("fibon_test.php");
}

function highlightPage() {
    var headers = document.getElementsByTagName('nav');
    var list = headers[0].getElementsByTagName('ul');
    var links = list[0].getElementsByTagName('a');
    for (var i=0; i<links.length; i++) {
    var linkurl;
      for (var i=0; i<links.length; i++) {
          linkurl = links[i].getAttribute("href");
          if (window.location.href.indexOf(linkurl) != -1){
              links[i].className = "here";
          }
        }
      }
    }
highlightPage();


function highLightButton(id) {
    var outerDiv = document.getElementById('buttonHL');
    var outerDiv2 = outerDiv.childNodes[1];
    var list = outerDiv2.getElementsByClassName('video_saved');
    console.log(list);
    for (var i=0; i<list.length; i++) {
      if (list[i].classList.contains("highLightB"))
      {
        list[i].classList.remove("highLightB");
        list[i].setAttribute("class", "video_saved");
      } 
    }
    var active = document.getElementById(id);
    active.classList.add("highLightB");
}

function createRequest() {
    try {
        request = new XMLHttpRequest();
    } catch (tryMS) {
        try {
            request = new ActiveXObject("Msxm12.XMLHTTP");
        } catch (otherMS) {
            try {
                request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (failed) {
                request = null;
            }
        }
    }
    return request;
}

function show(){
    var form = document.getElementsByClassName("hidden");
    form[0].setAttribute("class", "show");
}

function hide(){
    var form = document.getElementsByClassName("show");
    form[0].setAttribute("class", "hidden");
}

function logoutCheck() {
    var overlay = document.createElement("div");
    overlay.setAttribute("id", "overlay");
    overlay.setAttribute("class", "overlay"); 
    document.body.appendChild(overlay);
  
    var msg = document.createElement("div");
    var txt = document.createTextNode("Are You Sure You Want to Log Out of Otutor?");
    msg.appendChild(txt);
    msg.setAttribute("id", "msg");
    msg.setAttribute("class", "overlaymsg");
    document.body.appendChild(msg);
    
    var button1 = document.createElement("button");
    var buttxt1 = document.createTextNode("Log Out");
    button1.appendChild(buttxt1);
    button1.setAttribute("class", "testBut");

    msg.appendChild(button1);
    button1.setAttribute("href", "fibon_logout.php");
  
    var button2 = document.createElement("button");
    var buttxt2 = document.createTextNode("Not Yet");
    button2.setAttribute("class", "testBut");
    button2.appendChild(buttxt2);
    msg.appendChild(button2);
    
    button1.onclick=testPathLog;
    button2.onclick=restore; 
}

function testPathLog() {
    document.body.removeChild(document.getElementById("overlay"));
    document.body.removeChild(document.getElementById("msg"));
    window.location.assign("fibon_logout.php");
}
