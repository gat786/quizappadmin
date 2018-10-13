<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quiz App Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <script src="main.js"></script>
</head>
<body>
    
    <div class="main-login-page">

        <div class="header text-center">
            <h1 class="header-text">Quiz App Admin Panel</h1>
        </div>

        <form action="scripts/login.php" method="POST">
            <div class="login-pane">
                <select class="login-input" name="username" name="role-select" id="role-selector">
                    <option value="admin">Admin</option>
                </select>
                <input name="password" type="password" class="login-input" placeholder="Enter Admin Password"> <br>
                <button class="login-button" >Login</button>
            </div>
        </form>
    </div>
</body>
</html>