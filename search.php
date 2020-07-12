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
        body {
            background-image: url("pics/black.jpg");
            background-color: #1e1e1e;
            background-repeat: repeat-x;
            background-attachment: fixed;
            color: whitesmoke;
            background-size: 100%;
            font-family: verdana, sans-serif;
        }

        .table {
            width: 52%;
            max-width: 100%;
            margin-bottom: 20px;
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

        /*.row {*/
        /*    margin-right: -15px;*/
        /*    margin-left: 70px;*/
        /*}*/

        /*.col-md-4 {*/
        /*    width: 72.333333%;*/
        /*}*/
    </style>

</head>
<body>
<div class="animsition">
    <!-- <div class="item-slick1 item1-slick1" style="background-image: url(pics/black.jpg);"> -->
    <!--    <br><br><br><br><br><br><br> <br>-->

    <div align="center">
        <b>
        </b>


        <div>
            <form id="form2" name="form2" method="post" action="" style="position: relative; top: 200px">
                <label for="faculty"><span class="txt9">
                            Faculty ID:
                        </span></label>
                <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                    <select id="faculty" name="faculty" class="bo-rad-10 sizefull txt10 p-l-20">
                        <?php

                        //                    include 'boot.php';
                        include 'conn.php';

                        $sql = "SELECT fact_id, f_name FROM faculty_details";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                unset($id, $name);
                                $id = $row['fact_id'];
                                $name = $row['f_name'];
                                echo '<option value="' . $id . '">' . $id . '</option>';
                            }
                        } else {
                            echo "0 results";
                        }
                        mysqli_close($conn);
                        ?>
                    </select>
                </div>
                <input type="submit" name="submit" id="submit" value="Search" class="btn btn-success"/>
            </form>

            <?php
            include 'conn.php';

            if (isset($_POST['faculty'])) {
            $faculty_id = $_POST["faculty"];
            //$sql = ( "SELECT fact_id FROM faculty_details where fact_id ='$faculty_id'");
            $result = mysqli_query($conn, "SELECT * FROM faculty_details WHERE fact_id ='$faculty_id'");
            while ($col = mysqli_fetch_array($result)) {
            ?>
            <table class="table"
                   style="font-family:candara, sans-serif; position: relative;top: 230px;">
                <?php
                echo "<tr><th>Faculty ID</th><td>" . $col["fact_id"] . "</td></tr>
    <tr><th>First Name</th><td>" . $col["f_name"] . "</td></tr>
    <tr><th>Last name</th><td>" . $col["l_name"] . "</td></tr>
    <tr><th>Phone No</th><td>" . $col["phone_no"] . "</td></tr>
    
    <tr><th>Experience</th><td>" . $col["experience"] . "</td></tr>
    <tr><th>Rank</th><td>" . $col["rank"] . "</td>
    </tr>";

                echo "</table>";
                }
                }


                mysqli_close($conn);
                ?>


                <!--            <div class="end-footer bg2">-->
                <!--                <div class="container">-->
                <!--                    <div class="flex-sb-m flex-w p-t-22 p-b-22">-->
                <!--                        <div class="p-t-5 p-b-5">-->
                <!--                            <a href="#" class="fs-15 c-white"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>-->
                <!--                            <a href="#" class="fs-15 c-white"><i class="fa fa-facebook m-l-18"-->
                <!--                                                                 aria-hidden="true"></i></a>-->
                <!--                            <a href="#" class="fs-15 c-white"><i class="fa fa-twitter m-l-18"-->
                <!--                                                                 aria-hidden="true"></i></a>-->
                <!--                        </div>-->
                <!---->
                <!--                        <div class="txt17 p-r-20 p-t-5 p-b-5">-->
                <!--                            Copyright &copy; 2018 All rights reserved-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
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
<!--<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>-->
<!--<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>-->
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