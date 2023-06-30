window.onload = init;

function init() {
  setTimeout(displayPopupTools, 3200);
}

function displayPopupTools() {
  var toolBut = document.getElementById('toolHL2');
  var toolButClass = toolBut.childNodes[0];
  if (toolButClass.classList.contains("tool_active"))
  {
    return;
  } else if (toolButClass.classList.contains("tool_blank")) 
  {
    var overlay = document.createElement("div");
    overlay.setAttribute("id", "overlay");
    overlay.setAttribute("class", "overlay"); 
    document.body.appendChild(overlay);
  
    var msg = document.createElement("div");
    var txt = document.createTextNode("You Have No Tools Yet.");
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

function highLightTool(id) {
  var outerDiv = document.getElementById('toolHL');
  var outerDiv2 = outerDiv.childNodes[1];
  var list = outerDiv2.getElementsByClassName('tool_active');
  console.log(list);
  for (var i=0; i<list.length; i++) {
    if (list[i].classList.contains("highLightT"))
    {
      list[i].classList.remove("highLightT");
      list[i].setAttribute("class", "tool_active");
    } 
  }
  var active = document.getElementById(id);
  active.classList.add("highLightT");
}

function showTool(id){
    var curDiv = document.getElementById("inner_tool");
    curDiv.removeChild(curDiv.childNodes[0]);
    var request = createRequest();
     if (request == null) 
         {
     alert("Unable to create request");
     return;
         } else if (request !== null) 
         { 
           if (id == "tool_verb")
           {
            request.onreadystatechange = toolShow;
           }
           else if (id == "tool_chat")
           {
            request.onreadystatechange = toolShow_chat;
           }
           else if (id == "tool_sen")
           {
            request.onreadystatechange = toolShow_sent;
           }
           else if (id == "tool_vow")
           {
            request.onreadystatechange = toolShow_vowel;
           }
         
         request.open("GET", "tools/" + id + ".html", true); // num is actually the global variable gloIndex
         request.send(null);
    }
 }
 
 function toolShow() {    
     if (request.readyState == 4) {
       if(request.status == 200) {
         if(request.statusText == "OK") 
         {
           console.log("The request is all good");  
           document.getElementById("inner_tool").innerHTML = request.responseText; 
           var button = document.getElementById("button");
            var button2 = document.getElementById("button2");
            var button3 = document.getElementById("button3");
                var button4 = document.getElementById("button4");
                    var button6 = document.getElementById("button6");
                      var button7 = document.getElementById("button7");
                       var button8 = document.getElementById("button8");
                                button.onclick = paPerConTen;
                              button2.onclick = paConTen;
                          button3.onclick = prePerConTen;
                        button4.onclick = preConTen;
                      button6.onclick = SimFuTen;
                    button7.onclick = FuPerTen;
                  button8.onclick = FuPerConTen;
                button5.onclick = clear;       
         } else 
         {
           console.log("The request is not good");
         }       
       }
   }
 }

 function toolShow_chat() {    
    if (request.readyState == 4) {
      if(request.status == 200) {
        if(request.statusText == "OK") 
        {
          console.log("The request is all good");  
          document.getElementById("inner_tool").innerHTML = request.responseText; 
                 
        } else 
        {
          console.log("The request is not good");
        }       
      }
  }
}

var buttons = document.querySelectorAll(".wordBut");
            var bigDiv = document.getElementById("contain_chat");
                var buttons = document.querySelectorAll(".wordBut");
                    var textarea = document.getElementById("readout_chat");

function getVal(value){
  var textarea = document.getElementById("readout_chat");
  textarea.innerHTML += value + " ";
}

function clearVal(value){
  var textarea = document.getElementById("readout_chat");
  textarea.innerHTML = " ";
}

function toolShow_sent() {    
  if (request.readyState == 4) {
    if(request.status == 200) {
      if(request.statusText == "OK") 
      {
        console.log("The request is all good");  
        document.getElementById("inner_tool").innerHTML = request.responseText; 
        initSentence();
               
      } else 
      {
        console.log("The request is not good");
      }       
    }
  }
}

function toolShow_vowel() {
  if (request.readyState == 4) {
    if(request.status == 200) {
      if(request.statusText == "OK") 
      {
        console.log("The request is all good");  
        document.getElementById("inner_tool").innerHTML = request.responseText;         
      } else 
      {
        console.log("The request is not good");
      }       
    }
  }
}

var sounds = new Array;
        var A1 = ["  c<em style='color:red'>a</em>t  " , "  <em style='color:red'>a</em>tom  ", "  contr<em style='color:red'>a</em>ct  "];
        var A2 = ["  b<em style='color:green'>a</em>ke  " , "  <em style='color:green'>a</em>te  " , "  r<em style='color:green'>a</em>ke  "];
        var A3 = ["  <em style='color:red'>a</em>ll  " , "  c<em style='color:red'>a</em>ll  " , "  sm<em style='color:red'>a</em>ll  "];
        var A4 = ["  <em style='color:red'>a</em>bove  " , "  re<em style='color:red'>a</em>lize  " , "  rel<em style='color:red'>a</em>tive  "];

        var E1 = ["  p<em style='color:red'>e</em>t  ", "  <em style='color:red'>e</em>gg  ", "  b<em style='color:red'>e</em>d  "];
        var E2 = ["  sh<em style='color:green'>e</em>  ", "  w<em style='color:green'>e</em>  ", "  h<em style='color:green'>e</em>  "];
        var E3 = ["  sm<strong style='color:green'>i</strong>l<em style='color:blue'>e</em>  ", "  wh<strong style='color:green'>i</strong>l<em style='color:blue'>e</em>  ", "  k<strong style='color:green'>i</strong>t<em style='color:blue'>e</em>  "];
        var E4 = ["  g<strong style='color:red'>i</strong>v<em style='color:blue'>e</em>  ", "  l<strong style='color:red'>i</strong>v<em style='color:blue'>e</em>  ", "  circl<em style='color:blue'>e</em>  "];

        var I1 = ["  s<em style='color:red'>i</em>t  ", "  <em style='color:red'>i</em>t  ", "  h<em style='color:red'>i</em>t  "];
        var I2 = ["  l<em style='color:green'>i</em>ke  ", "  b<em style='color:green'>i</em>te  ", "  v<em style='color:green'>i</em>ne  "];
        var I3 = ["  sk<em style='color:green'>i</em>  ", "  mach<em style='color:green'>i</em>ne  ", "  p<em style='color:green'>i</em>zza  "];

        var O1 = ["  T<em style='color:red'>o</em>m  ", "  <em style='color:red'>o</em>ctopus  ", "  <em style='color:red'>o</em>range  "];
        var O2 = ["  cl<em style='color:green'>o</em>thes  ", "  p<em style='color:green'>o</em>se  ", "  supp<em style='color:green'>o</em>se  "];
        var O3 = ["  t<em style='color:green'>o</em>  ", "  pr<em style='color:green'>o</em>ve  ", "  m<em style='color:green'>o</em>ve  "];
        var O4 = ["  ab<em style='color:red'>o</em>ve  ", "  d<em style='color:red'>o</em>ne  ", "  s<em style='color:red'>o</em>me  "];

        var U1 = ["  l<em style='color:red'>u</em>ck  ", "  j<em style='color:red'>u</em>mp  ", "  tr<em style='color:red'>u</em>mpet  "];
        var U2 = ["  c<em style='color:green'>u</em>te  ", "  <em style='color:green'>u</em>se  ", "  am<em style='color:green'>u</em>se  "];
        var U3 = ["  p<em style='color:red'>u</em>t  ", "  f<em style='color:red'>u</em>ll  ", "  p<em style='color:red'>u</em>sh  "];

        var Y2 = ["  sill<em style='color:green'>y</em>  ", "  happ<em style='color:green'>y</em>  ", "  craz<em style='color:green'>y</em>  "];
        var Y3 = ["  m<em style='color:green'>y</em>  ", "  fl<em style='color:green'>y</em>  ", "  bu<em style='color:green'>y</em> "];
        var Y4 = ["  h<em style='color:red'>y</em>pnotize  ", "  g<em style='color:red'>y</em>m  ", "  l<em style='color:red'>y</em>ric  "];

        sounds.push(A1);
        sounds.push(A2);
        sounds.push(A3);
        sounds.push(A4);
        sounds.push(E1);
        sounds.push(E2);
        sounds.push(E3);
        sounds.push(E4);
        sounds.push(I1);
        sounds.push(I2);
        sounds.push(I3);
        sounds.push(O1);
        sounds.push(O2);
        sounds.push(O3);
        sounds.push(O4);
        sounds.push(U1);
        sounds.push(U2);
        sounds.push(U3);
        sounds.push(Y2);
        sounds.push(Y3);
        sounds.push(Y4);
        console.log(sounds.length); 

function playAudio(id, value) { 
  var display = document.getElementById("inner_readout_p");
  display.innerHTML = "";
  new Audio("Vowels/" + id + "1.mp3").play();
  display.innerHTML = sounds[value];
}

function initSentence() {
  var MSBut = document.getElementById("makeSentence");
  var CSBut = document.getElementById("clearSent");
  MSBut.onclick = makeSentence;
  CSBut.onclick = clearSent;
  }
 
  function clearSent() {
  var Si_noun = document.getElementById("Si_Noun");
  Si_noun.value = "";
  var Si_adj = document.getElementById("Si_Adj");
  Si_adj.value = "";
  var S_noun = document.getElementById("S_Noun");
  S_noun.value = "";
  var S_adj = document.getElementById("S_Adj");
  S_adj.value = "";
  var S_art = document.getElementById("S_Art");
  S_art.value = "";
  var Adv = document.getElementById("Adv");
  Adv.value = "";
  var Verb = document.getElementById("Verb");
  Verb.value = "";
    var strtext = document.getElementById("sentResult");
    strtext.removeChild(strtext.childNodes[0]);
  }
  
  function makeSimile(Si_adj, Si_noun) {
      console.log("as " + Si_adj + " " + "as a " + Si_noun + " ");
      return "as " + Si_adj + " " + "as a " + Si_noun;
  }
  
  function makeSubject(S_art, S_adj, S_noun){
      console.log(S_art + " " + S_adj + " " + S_noun + " ");
      return S_art + " " + S_adj + " " + S_noun + " ";
  }
  
  function makeVerb(Adv, Verb) {
      console.log(Adv+ " " + Verb + " ");
      return Adv + " " + Verb + " ";
  }
  
  
  function makeSentence() {   
  var Si_noun = document.getElementById("Si_Noun").value;
  var Si_adj = document.getElementById("Si_Adj").value;
  var S_noun = document.getElementById("S_Noun").value;
  var S_adj = document.getElementById("S_Adj").value;
  var S_art = document.getElementById("S_Art").value;
  var Adv = document.getElementById("Adv").value;
  var Verb = document.getElementById("Verb").value;
  
      var trope = makeSimile(Si_adj, Si_noun);
      var subject = makeSubject(S_art, S_adj, S_noun);
      var verb = makeVerb(Adv, Verb);
     
      var str = subject + verb + trope;
      var str2 = capLet(str);
      var newp = document.createElement("P");
      var text = document.createTextNode(str2);
      newp.appendChild(text);
      var strtext = document.getElementById("sentResult");
      strtext.appendChild(newp);
  }

  function capLet(string) {
    var lower = string;
    var upper = lower.charAt(0).toUpperCase() + lower.substring(1)+".";
    return upper;
  }
  

// vowel tool


function playAudio(id, value) { 
    var display = document.getElementById("inner_readout_p");
    display.innerHTML = "";
    new Audio("Vowels/" + id + "1.mp3").play();
    display.innerHTML = sounds[value];
  }
  
  