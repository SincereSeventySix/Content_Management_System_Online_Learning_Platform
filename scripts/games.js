window.onload = init;

function init() {
  setTimeout(displayPopupGames, 3200);
}

function displayPopupGames() {
  var toolBut = document.getElementById('gamesHL2');
  var toolButClass = toolBut.childNodes[0];
  if (toolButClass.classList.contains("game_active"))
  {
    return;
  } else if (toolButClass.classList.contains("game_blank")) 
  {
    var overlay = document.createElement("div");
    overlay.setAttribute("id", "overlay");
    overlay.setAttribute("class", "overlay"); 
    document.body.appendChild(overlay);
  
    var msg = document.createElement("div");
    var txt = document.createTextNode("You Have No Games Yet.");
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


function highLightGame(id) {
    var outerDiv = document.getElementById('gamesHL');
    var outerDiv2 = outerDiv.childNodes[1];
    var list = outerDiv2.getElementsByClassName('game_saved');
    console.log(list);
    for (var i=0; i<list.length; i++) {
      if (list[i].classList.contains("highLightG"))
      {
        list[i].classList.remove("highLightG");
        list[i].setAttribute("class", "game_saved");
      } 
    }
    var active = document.getElementById(id);
    active.classList.add("highLightG");
  }