<?php
include_once('class/function.php');

$userdata = new UserAuth();

if(isset($_POST['submit'])) {
    $fname = $_POST['fullname'];
    $uname = $_POST['username'];
    $uemail = $_POST['email'];
    $pasword = md5($_POST['password']);
    
    $sql = $userdata->registration($fname, $uname, $uemail, $pasword);
    
    if($sql) {
        echo "<script>alert('Registration successfull.');</script>";
        echo "<script>window.location.href='signin.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
        echo "<script>window.location.href='register.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>User Registration using PHP OOPs Concept</title>
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
        input[type="text"], input[type="email"], input[type="password"] {
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
        #usernameavailblty {
            font-size: 14px;
            margin-top: 5px;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
    function checkusername(va) {
        $.ajax({
            type: "POST",
            url: "check_availability.php",
            data: 'username=' + va,
            success: function(data) {
                $("#usernameavailblty").html(data);
            }
        });
    }
    </script>
</head>
<body>
<form class="form-horizontal" action='' method="POST">
    <fieldset>
        <div id="legend" align="center">
            <legend>User Registration using PHP OOPs Concept</legend>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="username">Fullname</label>
            <div class="controls">
                <input type="text" name="fullname" placeholder="" class="input-xlarge" required="true">
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="username">Username</label>
            <div class="controls">
                <input type="text" name="username" onblur="checkusername(this.value)" class="input-xlarge" required="true">
                <span id="usernameavailblty"></span>
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="email">E-mail</label>
            <div class="controls">
                <input type="email" name="email" placeholder="" class="input-xlarge" required="true">
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
                <button class="btn btn-success" type="submit" id="submit" name="submit">Register</button>
            </div>
        </div>
        
        <div class="control-group">
            <div class="controls">
                Already registered <a href="signin.php">Signin</a>
            </div>
        </div>
    </fieldset>
</form>
</body>
</html>