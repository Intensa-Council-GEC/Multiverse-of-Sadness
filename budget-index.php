<?php session_start();
if (!isset($_SESSION['user_name']))
    header("Location:../login.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeSpend | Budget</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://kit.fontawesome.com/2291efdc8d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="bootstrap/fonts/bootstrap-icons.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/navbar.css" type="text/css">



    <script type="text/javascript" src="bootstrap/js/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .Progress {
            color: rgb(0, 0, 0);
            width: 82px;
            font-size: 18px;
            font-family: Inter;
            font-weight: 800;
            position: relative;
            margin-left: 15px;
        }

        .progressbar {
            border-radius: 10px;
            color: black;
            background: greenyellow;
        }

        .Progress p {
            font-size: 13;
        }

        .container-sm {
            max-width: 50%;
        }

        progress {
            width: 200px;
            height: 20px;
            border-radius: 10px;
            background-color: #FFACAC;
            overflow: hidden;
        }

        progress::-webkit-progress-bar {
            background-color: #98DFD6;
            border-radius: 10px;
        }

        /* Style the value of the progress element */
        progress::-webkit-progress-value {
            background-color: #FFACAC;
            border-radius: 10px;
        }

        .card {
            border: none;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>

    <div id="menuHolder" style="font-family:'Poppins', sans-serif">
        <div role="navigation" class="sticky-top border-bottom border-top" id="mainNavigation">
            <div class="flexMain">
                <div class="flex2">
                    <button class="whiteLink siteLink" style="border-right:1px solid #eaeaea" onclick="menuToggle()"><i class="fas fa-bars me-2"></i> MENU</button>
                </div>
                <div class="flex3 text-center" id="siteBrand" style="font-family:'Poppins', sans-serif">
                    Home
                </div>

                <div class="flex2 text-end d-block d-md-none">
                </div>

                <div class="flex2 text-end d-none d-md-block">

                </div>
            </div>
        </div>

        <div id="menuDrawer">
            <div class="p-4 border-bottom">
                <div class='row'>
                    <div class="col">
                        <img src=".\images\newlogo.png" style="height:3em;">
                    </div>
                    <div class="col text-end ">
                        <i class="fas fa-times" role="btn" onclick="menuToggle()"></i>
                    </div>
                </div>
            </div>
            <div>
                <a href="budget-index.php" class="nav-menu-item"><i class="fas fa-home me-3"></i>Home</a>
                <a href="transaction-index.php" class="nav-menu-item"><i class="fab fa-dollar-sign me-3"></i>Transaction History</a>
                <a href="./resources.php" class="nav-menu-item"><i class="fas fa-file-alt me-3"></i>Resources</a>
                <a href="index.html" class="nav-menu-item"><i class="fab me-3"></i>Log out</a>
                <!--
                <a href="#" class="nav-menu-item"><i class="fas fa-search me-3"></i>Explore</a>
                <a href="#" class="nav-menu-item"><i class="fas fa-wrench me-3"></i>Services</a>
                <a href="#" class="nav-menu-item"><i class="fas fa-dollar-sign me-3"></i>Pricing</a>
                
                <a href="#" class="nav-menu-item"><i class="fas fa-building me-3"></i>About Us</a>
                -->
            </div>
        </div>
    </div>

    <div class="container">

        <!--
        <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            Menu
        </a>
        <button class="js-push-btn" style="display:block;">
            Subscribe Push Messaging
        </button>


        <script src="main.js"></script>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="d-grid gap-3">
                    <span class="row"><a href="transaction-index.php"><button class="menu-button1" style="width:100%; height:45px;"><span class="menutext">Transactions</span></button></a></span>
                    <span class="row"><a href="budget-index.php"><button class="menu-button1" style="width:100%; height:45px;" style="background-color:#65f9c5;"><span class="menutext">Budgets</span></button></a></span>
                    <span class="row"><a href="../report-html/index1.php"><button class="menu-button1" style="width:100%; height:45px;"><span class="menutext">Report</span></button></a></span>
                    <span class="row"><a href="../activities-html/index1.php"><button class="menu-button1" style="width:100%; height:45px;"><span class="menutext">Activities</span></button></a></span>
                    <span class="row"><a href="../reminders-html/index1.php"><button class="menu-button1" style="width:100%; height:45px;"><span class="menutext">
                                    Reminders
                                </span></button></a></span>
                    <span class="row"><a href="../educate-html/index1.php"><button class="menu-button1" style="width:100%; height:45px;"><span class="menutext">Educate</span></button></a></span>
                    <span class="row"><a href="../help-html/index1.php"><button class="menu-button1" style="width:100%; height:45px;"><span class="menutext">Help</span></button></a></span>
                    <span class="row"><a href="../shopping-html/index1.php"><button class="menu-button1" style="width:100%; height:45px;"><span class="menutext">Shopping
                                    List</span></button></a></span>
                    <div><a href="register.php"><span style="color: red; font-size: 20; ">Log Out</span></a></div>
                </div>
            </div>
        </div
    -->

        <div class="card">

            <div class="container " style="width:100%; background-color:#FFF8E7; border:solid #FFF8E7; border-radius:40px;">
                <div class="row" style=" padding: 7% 7% 3%;">
                    <div class=" col-md-8">
                        <h1 style=" font-size: 2em">Total Budget: </h1>
                        <h1 style=" font-size: 1.5em">Rs.
                            <?php
                            $mysqli = new mysqli('localhost', 'root', '', 'safespend-2');
                            $email = $_SESSION['user_name'];
                            $query = "SELECT BID,Total_amount,Spent_amount from budget join keeps on BID=Budget_ID where Emailkeeps='$email' ";
                            $result = $mysqli->query($query);
                            $sumofremainingamount = 0;
                            $sumofspentamount = 0;
                            $sumoftotalamount = 0;
                            while ($row = $result->fetch_assoc()) {
                                $spent_amount = $row['Spent_amount'];
                                $total_amount = $row['Total_amount'];
                                $sumofspentamount += $spent_amount;
                                $sumoftotalamount += $total_amount;
                            }
                            $sumofremainingamount = $sumoftotalamount - $sumofspentamount;
                            echo $sumofremainingamount;
                            ?> Remaining
                        </h1>
                    </div>
                    <div class=" col-md-4">
                        <a href="addtran.php" style="text-decoration: none;"><button class="btn" style="display:block; background-color: #FFDD83">
                                Add Transaction
                            </button></a>
                    </div>
                </div>
                <div class="row" style=" padding: 3% 7% 7%;">
                    <div class="col-md-12"><progress class="progressbar" value="<?php echo $sumofspentamount; ?>" max="<?php echo $sumoftotalamount; ?>" style="width: 90%;"></progress>
                        <span>
                            <?php
                            if ($sumofspentamount < $sumoftotalamount)
                                echo (int) ($sumofspentamount / $sumoftotalamount * 100) . '%';
                            else if ($sumofspentamount > $sumoftotalamount)
                                echo "Exceeded the budget for this month";
                            else
                                echo "Budget Limit Reached";
                            ?>
                        </span>
                    </div>

                </div>
            </div>

            <div class="container " style="width:100%; border-radius:40px; margin-left: auto; margin-right: auto; padding: 5% 14%;">
                <a href="addbudget.php" style="text-decoration: none;">
                    <button class="btn" style="display:block; width: 100%; background-color: #FFBFA9">
                        Add Budget
                    </button>
                </a>
            </div>
            <form action = 'code2.php' method='post'>
            <?php
            $conn = new mysqli('localhost', 'root', '', 'safespend-2');
            $var = $_SESSION['user_name'];
            $sql = "SELECT * from Budget join keeps on BID=Budget_ID where emailkeeps='$var'";
            $result = mysqli_query($conn, $sql);
            $i = 0;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <?php
                    $id = $row['BID'];
                    $spentamt = $row['Spent_amount'];
                    $totalamt = $row['Total_amount'];
                    $category = $row['category'];
                    if ($totalamt != 0)
                        $percentage = (float) $spentamt / (float) $totalamt * 100;
                    else
                        $percentage = 0;
                    $percentage = round($percentage, 2); ?>
                    <span style="font-size:22px;">Category: <?php echo $category; ?></span>
                    <div class="card" style="background-color:#FFF8E7; border:solid #FFF8E7; border-radius:40px; height:200px;">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-8" style="display:flex; align-items:center; margin-right: 0; margin-left: auto;">

                                    <table style="text-align : left;">
                                        <td>
                                            <h1>
                                                <?php echo $spentamt . '/' . $totalamt; ?>
                                            </h1>
                                            </tr>
                                        <td>
                                            <?php
                                            if ($spentamt < $totalamt)
                                                echo '<h3>' . (int) ($spentamt / $totalamt * 100) . '% Spent</h3>';
                                            else
                                                echo "<h5 style='color:red; font-size:18px;'>Exceeded the budget for this month</h5>";
                                            ?>
                                            </tr>
                                    </table>


                                </div>

                                <div class="col-4">
                                    <canvas id="myChart<?php echo $i; ?>" style="max-width:600px;"></canvas>

                                    <script>
                                        var xValues = ["Spent", "Remaining"];

                                        var yValues = ["<?php echo $spentamt; ?>", "<?php echo ($totalamt - $spentamt); ?>"]
                                        var barColors = ["#FFBE83", "#98DFD6"];
                                        new Chart("myChart<?php echo $i; ?>", {
                                            type: "pie",
                                            data: {
                                                labels: xValues,
                                                datasets: [{
                                                    backgroundColor: barColors,
                                                    data: yValues,
                                                }],
                                            },
                                            options: {
                                                responsive: true,
                                                maintainAspectRatio: false,
                                                legend: {
                                                    display: false, // hide the legend
                                                },
                                                tooltips: {
                                                    enabled: false, // disable the tooltips
                                                },
                                                plugins: {
                                                    datalabels: {
                                                        display: false, // hide the data labels
                                                    },
                                                },
                                            },
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="row">
                            
                                    <button type='submit' class='btn btn-danger' name='budget_delete_id' value='<?php echo $id;?>' style="position:relative;top:-25px; width:100px;">Delete</button>
                                    
                                <!--
                                <?php
                                if ($spentamt < $totalamt)
                                    echo '<h3 style="font-size: 15%;">' . (int) ($spentamt / $totalamt * 100) . "% Spent</h3>";
                                else
                                    echo "<h5 style='color:red; font-size: 15%;'>Exceeded the budget for this month</h5>";
                                ?>

                            -->




                            </div>
                        </div>
                        <!-- <h3>

                        <?php
                        if ($spentamt > $totalamt) {
                            echo '<span style="color:red;">Budget_for_' . $category . '_exceeded ' . $percentage . '% Used </span>';
                        } else {
                            echo '<span style="color:green;"> ' . $row['category'] . ': ' . $percentage . '% </span>';
                            echo '<progress class="progressbar" value="' . $spentamt . '" max="' . $totalamt . '"></progress>';
                        }
                        ?>
                    </h3> -->

                    </div>
                <?php
                    $i++;
                }
                ?>

            <?php
                echo '<hr>';
            }
            
            ?>
            </form>
        </div>

    </div>

    <script>
        var menuHolder = document.getElementById('menuHolder')
        var siteBrand = document.getElementById('siteBrand')

        function menuToggle() {
            if (menuHolder.className === "drawMenu") menuHolder.className = ""
            else menuHolder.className = "drawMenu"
        }
        if (window.innerWidth < 426) siteBrand.innerHTML = "Home"
        window.onresize = function() {
            if (window.innerWidth < 420) siteBrand.innerHTML = "Home"
            else siteBrand.innerHTML = "Home"
        }
    </script>
</body>

</html>