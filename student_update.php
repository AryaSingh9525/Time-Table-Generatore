<?php
if (!isset($_SESSION)) {
    session_start();
}
include 'boot.php';
include 'conn.php';
include 'admin_top.php';

$lr1 = mysqli_query($conn, "SELECT * FROM student_details ORDER BY reg_no ");
$lr2 = mysqli_fetch_assoc($lr1);
$flag = 0;

if (isset($_POST['submit'])) {
   
    $k="update student_details set  cour_id = '". $_POST["cour_id"] ." ', sem_id =' " . $_POST["sem_id"] ."',sec_id ='" .$_POST["sec_id"] ."' 
    where reg_no = '" . $_POST["reg_no"] ."'";
    $sql = mysqli_query($conn,$k);
     mysqli_close($conn);
     echo "<script type=\"text/javascript\">window.alert('Record updated successfully');
     window.location.href= '../attg1/student_update.php';</script>";
    
}

?>

<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <link rel="icon" type="image/png" href="images/icons/favicon.png" />
    <title> Update Student </title>
    <style>
        body {
            background-image: url("pics/black.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: white;
            background-size: 100%;
            font-family: Schoolbell;
        }

        select {
            /*border-color: none;*/
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
        function isNumberKey() {
            var textInput = document.getElementById("reg_no").value;
            textInput = textInput.replace(/[^0-9]/g, "");
            document.getElementById("reg_no").value = textInput;
        }

        function validateAlpha1() {
            var textInput = document.getElementById("cour_id").value;
            textInput = textInput.replace(/[^A-Za-z0-9]/g, "");
            document.getElementById("cour_id").value = textInput;
        }

        function validateAlpha2() {
            var textInput = document.getElementById("sem_id").value;
            textInput = textInput.replace(/[^A-Za-z0-9]/g, "");
            document.getElementById("sem_id").value = textInput;
        }

        function validateAlpha3() {
            var textInput = document.getElementById("sec_id").value;
            textInput = textInput.replace(/[^A-Za-z0-9]/g, "");
            document.getElementById("sec_id").value = textInput;
        }
    </script>

</head>

<body>
    <div class="animsition">
        <!-- <div class="item-slick1 item1-slick1" style="background-image: url(pics/black.jpg);"> -->
        <br><br><br><br><br><br><br> <br>
        <div align="center">
            <b>
                <h1 style="font-family:Matura MT Script Capitals,sans-serif; font-size:45px;">
                    Update Student!
                </h1>
            </b><br /> <br />
            <span style="font-size: 18px;">
                <?php
                //echo "Previous ID: " . $lr2['reg_no'];
                ?></span>
            <br />
            <br />
            <?php
            if ($flag == 1) {
                ?>
                <div>
                    <h1 style="font-size:18px" class="btn btn-info"> Student <strong style="text-transform: capitalize;"><?php echo $reg_no ?></strong> is updated successfully! :)</h1>
                </div>
                <?php
                header("refresh:3;url=student_update.php");
            }
            ?>
            <br />

            <form id name="update_stu" method=post action=student_update.php class="wrap-form-reservation size22 m-l-r-auto">

                <!-- <div class="col-md-6"> -->

                <div class="row">
                    <!-- <div class="col-md-4"> -->
                    <span class="txt9">
                        Reg.No.:
                    </span>
                    <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                        <input class="bo-rad-10 sizefull txt10 p-l-20" type="number" id="reg_no" name="reg_no" required>
                    </div>
                </div>


                <div class="row">

                    <span class="txt9">
                        Course Id:
                    </span>
                    <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                    <select class="bo-rad-10 sizefull txt10 p-l-20" type="text" id="cour_id" name="cour_id" required />
                        <option value="-1"> ---- select ---- </option>
                        <?php
                        $d1 = mysqli_query($conn, "SELECT DISTINCT cour_id from course_details");
                        while ($d2 = mysqli_fetch_array($d1)) {
                            echo "<option value='" . $d2['cour_id'] . "'>" . $d2['cour_id'] . "</option>";
                        }     ?>
                        </select>
                    </div>

                </div>


                <div class="row">

                    <span class="txt9">
                        Semester Id:
                    </span>
                    <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                        <select class="bo-rad-10 sizefull txt10 p-l-20" type="text" id="sem_id" name="sem_id" required/>
                            <option value="-1"> ---- select ---- </option>
                            <?php
                            $d1 = mysqli_query($conn, "SELECT DISTINCT sem_id from semester");
                            while ($d2 = mysqli_fetch_array($d1)) {
                                echo "<option value='" . $d2['sem_id'] . "'>" . $d2['sem_id'] . "</option>";
                            }     ?>
                        </select>
                    </div>
                </div>
                
                <div class="row">

                    <span class="txt9">
                        Section Id:
                    </span>
                    <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                        <select class="bo-rad-10 sizefull txt10 p-l-20" type="text" id="sec_id" name="sec_id" required/>
                            <option value="-1"> ---- select ---- </option>
                            <?php
                            $d1 = mysqli_query($conn, "SELECT DISTINCT sec_id from sections");
                            while ($d2 = mysqli_fetch_array($d1)) {
                                echo "<option value='" . $d2['sec_id'] . "'>" . $d2['sec_id'] . "</option>";
                            }     ?>
                        </select>
                    </div>
                    <div>
                        <input type="submit" value="Update Records" name="submit" class="btn btn-success">
                    </div>

            </form>
            <br><br><br /><br />
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