<?php
if (!isset($_SESSION)) {
    session_start();
}
include 'boot.php';
include 'conn.php';
include 'admin_top.php';

$lr1 = mysqli_query($conn, "SELECT * FROM faculty ORDER BY fact_id DESC LIMIT 1");
$lr2 = mysqli_fetch_assoc($lr1);

//USING REGEX TO AUTO INCREMENT USERNAME
$my_text = $lr2['fact_id'];
$my_array = preg_split("/_/", $my_text);
//print_r($my_array);
$new_id = $my_array[1] + 01;

$flag = 0;

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $pno = $_POST['pno'];
    $email = $_POST['email'];
    $exp = $_POST['exp'];
    $uname = $_POST['uname'];
    $pass = md5($_POST['pass']);
    $conf_pass = md5($_POST['conf_pass']);
    $dept = $_POST['dept'];

    $as1 = mysqli_query($conn, "SELECT * from admin_details where email = '$email'");
    $as2 = mysqli_query($conn, "SELECT * from faculty_details where email = '$email'");
    if (mysqli_num_rows($as1) > 0 || mysqli_num_rows($as2) > 0) {
        echo "<script type='text/javascript'>alert(\"Email already in use. Please try again!\");</script>";
        header("refresh:0;url=add_faculty.php");
        exit();
    }

    if ($pass != $conf_pass) {
        echo "<script type='text/javascript'>alert(\"Passwords do not match. Please try again!\");</script>";
        header("refresh:0;url=add_faculty.php");
        exit();
    }

    $r1 = mysqli_query($conn, "SELECT fact_id FROM faculty where fact_id ='$uname' ");
    $r2 = mysqli_fetch_array($r1);

    if ($uname == $r2['fact_id']) {
        echo "<script type='text/javascript'>alert(\"Username already in use. Please enter different ID!\");</script>";
        header("refresh:0;url=add_faculty.php");
        exit();
    }

    if ($dept == "-1") {
        echo "<script type='text/javascript'>alert(\"Department is not selected!\");</script>";
        header("refresh:0;url=add_faculty.php");
        exit();
    }

    $dept2 = mysqli_query($conn, "SELECT dept_id from department where  dept_name = '$dept'");
    if (!$dept2) {
        echo "no";
        exit();
    }
    $deptid = mysqli_fetch_assoc($dept2);

    //FOR INSERT INTO FACULTY TABLE
    $sql = mysqli_query($conn, "INSERT INTO faculty_details (fact_id, f_name, m_name, l_name, phone_no, email, experience, rank) 
    VALUES ('$uname', '$fname','$mname','$lname','$pno','$email','$exp',2)");

    if ($sql) {
        //FOR FACULTY DEPARTMENT
        $sql2 = mysqli_query($conn, "INSERT INTO faculty (fact_id, dept_id) VALUES ('$uname', '$deptid[dept_id]')");

        if ($sql2) {
            //FOR INSERT INTO LOGIN TABLE
            $sql3 = mysqli_query($conn, "INSERT INTO login (username, password, level) VALUES ('$uname','$pass','2')");
            if ($sql3) {
//                echo "work";
                $flag = 1;
            }
        }
    }
}

?>

