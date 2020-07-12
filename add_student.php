<?php
if (!isset($_SESSION)) {
    session_start();
}
include 'boot.php';
include 'conn.php';
include 'admin_top.php';

$lr1 = mysqli_query($conn, "SELECT * FROM student_details ORDER BY reg_no DESC LIMIT 1");
$lr2 = mysqli_fetch_assoc($lr1);
$flag = 0;

if (isset($_POST['submit'])) {
    $reg_no = $_POST['reg_no'];
    $cour_id = $_POST['cour_id'];
    $sem_id = $_POST['sem_id'];
    $sec_id = $_POST['sec_id'];

    $s1 = mysqli_query($conn, "SELECT cour_id from course_details where cour_name ='$cour_id' ");
    $s2 = mysqli_fetch_assoc($s1);

    $s3 = mysqli_query($conn, "SELECT sem_id from semester where sem_no ='$sem_id' ");
    $s4 = mysqli_fetch_assoc($s3);

    $s5 = mysqli_query($conn, "SELECT sec_id from sections where sec_no ='$sec_id' ");
    $s6 = mysqli_fetch_assoc($s5);

    //FOR INSERT INTO STUDENT TABLE
    $sql = mysqli_query($conn, "INSERT INTO student_details (reg_no, cour_id, sem_id, sec_id) 
    VALUES ('$reg_no', '$s2[cour_id]', '$s4[sem_id]', '$s6[sec_id]'  )");
    echo "<script type=\"text/javascript\">window.alert('Student record added successfully');
    window.location.href= '../attg/add_student.php';</script>";
}

?>

<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
    <title>Add Student </title>
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
<div class="animsition" align="center" style="top: 180px; position: relative;">
    <b>
        <h1 style="font-family:Matura MT Script Capitals,sans-serif; font-size:45px;">
            Add Student!
        </h1>
    </b><br/> <br/>
    <span style="font-size: 18px;">
                <?php
                echo "Previous ID: " . $lr2['reg_no'];
                ?></span>
    <br/>
    <br/>
    <?php
    if ($flag == 1) {
        ?>
        <div>
            <h1 style="font-size:18px" class="btn btn-info"> Student <strong
                        style="text-transform: capitalize;"><?php echo $reg_no ?></strong> is added successfully! :)
            </h1>
        </div>
        <?php
        header("refresh:3;url=add_student.php");
    }
    ?>
    <br/>

    <form id name="add_stu" method=post action=add_student.php class="wrap-form-reservation size22 m-l-r-auto">

        <span class="txt9">
                        Reg.No.:
                    </span>
        <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
            <input class="bo-rad-10 sizefull txt10 p-l-20" type="number" id="reg_no" name="reg_no"
                   oninput="isNumberKey();" required>
        </div>

        <span class="txt9">
                        Course Id:
                    </span>
        <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
            <select class="bo-rad-10 sizefull txt10 p-l-20" type="text" id="cour_id" name="cour_id" required/>
            <option value="-1"> ---- select ----</option>
            <?php
            //$dept2 = mysqli_query($conn, "SELECT dept_id from department where  dept_name = '$dept'");
            // $d1 = mysqli_query($conn, "SELECT DISTINCT cour_name from course_details ");
            $d1 = mysqli_query($conn, "SELECT cour_name from course_details");
            while ($d2 = mysqli_fetch_array($d1)) {
                echo "<option value='" . $d2['cour_name'] . "'>" . $d2['cour_name'] . "</option>";
            } ?>
            </select>
        </div>

        <span class="txt9">
                        Semester Id:
                    </span>
        <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
            <select class="bo-rad-10 sizefull txt10 p-l-20" type="text" id="sem_id" name="sem_id" required/>
            <option value="-1"> ---- select ----</option>
            <?php
            $d1 = mysqli_query($conn, "SELECT DISTINCT sem_no from semester");
            while ($d2 = mysqli_fetch_array($d1)) {
                echo "<option value='" . $d2['sem_no'] . "'>" . $d2['sem_no'] . "</option>";
            } ?>
            </select>
        </div>

        <span class="txt9">
                        Section Id:
                    </span>
        <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
            <select class="bo-rad-10 sizefull txt10 p-l-20" type="text" id="sec_id" name="sec_id" required/>
            <option value="-1"> ---- select ----</option>
            <?php
            $d1 = mysqli_query($conn, "SELECT DISTINCT sec_no from sections");
            while ($d2 = mysqli_fetch_array($d1)) {
                echo "<option value='" . $d2['sec_no'] . "'>" . $d2['sec_no'] . "</option>";
            } ?>
            </select>
        </div>
        <!--                <div>-->
        <input type="submit" name=submit class="btn btn-success" id="btnValidate">
        <input type="reset" name=reset value=Reset class="btn btn-danger">
    </form>
    <br><br><br/><br/>


</div>


<div class="end-footer bg2" style="top: 200px; position: relative">
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