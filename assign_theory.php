<?php
ob_start();
include 'boot.php';
include 'conn.php';
include 'admin_top.php';
$flag = 0;
if (isset($_POST['submit'])) {

    $f_id = $_POST['fact_id2'];
    $sub_id = $_POST['sub_id'];
    $sem = $_POST['sem'];

    if ($f_id == "-1") {
        echo "<script type='text/javascript'>alert(\"Faculty ID is not selected!\");</script>";
        header("refresh:0;url=assign_theory.php");
        die();
    }

    if ($sub_id == "------ Select ------" || $sub_id == "-1") {
        echo "<script type='text/javascript'>alert(\"Subject is not selected!\");</script>";
        header("refresh:0;url=assign_theory.php");
        die();
    }

    $r1 = mysqli_query($conn, "SELECT sub_id FROM subjects where sub_name = '$sub_id' ");
    $r2 = mysqli_fetch_assoc($r1);

    $r3 = mysqli_query($conn, "SELECT f_name FROM subjects where sub_name = '$sub_id' ");
    $r4 = mysqli_fetch_assoc($r1);

    $q1 = mysqli_query($conn, "Insert into assign (fact_id, sub_id, day_id, hrs) VALUES ('$f_id', '$r2[sub_id]', '0', '0')");
    if ($q1) {
        echo "<span 'style=text-transform: capitalize'><script type='text/javascript'>alert(\"$sub_id is assigned successfully ! :)\");</script>";
        header("refresh:0;url=assign_theory.php");
    }
}
?>
    <html lang="en">

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">
        </script>
        <script src="jquery.lwMultiSelect.js">
        </script>

        <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
        <title>
            Subject allocation
        </title>

        <!-- <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css"> -->
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            //FOR FACULTY SUBJECTS
            $(document).ready(function () {
                $("#sem").change(function () {
                    var sid = $("#sem").val();
                    console.log("sem:" + sid);
                    $.ajax({
                        url: 'data.php',
                        method: 'post',
                        data: {
                            "sem_id": sid
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

            //FOR FACULTY NAME
            $(document).ready(function () {
                $("#fact_id2").change(function () {
                    var sid = $("#fact_id2").val();
                    //console.log("fact_id2:" + sid);
                    $.ajax({
                        url: 'data.php',
                        method: 'post',
                        data: {
                            "fact_id2": sid
                        },
                        success: (function (result) {
                            console.log(result);
                            result = JSON.parse(result);
                            $("#fact_name").val(result[0].f_name + " " + result[0].m_name + " " + result[0].l_name);

                        })
                    })
                })
            })

        </script>

    </head>

    <body class="animsition">
    <!--     </div> -->

    <div align=center style="position: relative; top: 200px">
        <b>
            <h1 style="font-family:Matura MT Script Capitals, serif; font-size:45px;">
                Assign Subjects!
            </h1>
        </b><br/> <br/>

        <form id name="alloc" method=post action=assign_theory.php class="wrap-form-reservation size22 m-l-r-auto">
            <table>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="txt9999">
                                    Faculty ID:
                                </span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                            <select id="fact_id2" name="fact_id2" class="bo-rad-10 sizefull txt10 p-l-20">
                                <option value="-1"> ------ select ------</option>
                                <?php
                                //                                $l1 = mysqli_query($conn, "select fact_id from faculty where fact_id not in(SELECT fact_id from assign fact_id having count(sub_id) >= 4)");
                                //                                $t1 = mysqli_query($conn, "SELECT COUNT(fact_id), fact_id from assign where fact_id = 'fact_01'");
                                //                                $t2 = mysqli_fetch_assoc($t1);
                                $l1 = mysqli_query($conn, "select fact_id from faculty where fact_id not in(SELECT f.fact_id FROM assign a INNER JOIN faculty f on a.fact_id = f.fact_id GROUP BY f.fact_id HAVING COUNT(*) >= 4)");
                                $l2 = mysqli_num_rows($l1);
                                while ($l3 = mysqli_fetch_array($l1)) {
                                    echo "<option value='" . $l3['fact_id'] . "'>" . $l3['fact_id'] . "</option>";
                                } ?>
                            </select>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="txt9999">
                                    Faculty Name:
                                </span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                            <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" id="fact_name"
                                   style='text-transform: uppercase' readonly="readonly"/>
                        </div>
                    </td>
                </tr>

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
                                <option value="-1">------ select ------</option>
                                <?php
                                require 'data.php';
                                $authors = loadAuthors();
                                foreach ($authors as $author) {
                                    /*echo "<option id='".$author['sem_id']."' value='".$author['sem_id']."'>".$author['sem_no']."</option>";*/
                                    echo "<option value=" . $author['sem_id'] . ">" . $author['sem_no'] . "</option>";
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
                                <option value="-1">------ select ------</option>
                            </select>

                        </div>
                    </td>
                </tr>
            </table>
            <br/>
            <input type="submit" name=submit class='btn btn-success'>
            <input type="reset" name=reset class='btn btn-danger'>

        </form>
    </div>

    <div class="end-footer bg2" style="position: relative; top: 340px">
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