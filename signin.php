<?php
session_start();
include_once('class/function.php');

$usercredentials = new UserAuth();

if(isset($_POST['signin'])) {
    $uname = $_POST['username'];
    $pasword = md5($_POST['password']);
    
    $ret = $usercredentials->signin($uname, $pasword);
    $num = mysqli_fetch_array($ret);
    
    if($num > 0) {
        $_SESSION['uid'] = $num['id'];
        $_SESSION['fname'] = $num['FullName'];
        $_SESSION['role'] = $num['UserRole'];
        
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Invalid details. Please try again');</script>";
        echo "<script>window.location.href='signin.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>User Signin using PHP OOPs Concept</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }
        .form-horizontal {
            max-width: 500px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        legend {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }
        .control-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .btn {
            background: #28a745;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background: #218838;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
<form class="form-horizontal" action='' method="POST">
    <fieldset>
        <div id="legend">
            <legend class="">User Signin using PHP OOPs Concept</legend>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="username">Username</label>
            <div class="controls">
                <input type="text" name="username" placeholder="" class="input-xlarge" required="true">
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="password">Password</label>
            <div class="controls">
                <input type="password" name="password" placeholder="" class="input-xlarge" required="true">
            </div>
        </div>
        
        <div class="control-group">
            <div class="controls">
                <button class="btn btn-success" type="submit" name="signin">Signin</button>
            </div>
        </div>
        
        <div class="control-group">
            <div class="controls">
                Not Registered yet? <a href="register.php">Register Here</a>
            </div>
        </div>
    </fieldset>
</form>
</body>
</html>