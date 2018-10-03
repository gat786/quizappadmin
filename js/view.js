function changeVisibility(divisionName,visibility) {
    var x = document.getElementById(divisionName);
    
    x.style.display = visibility;
    
} 

var question = document.getElementById("questionselector");
var user = document.getElementById("userselector");
var score = document.getElementById("scoreselector");

var mcq=document.getElementById("mcqselector");
var booleanQ=document.getElementById("truefalseselector");

var subjectDropDown = document.getElementById("subjectDropDown");

var questionType = "";

var xmlHttp=new XMLHttpRequest();

function onViewSelected(){
    changeVisibility("subjectSelector","none");
    changeVisibility("recievedData","none");
    if (question.checked)
    {
        changeVisibility("questionTypeSelector","block");
        
    }
    else if (user.checked)
    {
        changeVisibility("recievedData","block");
        changeVisibility("questionTypeSelector","none");
        changeVisibility("subjectSelector","none");
        console.log("getting usersdata");
        xmlHttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                document.getElementById("recievedData").innerHTML=this.responseText;
            }
        };
        
        xmlHttp.open("GET","../scripts/getdatausers.php",true);  
        xmlHttp.send();

    }
    else if (score.checked)
    {
        changeVisibility("recievedData","block");
        changeVisibility("questionTypeSelector","none");
        changeVisibility("subjectSelector","none");
        console.log("getting scoresdata");
        xmlHttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                document.getElementById("recievedData").innerHTML=this.responseText;
            }
        };
        
        xmlHttp.open("GET","../scripts/getdatascores.php",true);  
        xmlHttp.send();
    }
}

function onTypeSelected(){
    if (mcq.checked){
        questionType = "multiple";
    }
    else{
        questionType = "boolean";
    }
    changeVisibility("subjectSelector","block");
    changeVisibility("recievedData","none");
}

function onSubjectSelected(){


    var subject=subjectDropDown.options[subjectDropDown.selectedIndex].value;

    changeVisibility("recievedData","block");

    if (mcq.checked)
    {   
        xmlHttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                document.getElementById("recievedData").innerHTML=this.responseText;
            }
        };

        
        xmlHttp.open("GET","../scripts/getdatamultiple.php?q="+subject+"_easy_multiple",true);  
        xmlHttp.send();
    }
    else
    {   
        xmlHttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                document.getElementById("recievedData").innerHTML=this.responseText;
            }
        };
        
        xmlHttp.open("GET","../scripts/getdataboolean.php?q="+subject+"_boolean",true);  
        xmlHttp.send();
    }
}