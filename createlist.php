<?php session_start(); 
if(!isset($_SESSION['user_name']))
header("Location:../login.php");
?>
<html>
    <head>
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<style>
    *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #dddddd;
}
.popup{
    background-color: #59d434;
    width: 420px;
    padding: 30px 40px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
    border-radius: 8px;
    display: none;
    font-family: "Poppins",sans-serif;
}
.closebutton{
    display: block;
    margin:0 0 auto;
    background-color: transparent;
    font-size: 30px;
    color: #ffffff;
    background: #03549a;
    border-radius: 100%;
    width: 40px;
    height: 40px;
    border: none;
    outline: none;
    cursor: pointer;
}
.popup h2{
    margin-top: -20px;
 }
 .popup p{
     font-size: 14px;
     margin: 20px 0;
     line-height: 25px;
 }
 a{
    display: block;
    width: 40px;
    height: 40px;
    position: relative;
    left:150px;
    margin: auto;
    background-color: #0f72e5;
    border-radius: 20px;
    color: #ffffff;
    text-decoration: none;
    padding: px 0;
}
</style> 
</head>
    <body>
        <div class="popup">
            <a href = "shopping-html/index1.php"><button id="close" class = "closebutton">&times;</button></a>
            <h1 style="font-weight:700; font-size: 35;">Add an item</h1>
            <br/>
            <form action = "connectlist.php" method="post">
                <!--<span style ="font-weight: 600;">Item Number</span><br>
                <input type="number" placeholder="Item ID" id = "Item-ID" name="Item-ID"><br>
-->
                <br><span style ="font-weight: 600;">Item Name</span><br/>
                <input type="text" placeholder="Item Name" style = "margin: auto;" id = "Item-name" name="Item-name" required><br>
                
                <br><span style ="font-weight: 600;">Price</span><br/>
                <input type="number" placeholder="Item Price" style = "margin: auto;" id = "item-price" name="item-price" required><br>
                
                <br><span style ="font-weight: 600;">Quantity</span>
                <br><input type="number" placeholder="Quantity of Item" id = "quantity" name="quantity" required><br>
                
                <br><span style ="font-weight: 600;">Category</span><br>
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
<br>
                
                <br><button type="submit" class="btn btn-primary">Submit</button><br>
            </form>
        </div>
    <!--Script-->
    <script type="text/javascript">
window.addEventListener("load", function(){
    setTimeout(
        function open(event){
            document.querySelector(".popup").style.display = "block";
        },
        0 
    )
});
document.querySelector("#close").addEventListener("click", function(){
    document.querySelector(".popup").style.display = "none";
});
    </script>
    </body>
</html>