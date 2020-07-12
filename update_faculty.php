<?php
ob_start();
include 'boot.php';
include 'conn.php';
include 'admin_top.php';
if (isset($_POST['update'])) {

    $f_id = $_SESSION["CURR_FACT_ID"];
    $f_name = $_POST['fname'];
    $m_name = $_POST['mname'];
    $l_name = $_POST['lname'];
    $pno = $_POST['pno'];
    $email = $_POST['email'];
    $experience = $_POST['exp'];
    $dept = $_POST['dept'];

    $q_dept1 = mysqli_query($conn, "SELECT dept_id from department where dept_name = '$dept'");
    $q_dept2 = mysqli_fetch_assoc($q_dept1);

    $r1 = mysqli_query($conn, "SELECT dept_id FROM department where dept_name='$dept'");
    $r2 = mysqli_fetch_array($r1);


    $sql1 = mysqli_query($conn, "UPDATE faculty_details SET f_name = '$f_name', m_name = '$m_name', l_name = '$l_name', phone_no = '$pno', email = '$email', experience = $experience WHERE fact_id = '$f_id'");
//    if ($sql1) {
//        echo "w1";
//    }
    $sql2 = mysqli_query($conn, "UPDATE faculty SET dept_id = '$r2[dept_id]' where fact_id = '$f_id' ");
    if ($sql1 && $sql2) {
        echo "<script type='text/javascript'>alert(\"Faculty details updated successfully!\");</script>";
        header("refresh:0;url=update_faculty.php");
        exit();
    }
}
?>
    <html lang="en">

    <head>
        <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
        <title>
            Faculty Update
        </title>

        <style>
            body {
                background-image: url("pics/black.jpg");
                background-color: #1e1e1e;
                background-repeat: repeat-x;
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

    <body class="animsition">
    <div style="top: 180px; position: relative">

        <div align="center">
            <b>
                <h1 style="font-family:Matura MT Script Capitals,serif; font-size:45px;">
                    Update Faculty!
                </h1>
            </b><br/> <br/>


            <form id name="update" method=post action="update_faculty.php"
                  class="wrap-form-reservation size22 m-l-r-auto">
                <span class="txt9">
                                Faculty ID:
                            </span>
                <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                    <select class="bo-rad-10 sizefull txt10 p-l-20" name="fact_id" id="fact_id"
                            style='text-transform: Uppercase;'/>
                    <option value="-1"> ---- select ----</option>
                    <?php
                    $d1 = mysqli_query($conn, "SELECT DISTINCT fact_id from faculty");
                    while ($d2 = mysqli_fetch_array($d1)) {
                        echo "<option value='" . $d2['fact_id'] . "'>" . $d2['fact_id'] . "</option>";
                    }
                    ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" name="search" value="Search">
            </form>

            <?php
            if (isset($_POST["search"])) {
            if ($_POST['fact_id'] == "-1") {
                echo    "<script type='text/javascript'>alert(\"Faculty ID is not selected!\");</script>";
                header("refresh:0;url=update_faculty.php");
                exit();
            }

            $_SESSION['CURR_FACT_ID'] = $_POST['fact_id'];
            $qu1 = mysqli_query($conn, "SELECT * from faculty_details where fact_id = '$_POST[fact_id]'");
            $qu2 = mysqli_fetch_assoc($qu1);
            ?>
            <form name="alloc" method=post action="update_faculty.php"
                  class="wrap-form-reservation size22 m-l-r-auto">
                <div class="col-md-6">
                    <span class="txt9">
                            First Name:
                        </span>
                    <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                        <input style='text-transform:uppercase' class="bo-rad-10 sizefull txt10 p-l-20"
                               type="text" value="<?php echo $qu2['f_name']; ?>"
                               id="fname" name="fname" oninput="validateAlpha1();" required>
                    </div>
                    <span class="txt9">
                            Middle Name:
                        </span>
                    <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                        <input style='text-transform:uppercase' class="bo-rad-10 sizefull txt10 p-l-20"
                               type="text" value="<?php echo $qu2['m_name']; ?>"
                               id="mname" name="mname" oninput="validateAlpha2();"/>
                    </div>
                    <span class="txt9">
                            Last Name:
                        </span>
                    <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                        <input style='text-transform:uppercase' class="bo-rad-10 sizefull txt10 p-l-20"
                               type="text" value="<?php echo $qu2['l_name']; ?>"
                               id="lname" name="lname" oninput="validateAlpha3();" required>
                    </div>
                    <span class="txt9">
                                Phone Number:
                            </span>
                    <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                        <input class="bo-rad-10 sizefull txt10 p-l-20" maxlength="10" type="text" name="pno"
                               oninput="isNumberKey()" id="pno" required
                               value="<?php echo $qu2['phone_no']; ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <span class="txt9">
                                Email ID:
                            </span>
                    <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                        <input style='text-transform:lowercase' class="bo-rad-10 sizefull txt10 p-l-20"
                               type="text" value="<?php echo $qu2['email']; ?>"
                               name="email" id="email" onblur="ValidateEmail();" required>
                    </div>
                    <span class="txt9">
                            Department:
                        </span>
                    <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                        <select class="bo-rad-10 sizefull txt10 p-l-20" name="dept" id="dept" required
                                style='text-transform: Uppercase;'/>
                        <?php
                        $qu3 = mysqli_query($conn, "SELECT * from faculty where fact_id = '$_POST[fact_id]'");
                        $qu4 = mysqli_fetch_assoc($qu3);
                        $qu5 = mysqli_query($conn, "SELECT * from department where dept_id = '$qu4[dept_id]'");
                        $qu6 = mysqli_fetch_assoc($qu5);
                        ?>
                        <option value="<?php echo $qu6['dept_name']; ?>"> <?php echo $qu6['dept_name']; ?></option>
                        <?php
                        $d1 = mysqli_query($conn, "SELECT DISTINCT dept_name from department where dept_name not in('$qu6[dept_name]')");
                        while ($d2 = mysqli_fetch_array($d1)) {
                            echo "<option value='" . $d2['dept_name'] . "'>" . $d2['dept_name'] . "</option>";
                        }
                        ?>
                        </select>
                    </div>

                    <span class="txt9">
                            Experience:
                        </span>
                    <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                        <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="exp" id="exp"
                               value="<?php echo $qu2['experience']; ?>"
                               oninput="isNumberKey()" maxlength="2" required/>
                    </div>
                    <br>
                </div>

                <input type="submit" value="Update Record" name="update" class="btn btn-success">
            </form>

        </div>
    </div>

    <?php
    }
    ?>

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


    </body>
    </html>

<?php
$conn->close();
?>

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
<?php

ob_end_flush();

?>