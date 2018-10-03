<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Page</title>
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
    
    <br/>

    <div id="recievedData"></div>

    <script src="../js/javascript.js"></script>   
     

</body>
</html>