<?php
ob_start();
include 'boot.php';
include 'conn.php';
include 'admin_top.php';
$flag = 0;

if (isset($_POST['submit'])) {
    $f_id = $_POST['fact_id'];
    $sub_name = $_POST['sub_name'];
    $sub_id = 0;
    if ($f_id == "-1") {
        echo "<script type='text/javascript'>alert(\"Faculty ID is not selected!\");</script>";
        header("refresh:0;url=unassign_sub.php");
        die();
    }

    if ($sub_name == "-1") {
        echo "<script type='text/javascript'>alert(\"Subject name is not selected!\");</script>";
        header("refresh:0;url=unassign_sub.php");
        exit();
    }

    $r1 = mysqli_query($conn, "SELECT sub_id FROM subjects where sub_name='$sub_name' ");
    $r2 = mysqli_fetch_assoc($r1);
    $q1 = mysqli_query($conn, "DELETE FROM assign where sub_id = '$r2[sub_id]'");
    $q2 = mysqli_query($conn, "DELETE from sub_schedule where fact_id = '$f_id'and sub_id = '$r2[sub_id]'");
    if ($q1&& $q2) {
        $flag = 1;
    }
}
?>
    <html lang="en">

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">
        </script>
        <!--        <script src="jquery.lwMultiSelect.js"></script>
        -->
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
            }

            .sizefull {
                width: 100%;
                height: 90%;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!--        <div style="text-transform: uppercase">-->
        <script>

            $(document).ready(function () {
                $("#fact_id").change(function () {
                    var sid = $("#fact_id").val();
                    console.log("fact_id:" + sid);
                    $.ajax({
                        url: 'data.php',
                        method: 'post',
                        data: {
                            "fact_id": sid
                        },
                        success: (function (result) {
                            $('#fact_name').val("");
                            $('#sub_name').empty();
                            $('#sub_name').append("<option >------ Select ------</option>")
                            // $('#sub_name').text("------ select ------");
                            // ------ select ------
                            // <option value="-1"> </option>

                            //console.log(result)
                            // $('#fact_id').empty();
                            result = JSON.parse(result);
                            //sub = JSON.parse(result.snames);
                            // console.log(result[0]);

                            $("#fact_name").val(result[0].f_name + " " + result[0].m_name + result[0].l_name);
                            // console.log(result.fnames[0].f_name);
                            var n = 0;
                            result.forEach(function (subject) {
                                if (n != 0)
                                    $('#sub_name').append("<option style='text-transform: uppercase'>" + subject.sub_name + "</option>")
                                n++;
                            })
                        })
                    })
                })
            })

        </script>
    </head>

    <body class="animsition">
    <div align=center style="top: 220px; position: relative">
        <b>
            <h1 style="font-family:Matura MT Script Capitals, serif; font-size:45px;">
                Un-Assign Subjects!
            </h1>
        </b><br/> <br/>

        <form id name="alloc" method=post action=unassign_sub.php class="wrap-form-reservation size22 m-l-r-auto">
            <table>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="txt9999">
                                    Factulty ID:
                                </span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                            <select name="fact_id" class="bo-rad-10 sizefull txt10 p-l-20" id="fact_id"
                                    style='text-transform: uppercase'>
                                <option value="-1"> ------ select ------</option>
                                <?php
                                $l1 = mysqli_query($conn, "SELECT distinct fact_id from assign");
                                $l2 = mysqli_num_rows($l1);
                                while ($l3 = mysqli_fetch_array($l1)) {
                                    echo "<option style='text-transform: uppercase' value='" . $l3['fact_id'] . "'>" . $l3['fact_id'] . "</option>";
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
                                    Subject Name:
                                </span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                            <select name="sub_name" style='text-transform: uppercase'
                                    class="bo-rad-10 sizefull txt10 p-l-20" id="sub_name">
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
        <br/>
        <?php
        if ($flag == 1) {
            ?>
            <div>
                <h1 style="font-size:18px" class="btn btn-info"><strong
                            style="text-transform: capitalize;"><?php echo $sub_name ?></strong> is unassigned
                    successfully! :)</h1>
            </div>
            <?php
            header("refresh:3;url=unassign_sub.php");
        }
        ?>
        <br/>
    </div>


    <div class="end-footer bg2" style="position: relative; top: 380px; ">
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