<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
    <title> Faculty Details </title>
    <style>
        body {
            background-image: url("pics/black.jpg");
            background-color: #1e1e1e;
            background-repeat: repeat-x;
            background-attachment: fixed;
            color: white;
            background-size: 100%;
            font-family: verdana, sans-serif;
            /*background-color: #2b4162;*/
            /*background-image: linear-gradient(315deg, #2b4162 0%, #12100e 74%);*/
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

    </style>

    <script>
        function validateAlpha1() {
            var textInput = document.getElementById("fname").value;
            textInput = textInput.replace(/[^A-Za-z]/g, "");
            document.getElementById("fname").value = textInput;
        }

        function validateAlpha2() {
            var textInput = document.getElementById("mname").value;
            textInput = textInput.replace(/[^A-Za-z]/g, "");
            document.getElementById("mname").value = textInput;
        }

        function validateAlpha3() {
            var textInput = document.getElementById("lname").value;
            textInput = textInput.replace(/[^A-Za-z]/g, "");
            document.getElementById("lname").value = textInput;
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

        function ValidateEmail() {
            var email = document.getElementById("email").value;
            // var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            var expr = /^([\w-.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(]?)$/;
            if (!expr.test(email)) {
                alert("Invalid email address.");
                document.getElementById("email").value = "";
            }
        }
    </script>

</head>
<body>
<div class="animsition" style="top: 180px; position: relative">

    <div align="center">
        <b>
            <h1 style="font-family:Matura MT Script Capitals,sans-serif; font-size:45px;">
                Add Faculty!
            </h1>
        </b>
        <br/><br/>
        <?php
        if ($flag == 1) {
            ?>
            <div>
                <h1 style="font-size:18px" class="btn btn-info"> Faculty <strong
                            style="text-transform: capitalize;"><?php echo $fname ?></strong> is added successfully! :)
                </h1>
            </div>
            <?php
            header("refresh:3;url=add_faculty.php");
        }
        ?>
        <br/>

        <form id name="add_fact" method=post action=add_faculty.php class="wrap-form-reservation size22 m-l-r-auto">

            <div class="col-md-6">
                <span class="txt9">
                            First Name:
                        </span>
                <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                    <input style='text-transform:uppercase' class="bo-rad-10 sizefull txt10 p-l-20" type="text"
                           id="fname" name="fname" oninput="validateAlpha1();" required>
                </div>
                <span class="txt9">
                            Middle Name:
                        </span>
                <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                    <input style='text-transform:uppercase' class="bo-rad-10 sizefull txt10 p-l-20" type="text"
                           id="mname" name="mname" oninput="validateAlpha2();"/>
                </div>

                <span class="txt9">
                            Last Name:
                        </span>
                <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                    <input style='text-transform:uppercase' class="bo-rad-10 sizefull txt10 p-l-20" type="text"
                           id="lname" name="lname" oninput="validateAlpha3();" required>
                </div>

                <span class="txt9">
                                Phone Number:
                            </span>
                <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                    <input class="bo-rad-10 sizefull txt10 p-l-20" maxlength="10" type="text" name="pno"
                           oninput="isNumberKey()" id="pno" required>
                </div>

                <span class="txt9">
                                Email ID:
                            </span>
                <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                    <input style='text-transform:lowercase' class="bo-rad-10 sizefull txt10 p-l-20" type="text"
                           name="email" id="email" onblur="ValidateEmail();" required>
                </div>

            </div>


            <div class="col-md-6">
                <span class="txt9">
                            Department:
                        </span>
                <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                    <select class="bo-rad-10 sizefull txt10 p-l-20" name="dept" id="dept" required
                            style='text-transform: Uppercase;'/>
                    <option value="-1"> ---- select ----</option>
                    <?php
                    $d1 = mysqli_query($conn, "SELECT DISTINCT dept_name from department");
                    while ($d2 = mysqli_fetch_array($d1)) {
                        echo "<option value='" . $d2['dept_name'] . "'>" . $d2['dept_name'] . "</option>";
                    }
                    ?>
                    </select>
                </div>
                <span class="txt9">
                            Username:
                        </span>
                <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                    <input class="bo-rad-10 sizefull txt10 p-l-20" maxlength="10" type="text" name="uname"
                           id="uname" value="<?php echo $my_array[0] . "_" . $new_id; ?>" required
                           readonly="readonly">
                </div>
                <span class="txt9">
                            Password:
                        </span>
                <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="pass" id="pass"
                           required>
                </div>
                <span class="txt9">
                            Confirm Password:
                        </span>
                <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="conf_pass"
                           id="conf_pass" required>
                </div>
                <span class="txt9">
                            Experience:
                        </span>
                <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="exp" id="exp"
                           oninput="isNumberKey()" maxlength="2" required/>
                </div>
                <br>
            </div>
            <input type="submit" name=submit class="btn btn-success" id="btnValidate">
            <input type="reset" name=reset value=Reset class="btn btn-danger">

        </form>
    </div>
    <div class="end-footer bg2" style="top: 100px; position: relative">
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