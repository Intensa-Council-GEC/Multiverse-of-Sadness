<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SafeSpend | Register</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">       
        <link rel="stylesheet" href="bootstrap2/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap2/js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="bootstrap2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="bootstrap/fonts/bootstrap-icons.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/reg.css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.6.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
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
        <!-- <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="index.php" class="logo"><svg src="C:\xampp\htdocs\sshackathon\images\LOGO.svg" alt="lifestyle store logo"></svg></a>
                </div>
                <div class="navbar-collapse collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right" style="font-size:20px;letter-spacing: 4px;word-spacing: -8px;">
                        <li><a href="signup.php" target="_self"><span class="glyphicon glyphicon-user">&nbsp;Sign Up</span></a></li>
                        <li><a href="login.php" target="_self" style="color:#e62272;"><span class="glyphicon glyphicon-log-in">&nbsp;Login</span></a></li>
                    </ul>
                </div>    
            </div>
        </nav>-->
        <br><br><br><br><br><br> 
            <div class="container">
                <div class="row">
                    <div class="colcol-xs-offset-3">
                        <div class="panel">                  
                            <div class="panel-heading">
                                <h2 style="text-align:center">REGISTER</h2>
                            </div>
                            <div class="panel-body">
                                <center>
                                
                                <form action="registerpost.php" method = "post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email" required> 
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control"  id="password" name="password" placeholder="Password" pattern=".{6,}" required>
                                        <!-- <i class="bi bi-eye" id="togglePassword" style="cursor:pointer"></i> -->
                                        
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control"  id="password2" name="password2" placeholder="Repeat Password" pattern=".{6,}" required>
                                        <!-- <i class="bi bi-eye" id="togglePassword" style="cursor:pointer"></i> -->
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control"  id="name" name="name" placeholder="Name"  required>
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control"  id="mobileno" name="mobileno" placeholder="Contact"  required>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control"  id="age" name="age" placeholder="Age"  required>
                                    </div>
                                    <script>
                                        const togglePassword = document.querySelector('#togglePassword');
                                        const password = document.querySelector('#password');
                                        togglePassword.addEventListener('click',function(e){
                                        const type = password.getAttribute('type') == 'password' ? 'text' : 'password';
                                        password.setAttribute('type',type);
                                        this.classList.toggle('-slash');
                                    });
                                    </script>
                                    <button type="submit" value="Upload" class="btn">Register</button><br>

                                </form> 
                                </center>
                            </div>
                            <br><br><br>
                            <div class="panel-footer">
                                <center> Already have an account? <a href="login.php" style="color:#00235B">Login</a></center>
                            </div>     
                        </div>
                    </div>
                </div>
            </div>
        
    </body>
</html> 