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
var table_name="";

function updateUserModalDisplay(id,table_name,typerequest)
{
    console.log("update request logged from "+table_name);
    usersModal.style.display="block";
    requestId=id;
    console.log("id is "+id);
    requestType=typerequest;
    console.log("request type is "+typerequest);
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

function updateMultipleModalDisplay(id,tab_name,typerequest)
{
    console.log("update request logged from "+tab_name);
    multipleModal.style.display="block";
    table_name=tab_name;
    requestType=typerequest;
    requestId=id;
    console.log("request type "+typerequest);
    console.log("userid "+id);
}

var requestType="";
var requestId="";

function updateBooleanModalDisplay(id,tab_name,typerequest)
{
    console.log("update request logged from "+tab_name);
    booleanModal.style.display="block";    
    console.log("request type "+typerequest);
    table_name=tab_name;
    requestType=typerequest;
    console.log("userid "+id);
    requestId=id;
}

function addQuestions(){
    console.log("Adding Question Requested");
    if (mcq.checked){
        console.log("add Multiple Question");
        requestType="add";
        var subject=subjectDropDown.options[subjectDropDown.selectedIndex].value;
        console.log("subject is "+subject);
        table_name=subject+"_easy_multiple";
        multipleModal.style.display="block";
    }else{
        console.log("add Boolean Question");
        booleanModal.style.display="block";
        requestType="add";
        var subject=subjectDropDown.options[subjectDropDown.selectedIndex].value;
        table_name=subject+"_boolean";
        console.log("subject is "+subject);
    }
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

function multipleModalSubmit(){
    var question = document.getElementById("questionMultipleEntry").value;
    var option1 = document.getElementById("option1MultipleEntry").value;
    var option2 = document.getElementById("option2MultipleEntry").value;
    var option3 = document.getElementById("option3MultipleEntry").value;
    var answer = document.getElementById("answerMultipleEntry").value;

    console.log("table name is "+table_name);
    console.log("question is "+question+" answer is "+answer+" option 1 is "+option1+" option 2 is "+option2+"option3");
    if(requestType=="update"){
        console.log("updating multiple question");
        xmlHttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                document.getElementById("recievedData").innerHTML=this.responseText;
            }
        };
        
        xmlHttp.open("GET","../scripts/updatethings.php?table="+table_name+"&id="+requestId+"&type=multiple&question="+question+
            "&option1="+option1+"&option2="+option2+"&option3="+option3+"&answer="+answer,true);  
        xmlHttp.send();
    }
    else{
        console.log("adding multiple question");
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

function booleanModalSubmit(){
    var question=document.getElementById("booleanQuestionEntry");
    var answer=document.getElementById("answerDropdown");
    
    question=question.value;
    answer=answer.value;

    console.log("submitted data"+question.value+"  "+answer.value+"  "+requestId);

    if(requestType=="update"){
        console.log("updating boolean question");
        xmlHttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                document.getElementById("recievedData").innerHTML=this.responseText;
            }
        };
        
        xmlHttp.open("GET","../scripts/updatethings.php?table="+table_name+"&id="+requestId+"&type=boolean&question="+question+
            "&answer="+answer,true);  
        xmlHttp.send();
        changeVisibility("recievedData","block");
    }
    else{
        console.log("adding boolean question");
        
        xmlHttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                document.getElementById("recievedData").innerHTML=this.responseText;
            }
        };
        xmlHttp.open("GET","../scripts/addthings.php?table="+table_name+"&type=boolean&question="+question+"&answer="+answer,true);  
        xmlHttp.send();
        changeVisibility("recievedData","block");
    }
}

function addUsers(){
    console.log("add users called");
    changeVisibility("updateUser","block");
    requestType="add";
    table_name="users";
}

function userModalSubmit(){
    var username=document.getElementById("nameEntry").value;
    var email=document.getElementById("emailEntry").value;
    var password=document.getElementById("passwordEntry").value;
    console.log("submitted data"+username+" "+email+" "+password+" "+requestId);
    console.log("table name is users");
    if(requestType=="update"){
        console.log("updating user");
        xmlHttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                document.getElementById("recievedData").innerHTML=this.responseText;
            }
        };
        
        xmlHttp.open("GET","../scripts/updatethings.php?table=users&id="+requestId+"&type=user&username="+username+
            "&email="+email+"&password="+password,true);  
        xmlHttp.send();
        changeVisibility("recievedData","block");
    }
    else{
        console.log("adding user");
        
        xmlHttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                document.getElementById("recievedData").innerHTML=this.responseText;
            }
        };
        xmlHttp.open("GET","../scripts/addthings.php?table=users&type=user&username="+username+
            "&email="+email+"&password="+password,true);  
        xmlHttp.send();
        changeVisibility("recievedData","block");
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