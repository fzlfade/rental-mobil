<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css1/bootstrap.css">
    <title>LOGIN</title>
</head>
<body>
    <div class="container"><br><br>
        <center><div align="center" style="width:500px" class="card">
            <div class="card-header" >
                <h2 align="center">LOGIN</h2><hr>
                <div align="center">
                <img src="img/pngwing.com.png"  height="250" width="250" alt="icon">
                
                    <form action="proses_login.php" method="post">
                        <label for="">Username</label><br>
                        <input type="text" name="username" placeholder="Enter Username" id="" ><br>
                        <label for="">Password</label><br>
                        <input type="password" name="password" placeholder="Enter Password" id="" ><br><br>
                        <input type="submit" value="Login" class="btn btn-dark btn-sm"><hr>
                    </form>
                    </div>
            </div>
        </div></center>
    </div>
    
    
</body>
</html>