<?php
session_start();
include "admin_top.php";
include 'conn.php';

$flag = 0;

if (isset($_POST['submit'])) {
    $day = $_POST['day'];
    $hours = $_POST['hours'];
    $sub_name = $_POST['sub_id'];
    if ($sub_name == "-1" || $sub_name == "------ Select ------") {
        echo "<script type='text/javascript'>alert(\"Subject is not Selected!\");</script>";
        header("refresh:0;url=sub_schedule.php");
        die();
    }

    if ($day == "-1" || $day == "------ Select ------") {
        echo "<script type='text/javascript'>alert(\"Day is not Selected!\");</script>";
        header("refresh:0;url=sub_schedule.php");
        die();
    }

    if ($hours == "-1" || $hours == "------ Select ------") {
        echo "<script type='text/javascript'>alert(\"Hours is not Selected!\");</script>";
        header("refresh:0;url=sub_schedule.php");
        die();
    }

    $q1 = mysqli_query($conn, "Select * from subjects WHERE sub_name = '$sub_name'");
    $sub_id = mysqli_fetch_assoc($q1);

    $q2 = mysqli_query($conn, "SELECT * FROM week_days WHERE day_id = '$day'");
    $day_id = mysqli_fetch_assoc($q2);

    $q3 = mysqli_query($conn, "Select hour_id from class_hours where hour = '$hours' ");
    $hour_id = mysqli_fetch_assoc($q3);

    $q4 = mysqli_query($conn, "select fact_id, sub_id from assign where sub_id = '$sub_id[sub_id]'"); // and day_id= '0' and hrs = 0");
    $fact_id = mysqli_fetch_assoc($q4);

    //validation for faculty availability
    $vl1 = mysqli_query($conn, "Select * from sub_schedule where fact_id = '$fact_id[fact_id]' and day_id = '$day' and hour_id = '$hours'");
    if (mysqli_num_rows($vl1) > 0) {
        echo "<script type='text/javascript'>alert(\"Failed to allocate. Faculty is not free!\");</script>";
        header("refresh:0;url=sub_schedule.php");
        die();
    }
    //-----------------------------------



    if ($q1 && $q2 && $q3) {
        $in1 = mysqli_query($conn, "INSERT INTO sub_schedule (sub_id, day_id, hour_id, sem_id, fact_id) VALUES ('$sub_id[sub_id]', '$day_id[day_id]','$hour_id[hour_id]', '$sub_id[sem_id]', '$fact_id[fact_id]')");
//        $in2 = mysqli_query($conn, "UPDATE assign SET day_id='$day',hrs='$hours' where fact_id = '$fact_id[fact_id]' and sub_id='$fact_id[sub_id]'");
        if ($in1) {
            echo "fact :" . $fact_id['fact_id'];
            $flag = 1;
        }
    }
}
?>

    <html lang="en">

    <head>
        <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">-->
        <!--        </script>-->
        <!--    <script src="jquery.lwMultiSelect.js">-->
        <!--    </script>-->

        <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
        <title>
            Subject Schedule
        </title>

        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <style>
            body {
                background-image: url("pics/black.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                color: white;
                background-size: 100%;
                background-color: #000;
                font-family: verdana, serif;
            }

            .txt9999 {
                color: white;
                font-size: 18px;
            }

            .bo-rad-10 {
                border-radius: 10px;
            }

            .txt10 {
                font-family: verdana, serif;
                font-weight: 400;
                font-size: 14px;
                color: #666666;
                text-transform: capitalize;
            }

            .sizefull {
                width: 100%;
                height: 90%;
            }
        </style>
        <script>
            //FOR FACULTY SUBJECTS
            $(document).ready(function () {
                $("#sem").change(function () {
                    var sid = $("#sem").val();
                    console.log("sem: " + sid);
                    $.ajax({
                        url: 'data.php',
                        method: 'post',
                        data: {
                            "semester_id": sid
                        },
                        success: (function (subjects) {
                            $('#subjects').empty();
                            $('#subjects').append("<option >------ Select ------</option>")
                            console.log(subjects);
                            subjects = JSON.parse(subjects);
                            subjects.forEach(function (subject) {
                                $('#subjects').append('<option>' + subject.sub_name + '</option>')
                            })
                        })
                    })
                })
            });

            //FOR CLASS HOURS AVAILABLE
            $(document).ready(function () {
                $("#day").change(function () {
                    var did = $("#day").val();
                    var sem_no = $("#sem").val();
                    console.log("day: " + did);
                    $.ajax({
                        url: 'data2.php',
                        method: 'post',
                        data: {
                            "day": did, // day is the id of html element
                            "sem": sem_no
                        },
                        success: (function (subjects) {
                            $('#hours').empty();
                            $('#hours').append("<option >------ Select ------</option>")
                            subjects = JSON.parse(subjects);
                            console.log(subjects);

                            subjects.forEach(function (subject) {
                                $('#hours').append('<option>' + subject.hour_id + '</option>')
                            })
                        })
                    })
                })
            })
        </script>
        <?php
        //            function check_sem()
        //            {
        //                $_SESSION['SEMESTER_NO'] = $_POST['sem'];
        //                echo "<script type='text/javascript'>alert(\"$_POST[sem]\");</script>";
        //                echo "<script type='text/javascript'>alert(\"Hours is not Selected! $_POST[sem]\");</script>";
        //            }
        //            ?>
    </head>

    <body class="animsition">
    <div align=center style="position: relative; top: 190px">
        <b>
            <h1 style="font-family:Matura MT Script Capitals, serif; font-size:45px;">
                Allocate Time<!doctype html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport"
                          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <title>Document</title>
                </head>
                <body>

                </body>
                </html>
            </h1>
        </b>
        <br/><br/>
        <form id name="alloc" method=post action=sub_schedule.php class="wrap-form-reservation size22 m-l-r-auto">
            <table>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="txt9999">
                                    Semester:
                                </span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                            <select name="sem" class="bo-rad-10 sizefull txt10 p-l-20" id="sem">
                                <option value="-1">------ Select ------</option>
                                <?php
                                require 'data.php';
                                $authors = loadAuthors();
                                foreach ($authors as $author) {
                                    echo "<option value=" . $author['sem_id'] . ">" . $author['sem_no'] . "</option>";
                                    $arr = array($author['sem_id']);
                                }
                                ?>
                            </select>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="txt9999">
                                    Subject Name:
                                </span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                            <select name="sub_id" class="bo-rad-10 sizefull txt10 p-l-20" id="subjects">
                                <option value="-1">------ Select ------</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <!--            </table>-->
                <!--            <input type="submit" name="check" id="check" class="btn bg-white">-->
                <!--            <br/>-->
                <!--        </form>-->
                <!---->
                <!--                <form id name="alloc" method=post action=sub_schedule.php class="wrap-form-reservation size22 m-l-r-auto">-->
                <!--                <table>-->
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="txt9999">
                                    Day:
                                </span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                            <select name="day" id="day" class="bo-rad-10 sizefull txt10 p-l-20">
                                <option value="-1">------ Select ------</option>
                                <option value="M">MONDAY</option>
                                <option value="T">TUESDAY</option>
                                <option value="W">WEDNESDAY</option>
                                <option value="Th">THURSDAY</option>
                                <option value="F">FRIDAY</option>
                                <option value="S">SATURDAY</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="txt9999">
                                    Class Hour:
                                </span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                            <select name="hours" id="hours" class="bo-rad-10 sizefull txt10 p-l-20">
                                <option value="-1">------ Select ------</option>
                                <!--                                <option value="1">09 - 10</option>-->
                                <!--                                <option value="2">10 - 11</option>-->
                                <!--                                <option value="3">11 - 12</option>-->
                                <!--                                <option value="4">12 - 01</option>-->
                                <!--                                <option value="5">02 - 03</option>-->
                                <!--                                <option value="6">03 - 04</option>-->
                            </select>
                        </div>
                    </td>
                </tr>
<!--                <tr>-->
<!--                    <td>-->
<!--                        <div class="row">-->
<!--                            <div class="col-md-4">-->
<!--                                <span class="txt9999">-->
<!--                                    Hours required:-->
<!--                                </span>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </td>-->
<!--                    <td>-->
<!--                        <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">-->
<!--                            <input type="radio" name="tot_hrs" value="1">1 Hour<br>-->
<!--                            <input type="radio" name="tot_hrs" value="2">2 Hours-->
<!--                        </div>-->
<!--                    </td>-->
<!---->
<!--                </tr>-->
            </table>
            <br/>
            <input type="submit" name=submit class='btn btn-success'>
            <input type="reset" name=submit class='btn btn-danger'>
        </form>
        <br/>
        <?php
        if ($flag == 1) {
            ?>
            <div>
                <h1 style="font-size:18px" class="btn btn-info">
                    <strong style="text-transform: capitalize;">
                        <?php echo $sub_name; ?>
                    </strong> is allocated successfully! :)
                </h1>
            </div>
            <!--            --><?php
//            header("refresh:3;url=sub_schedule.php");
//        }
        }
        //        ?>
        <br/>

    </html>

    <div class="end-footer bg2" style="position: relative; top: 120px">
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
    <!--    <script type="text/javascript" src="vendor/Select2/Select2.min.js"></script>-->
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