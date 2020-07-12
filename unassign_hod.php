<?php
session_start();
include 'boot.php';
include 'conn.php';
include 'admin_top.php';

$flag = 0;

if (isset($_POST['faculty'])) {

    if ($_POST['faculty'] == "-1") {
        echo    "<script type='text/javascript'>alert(\"HOD ID is not selected!\");</script>";
        header("refresh:0;url=update_faculty.php");
        exit();
    }

    $faculty_id = $_POST["faculty"];
    $sql = "UPDATE `faculty_details` SET `rank` = '2' WHERE `fact_id` = '$faculty_id'";
    $sql2 = mysqli_query($conn, "UPDATE login set level = '2' where username = '$faculty_id'");

    if ($conn->query($sql) === TRUE) {
        $flag = 1;
    } else {
        echo "<script>alert(\"Failed to unassign HOD!\");</script>";
    }
    $q1 = mysqli_query($conn,"SELECT * from faculty_details where fact_id = '$faculty_id'");
    $q2 = mysqli_fetch_assoc($q1);
}
?>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
    <style>
        body {
            background-image: url("pics/black.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #fff;
            background-size: 100%;
            background-color: #1e1e1e;

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

        .col-md-4 {
            width: 72.333333%;
        }
    </style>
    <title>Unassign HOD </title>
    <script>
    </script>

</head>
<body>
<div class="animsition">
    <!-- <div class="item-slick1 item1-slick1" style="background-image: url(pics/black.jpg);"> -->
    <div align=center style="position: relative; top: 200px">
        <b>
            <h1 style="font-family:Matura MT Script Capitals,sans-serif; font-size:45px;">
                Unassign HOD!
            </h1>
        </b><br/> <br/><br/>
        <div>
            <form id="form2" name="form2" method="post" action="unassign_hod.php">
                <table>
                    <tr>
                        <td>
                            <!--                            <div class="row">-->
                            <div class="col-md-4">
                                <span class="txt9999">
                                    HOD ID:
                                </span>
                            </div>
                            <!--                            </div>-->
                        </td>
                        <td>
                            <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                                <select class="bo-rad-10 sizefull txt10 p-l-20" name="faculty" id="faculty" required
                                        style='text-transform: Uppercase;'/>
                                <option value="-1"> ---- select ----</option>
                                <?php
                                $sql = "SELECT fact_id, f_name FROM faculty_details where rank = '1'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        unset($id, $name);
                                        $id = $row['fact_id'];
                                        $name = $row['f_name'];
                                        echo '<option value="' . $id . '">' . $id . '</option>';
                                    }
                                }
                                ?>
                                <!--                                </select>-->
                            </div>
                        </td>
                    </tr>
                </table>
                <br/><input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success"/>

            </form>
        </div>
        <br/>
        <?php

        if ($flag == 1) {
            ?>
            <div>
                <h1 style="font-size:18px" class="btn btn-info"> Faculty <strong
                            style="text-transform: capitalize;"><?php echo $q2['f_name'] . " " . $q2['m_name'] . " " . $q2['l_name']; ?></strong>
                    is unassigned as HOD
                    successfully!
                    :)
                </h1>
            </div>
            <?php
            header("refresh:3;url=unassign_hod.php");
        }
        ?>
    </div>
</div>
<div class="end-footer bg2" style="position: relative; top: 540px;">
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