<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>SafeSpend | Log in</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap2/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap2/js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="bootstrap2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="bootstrap/fonts/bootstrap-icons.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/reg.css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.6.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Stylesheet-->
    <style media="screen">
      body{
                font-family: 'Poppins', sans-serif;
                background-color: #98DFD6;
            }
            .btn{
                font-size: 24px;
                border-color:#E21818;
                border:1;
                background-color:#fff;
           
                color: #E21818;
                height: auto;
            }
            .btn.focus, .btn:focus, .btn:hover {
            color: #fff;
            text-decoration: none;
            background-color:#E21818;
            }
            .field-icon {
            float: right;
            margin-right: 140px;
            margin-top: -25px;
            position: relative;
            z-index: 1;
            }
            .red{
                color: red;
            }
           
    </style>
</head>
<body>
    <!-- <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="loginpost.php" method="post">
        <h2>LOGIN</h2>

        <?php if (isset($_GET['error'])) { ?>

        <p class="error">
            <?php echo $_GET['error']; ?>
        </p>

        <?php } ?>

        <label>Email ID</label>

        <input type="text" name="uname" placeholder="Email ID" required/><br />

        <label>Password</label>

        <input type="password" name="password" placeholder="Password" required/><br />

        <button type="submit">Login</button>
        <div class="social">
    <div class="fb" style="margin: auto; width:auto"><a href = "./register.php">New user? Register here</a></div>
    </div>
    </form> -->
    <br><br><br><br><br><br> 
    <div class="container">
                <div class="row">
                    <div class="colcol-xs-offset-3">
                        <div class="panel">                  
                            <div class="panel-heading">
                                <h2 style="text-align:center">LOGIN</h2>
                            </div>
                            <div class="panel-body">
                                <center>
                                
                                <form action="loginpost.php" method = "POST">
                                <?php if (isset($_GET['error'])) { ?>

                                <p class="error">
                                 <?php echo $_GET['error']; ?>
                                </p><?php } ?>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="uname" placeholder="Email" required> 
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control"  id="password" name="password" placeholder="Password" pattern=".{6,}" required>
                                        <!-- <i class="bi bi-eye" id="togglePassword" style="cursor:pointer"></i> -->
                                        
                                    </div>
                                    
                                    <button type="submit" value="Upload" class="btn">LOGIN</button><br>

                                </form> 
                                </center>
                            </div>
                            <br><br><br>
                            <div class="panel-footer">
                                <center> Don't have an account? <a href="register.php" style="color:#00235B">Register here</a></center>
                            </div>     
                        </div>
                    </div>
                </div>
            </div>
        
    
</body>
</html>
