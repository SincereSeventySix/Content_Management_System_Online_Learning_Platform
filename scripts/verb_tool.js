
function clear() {
    var readout = $("verb_readout");
    var verb = $("verb");
    readout.innerHTML = "";
    verb.value = "";
}

function getValue(){
    var verb = $("verb").value;
    var verbArr; 
    verbArr = verb.split("");
    return verbArr;
}

function paPerConTen() {
    var readout = $("verb_readout");
    var verbArr = getValue(); 
    var reStr = verbCheck(verbArr); 
    var complete = "had been " + reStr + "ing ";
    readout.innerHTML = complete;
}

function paConTen() {
    var readout = $("verb_readout");
    var verbArr = getValue(); 
    var reStr = verbCheck(verbArr); 
    var complete = "was/were " + reStr + "ing ";
    readout.innerHTML = complete;
}

function preConTen() {
    var readout = $("verb_readout");
    var verbArr = getValue(); 
    var reStr = verbCheck(verbArr);
    var complete = "is/am/are " + reStr + "ing ";
    readout.innerHTML = complete;
}

function prePerConTen() {
    var readout = $("verb_readout");
    var verbArr = getValue(); 
    var reStr = verbCheck(verbArr);
    var complete = "has/have been " + reStr + "ing ";
    readout.innerHTML = complete;
}

function SimFuTen() {
    var readout = $("verb_readout");
    var verb = $("verb").value;
    var complete = "will " + verb;
    readout.innerHTML = complete;
}

function FuPerTen() {
    var readout = $("verb_readout");
    var complete = "Not Yet Programmed, Will Soon Though";
    readout.innerHTML = complete;
}

function FuPerConTen() {
    var readout = $("verb_readout");
    var verbArr = getValue(); 
    var reStr = verbCheck(verbArr);
    var complete = "will have been " + reStr + "ing ";
    readout.innerHTML = complete;
}

function verbCheck(array) {
 var str = "";
 var extraLet;
 if (array[array.length - 1] == "e") 
    {
        if (array[array.length - 2] == "i")
           {   
                array.pop();
                array.pop();
                array.push("y");
                str = "";
                for (i = 0; i < array.length; i++)
                    {    
                        str += array[i];     
                    } 
                        return str;
           }
           if ((array[array.length - 2] == "e") ||
               (array[array.length - 2] == "u") )
                {
                   str = "";
                   for (i = 0; i < array.length; i++)
                        {    
                            str += array[i];     
                        } 
                            return str;
                } 
                else 
                {
                    array.pop();
                    str = "";
                    for (i = 0; i < array.length; i++)
                         {    
                            str += array[i];     
                         } 
                            return str;
                }
    }          
 else if ((array[array.length - 1] == "d") ||
          (array[array.length - 1] == "t") || 
          (array[array.length - 1] == "p") || 
          (array[array.length - 1] == "m") || 
          (array[array.length - 1] == "n") || 
          (array[array.length - 1] == "b") ||
          (array[array.length - 1] == "r") )
            {
              if ((array[array.length - 2] == "a") ||
                  (array[array.length - 2] == "e") ||
                  (array[array.length - 2] == "i") ||
                  (array[array.length - 2] == "o") ||
                  (array[array.length - 2] == "u") )
                    {
                      if ((array[array.length - 3] == "a") ||
                          (array[array.length - 3] == "e") ||
                          (array[array.length - 3] == "i") ||
                          (array[array.length - 3] == "o") ||
                          (array[array.length - 3] == "u") ||
                          (array[array.length - 3] == "d") ||
                          (array[array.length - 3] == "t") ||
                          (array[array.length - 3] == "s") ||  
                          (array[array.length - 3] == "n") || 
                          (array[array.length - 3] == "b")  )
                             {
                                str = ""; 
                                for (i = 0; i < array.length; i++)
                                {
                                    str += array[i];
                                }
                                    return str;
                             }
                             else
                             {
                                extraLet = array[array.length - 1];
                                array.push(extraLet);
                                str = ""; 
                                for (i = 0; i < array.length; i++)
                                {
                                    str += array[i];
                                }
                                    return str;
                             }
                    }
                    else 
                    {   str = ""; 
                            for (i = 0; i < array.length; i++)
                            {
                                str += array[i];    
                            } 
                                return str;   
                    }
                }
                        
 else 
    {
        str = ""; 
        for (i = 0; i < array.length; i++)
        {
            str += array[i];
        }
            return str;     
    }     
}


                

