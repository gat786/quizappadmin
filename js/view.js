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

var usersModal = document.getElementById("updateUser");
var multipleModal = document.getElementById("updateMultiple");
var booleanModal = document.getElementById("updateBoolean");

var buttonsView = document.getElementById("viewButtons");
var id = null;

function updateUserModalDisplay(id,table_name)
{
    console.log("update request logged from "+table_name);
    usersModal.style.display="block";
    
}

function questionChecked(){
    console.log("checked question radio");
    changeVisibility("viewAddButtons","none");
    changeVisibility("viewAddButtonsScores","none");
    onViewSelected();
}


function scoreChecked(){
    console.log("checked score radio");
    changeVisibility("viewAddButtonsScores","block");
    changeVisibility("viewAddButtons","none");
    changeVisibility("questionTypeSelector","none");
    changeVisibility("recievedData","none");
    changeVisibility("subjectSelector","none");
}

function userChecked(){
    console.log("checked User radio");
    changeVisibility("viewAddButtonsScores","none");
    changeVisibility("viewAddButtons","block");
    changeVisibility("questionTypeSelector","none");
    changeVisibility("recievedData","none");
    changeVisibility("subjectSelector","none");
}

function updateMultipleModalDisplay(id,table_name)
{
    console.log("update request logged from "+table_name);
    multipleModal.style.display="block";
}

function updateBooleanModalDisplay(id,table_name)
{
    console.log("update request logged from "+table_name);
    booleanModal.style.display="block";    
}

function updateBoolean(){

}

function updateMultiple(){

}

function updateUser(){

}

function addBoolean(){

}

function addMultiple(){

}

function addUser(){
    
}

function deleteUser(deleted,table_name){
    console.log("id is "+deleted);
    console.log("table name is "+table_name);
    var result=window.confirm("Are you sure to delete id : "+deleted);
    if (result)
    {
        xmlHttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                console.log(this.responseText);
            }
        };
        
        xmlHttp.open("GET","../scripts/deletethings.php?id="+deleted+"&table="+table_name,true);  
        xmlHttp.send();
    }
}

function viewUsers(){
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

function viewScores(){
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

function multipleModalSubmit(question,option1,option2,option3,answer,table_name,type,id){
    if(type=="update"){

    }
    else{
        console.log("updating multiple question");
        xmlHttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                document.getElementById("recievedData").innerHTML=this.responseText;
            }
        };
        
        xmlHttp.open("GET","../scripts/addthings.php?table="+table_name+"&type=multiple&question="+question+
            "&option1="+option1+"&option2="+option2+"&option3="+option3+"&answer="+answer,true);  
        xmlHttp.send();
    }
}

function booleanModalSubmit(question,answer,type,id){
    if(type=="update"){

    }
    else{
        
    }
}

function userModalSubmit(username,email,password,type,id){
    if(type=="update"){

    }
    else{
        
    }
}

function onViewSelected(){
    changeVisibility("subjectSelector","none");
    changeVisibility("recievedData","none");
    
    changeVisibility("questionTypeSelector","block");
        
    
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