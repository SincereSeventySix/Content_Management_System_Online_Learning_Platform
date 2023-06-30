function init() {
    var button = document.getElementById("makeSentence")
    button.onclick = makeSentence;
    }
    
    function makeSimile(Si_adj, Si_noun) {
        console.log("as " + Si_adj + " " + "as a " + Si_noun + " ");
        return "as " + Si_adj + " " + "as a " + Si_noun + " ";
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
        var subject =makeSubject(S_art, S_adj, S_noun);
        var verb = makeVerb(Adv, Verb);
       
        var str = subject + verb + trope;
        var newp = document.createElement("P");
        var text = document.createTextNode(str);
        newp.appendChild(text);
        var strtext = document.getElementById("result");
        strtext.appendChild(newp);
    }


    var demodiv = document.getElementById("tester");
    console.log(demodiv.parentNode);
    console.log(demodiv.childNodes);
    
    var outputString = "";

    if (demodiv.hasChildNodes()) {
        var children = demodiv.childNodes;
        for (var i=0; i < children.length; i++) {
            outputString+="has child " + children[i].nodeName + " ";
        }
    }
    console.log(outputString);
    



