<?php session_start();
if (!isset($_SESSION['user_name']))
    header("Location:../login.php");
?>
<html>

<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="css/addtran.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FEFFF1;
        }

        .popup {
            background-color: #FFDD83;
            width: 70%;
            height: 45%;
            padding: 30px 40px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 10%;
            display: none;
            font-family: "Poppins", sans-serif;
        }

        form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 3em;
        }
    </style>
</head>

<body>
    <div class="popup form" style="height:50%;">
        <div class=" row g-2" style="padding-top:10%; font-size:75%;">
            <div class="col-md-8 offset-1">
                <h1 style="font-weight:400%; font-size: 350%;">Add a Transaction</h1>
            </div>
            <div class=" col-md-2"><a href="budget-index.php"><button id="close" class="closebutton" style="width:80px; height:80px;">&times;</button></a>
            </div>
        </div>


        <br />
        <form action="connect.php" method="post" style="height:65%;">
            <div class="row">

            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" placeholder="Amount" id="amount" name="amount" min=1>
            </div>
            <div class="mb-3">
                <label for="transaction-type" class="form-label">Category</label>
                <select id="transaction-type" name="transaction-type">
                    <option value="Debit">Debit</option>
                    <option value="Credit">Credit</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="mode-of-payment" class="form-label">Category</label>
                <select id="mode-of-payment" name="mode-of-payment">
                    <option value="Cash">Cash</option>
                    <option value="GPay">Gpay</option>
                    <option value="Card">Card</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select id="category" name="category">
                    <option value="General">General</option>
                    <option value="Transport">Transport</option>
                    <option value="Food">Food</option>
                    <option value="Shopping">Shopping</option>
                    <option value="Rent">Rent</option>
                    <option value="Petrol">Petrol</option>
                    <option value="Medicine">Medicine</option>
                    <option value="Entertainment">Entertainment</option>
                </select>
            </div>
            <button type="submit" class="btn" style="background-color:#98DFD6; font-size: 100%;">Submit</button>
        </form>
    </div>

    <!--Script-->
    <script type="text/javascript">
        window.addEventListener("load", function() {
            setTimeout(
                function open(event) {
                    document.querySelector(".popup").style.display = "block";
                },
                0
            )
        });
    </script>
</body>

</html>