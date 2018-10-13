<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Page</title>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Niramit" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    
    <div class="header text-center">
        <h1 class="header-text">Quiz App Admin Panel</h1>
    </div>
    <div class="center-selector-holder">
        <div class="center-selector">
            <table id="center-table">
                <tr>
                    <td>
                        <span id="viewTypeSelector">
                            <label class="radio">
                            <input type="radio" onclick="questionChecked()" name="view" class="radio" id="questionselector"> Questions <br/>
                            </label>
                            <label class="radio">
                            <input type="radio" name="view" onclick="userChecked()" class="radio" id="userselector"> Users <br/>
                            </label>
                            <label class="radio">
                            <input type="radio" name="view" onclick="scoreChecked()" class="radio" id="scoreselector"> Scores <br/>
                            </label>
                        </span>

                        <div id="viewAddButtons" style="display:none">
                            <button type="button" onclick="viewUsers()"> View </button>
                            <button type="button" onclick="addUsers()"> Add </button>
                        </div>

                        
                        <div id="viewAddButtonsScores" style="display:none">
                            <button type="button" onclick="viewScores()"> View </button>
                        </div>
                    </td>
                        
                    <td>
                        <span id="questionTypeSelector" style="display:none">
                            <label class="radio">
                                <input type="radio" name="question" onclick="onTypeSelected()" class="radio" id="mcqselector"> MCQ <br/>
                            </label>
                            <label class="radio">
                                <input type="radio" name="question"onclick="onTypeSelected()" class="radio" id="truefalseselector"> True or False <br/>
                            </label>
                        </span>
                    </td>
                
                    <td> 
                        <span id="subjectSelector" style="display:none">
                            <select name="subjects" id="subjectDropDown">
                                <option value="science">Science</option>
                                <option value="geography">Geography</option>
                                <option value="history">History</option>
                                <option value="mythology">Mythology</option>
                                <option value="computers">Computer Science</option>
                                <option value="films">Films</option>
                                <option value="sports">Sports</option>
                            </select>
                            <button onclick="onSubjectSelected()">View</button>
                            <button onclick="addQuestions()">Add</button>
                        </span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <br/>
    <div id="loader-holder">
        <div class="loader" style="display:none;" id="loader"></div>
    </div>

    <div id="updateUser" class="w3-modal" style="display:none">
        <div class="w3-modal-content">
            <div class="w3-container w3-background">
                <a onclick="document.getElementById('updateUser').style.display='none'" class="w3-button">&times;</a>
                <?php
                    include "./html/usersUpdate.php";
                ?>
            </div>
        </div>
    </div>

    <div id="updateMultiple" class="w3-modal" style="display:none">
        <div class="w3-modal-content">
            <div class="w3-container w3-background">
                <a onclick="document.getElementById('updateMultiple').style.display='none'" class="w3-button w3-display-topright">&times;</a>
                <?php
                    include "./html/multipleUpdate.php";
                ?>
            </div>
        </div>
    </div>

    <div id="updateBoolean" class="w3-modal" style="display:none">
        <div class="w3-modal-content">
            <div class="w3-container w3-background">
                <span onclick="document.getElementById('updateBoolean').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <?php
                    include "./html/booleanUpdate.php";
                ?>
            </div>
        </div>
    </div>

    <div class="data-recieved-holder" id="recievedData"></div>

    <script src="../js/view.js"></script>   
     

</body>
</html>