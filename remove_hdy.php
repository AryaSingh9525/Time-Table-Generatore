<?php
include 'boot.php';
include 'conn.php';
include 'admin_top.php';

if(isset($_POST['submit']))
{
$date = $_POST["date"];
$sql = "DELETE FROM holidays WHERE date='$date'"; 
$r1 = mysqli_query($conn, $sql);
if($r1==true){
echo '<script language="javascript">';
 echo 'alert(" successful")';
echo '</script>';//window.alert("updated");
}
else
{
    echo '<script language="javascript">';
    echo 'alert(" unsuccessful")';
   echo '</script>';    
}
}
    mysqli_close($conn);
?>

<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
    <title> Holidays Details </title>
    <style>
        body {
            background-image: url("pics/black.jpg");
            /*background-color: #222222;*/
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: white;
            background-size: 100%;
            font-family: verdana, sans-serif;
        }

        .txt9 {
            color: white;
            font-size: 18px;
        }

        .bo-rad-10 {
            border-radius: 10px;
        }

        .txt10 {
            font-family: Montserrat, sans-serif;
            font-weight: 400;
            font-size: 14px;
            color: #666666;
        }

        .sizefull {
            width: 100%;
            height: 100%;
        }

        .row {
            margin-right: -15px;
            margin-left: 70px;
        }

        .col-md-4 {
            width: 72.333333%;
        }
    </style>

    <script>
        function validateAlpha1() {
            var textInput = document.getElementById("fname").value;
            textInput = textInput.replace(/[^A-Za-z]/g, "");
            document.getElementById("fname").value = textInput;
        }

      

        function isNumberKey() {
            var textInput = document.getElementById("pno").value;
            textInput = textInput.replace(/[^0-9]/g, "");
            document.getElementById("pno").value = textInput;

            var exp = document.getElementById("exp").value;
            if (exp > 50) {
                alert("Experience cannot exceed 50!");
                document.getElementById("exp").value = "";
            }
        }

       
    </script>

</head>
<body>
<div class="animsition" style="top: 180px; position: relative">
    <!-- <div class="item-slick1 item1-slick1" style="background-image: url(pics/black.jpg);"> -->

    <div align="center">
        <b>
            <h1 style="font-family:Matura MT Script Capitals,sans-serif; font-size:45px;">
                Remove Holidays!
            </h1>
        </b>
        <br/><br/>
        
        <br/>
        <div style="margin-left: 25%;">
        <form id name="add_fact" method=post action=remove_hdy.php class="wrap-form-reservation size22 m-l-r-auto">
     
        <div class="row">
                    <div class="col-sm-5">
                        <span class="txt9">
                            Date:
                        </span>
                       <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                            <input class="bo-rad-10 sizefull txt10 p-l-20" type="date" name="date" id="dat"
                                   oninput="isNumberKey()" required/>
                        </div>
                    </div>
                </div>
              
            
                

               <b>
               <div style="margin-right: 45%;">
            <input type="submit" name=submit class="btn btn-success" id="btnValidate">
          
</div>
        </form>
        </div>
    </div>
    <div class="end-footer bg2" style="top: 400px; position: relative">
        <div class="container">
            <div class="flex-sb-m flex-w p-t-22 p-b-22">
                <div class="p-t-5 p-b-5">
                    <a href="#" class="fs-15 c-white"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
                    <a href="#" class="fs-15 c-white"><i class="fa fa-facebook m-l-18" aria-hidden="true"></i></a>
                    <a href="#" class="fs-15 c-white"><i class="fa fa-twitter m-l-18" aria-hidden="true"></i></a>
                </div>

                <div class="txt17 p-r-20 p-t-5 p-b-5">
                    Copyright &copy; 2019 All rights reserved
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>


<!--===============================================================================================-->
<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
<script type="text/javascript" src="js/slick-custom.js"></script>

<!--===============================================================================================-->
<script type="text/javascript" src="vendor/parallax100/parallax100.js"></script>
<script type="text/javascript">
    $('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>