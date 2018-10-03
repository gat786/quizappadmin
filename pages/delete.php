<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete Questions</title>
</head>
<body>
    <table>
        <tr>
            <td>
                <span id="viewTypeSelector">
                    <input type="radio" class="form-control" name="view" id="questionselector"> Questions <br/>
                    <input type="radio" name="view" id="userselector"> Users <br/>
                    <input type="radio" name="view" id="scoreselector"> Scores <br/>
                    <input type="button" value="Go.!" onclick="onViewSelected()"> <br/>
                </span>
            </td>
                
            <td>
                <span id="questionTypeSelector" style="display:none">
                    <input type="radio" name="question" id="mcqselector"> MCQ <br/>
                    <input type="radio" name="question" id="truefalseselector"> True or False <br/>
                    <input type="button" value="Go.!" onclick="onTypeSelected()">
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
                    <input type="button" value="Go.!" onclick="onSubjectSelected()">
                </span>
            </td>
        </tr>
    </table>

    <div id="usernameDeleteEntry" style="display:none">
        <input type="text" name="username" id="usernameEntry" placeholder="Username">
        <input type="button" value="Delete" onclick="presentData()">
        <div id="userDataPresenter" style="display:none">
            <h3>Your selected user is</h3>
            <span id="userDataEstate"></span>
            <h3>Are You Sure to Proceed.</h3>
            <input type="button" value="Delete" onclick="deleteUser()">
        </div>
    </div>

    <div id="questionDeleteEntry" style="display:none">
        <input type="text" name="username" id="questionIdEntry" placeholder="Question Id">
        <input type="button" value="Delete">
    </div>

    <div id="scoreDeleteEntry" style="display:none">
        <input type="text" name="username" id="scoreEntry" placeholder="Username">
        <input type="button" value="Delete">
    </div>
    
    <br/>

    <div id="recievedData"></div>

    <script src="../js/delete.js"></script>
    
</body>
</html>