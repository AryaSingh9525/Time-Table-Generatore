<?php

include 'boot.php';
include 'conn.php';
include 'admin_top.php';

?>

<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
    <title>Search</title>
    <style>
        input[type=text], select {
            width: 20%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 7%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 2px;
            cursor: pointer;
        }


        body {
            background-image: url("pics/black.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: white;
            background-size: 100%;
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

        .table.bgwhite {
            background: #fff;
            width: 500px;
        }

        .dropbtn a {
            color: #fff;
        }
    </style>


</head>
<body class="animsition">

<div class="item-slick1 item1-slick1">
    <div align=center style="position: relative; top: 200px;">
        <b>
            <h1 style="font-family: Matura MT Script Capitals, sans-serif; font-size:45px;color: white;
">
                View Holidays!
            </h1>
        </b><br/><br/>
        <div align="center">
            <form id="form2" name="form2" method="post" action="" class="wrap-form-reservation size22 m-l-r-auto">
                <table>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="txt9">
                                       Date:
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <select id="date" name="date" class="bo-rad-10 sizefull txt10 p-l-20">
                                    <?php
                                    include 'boot.php';
                                    include 'conn.php';

                                    $sql = "SELECT date, description FROM holidays";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            unset($id, $name);
                                            $id = $row['date'];
                                            $name = $row['description'];
                                            echo '<option value="' . $id . '">' . $id . '</option>';
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    mysqli_close($conn);
                                    ?>
                                </select>
                            </div>
                        </td>
                    </tr>
                </table>
                <input type="submit" name="submit" id="submit" value="Search" class="btn btn-success"/>
            </form>
        </div>
    </div>
            <?php

            include 'boot.php';
            include 'conn.php';


            if (isset($_POST['date'])) {
                $date = $_POST["date"];
                //$sql = ( "SELECT fact_id FROM faculty_details where fact_id ='$faculty_id'");
                $result = mysqli_query($conn, "SELECT * FROM holidays WHERE date ='$date'");
                while ($col = mysqli_fetch_array($result)) {
                    echo "<table class='table bgwhite'>";
                    echo "<tr><th>Date</th><td>" . $col["date"] . "</td></tr>
    <tr><th>Description</th><td>" . $col["description"] . "</td></tr>
    </tr>";

                    echo "</table>";
                }
            }
            mysqli_close($conn);
            ?>

            <div class="end-footer bg2" style="position: relative; top:560px;">
                <div class="container">
                    <div class="flex-sb-m flex-w p-t-22 p-b-22">
                        <div class="p-t-5 p-b-5">
                            <a href="#" class="fs-15 c-white"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
                            <a href="#" class="fs-15 c-white"><i class="fa fa-facebook m-l-18"
                                                                 aria-hidden="true"></i></a>
                            <a href="#" class="fs-15 c-white"><i class="fa fa-twitter m-l-18"
                                                                 aria-hidden="true"></i></a>
                        </div>

                        <div class="txt17 p-r-20 p-t-5 p-b-5">
                            Copyright &copy; 2018 All rights reserved
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