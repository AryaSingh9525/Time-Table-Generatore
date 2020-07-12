<?php
if (!isset($_SESSION)) {
    session_start();
}
include 'boot.php';
include 'conn.php';

if ($_SESSION["level"] == 0) {
    include 'admin_top.php';
}
if ($_SESSION["level"] == 2) {
    include 'fact_top.php';
}

$fid = $_SESSION["user_id"]; //FACULTY ID

/* code for fetching faculty name */
$ft1 = mysqli_query($conn, "select * from faculty_details where fact_id = '$fid'");
$ft2 = mysqli_fetch_assoc($ft1);
/* till here */

?>

<html lang="en">

<head>
    <script type="text/javascript">
        //function monday() {
        //    var ch = confirm("Do you want to remove?");
        //    if (ch === true) {
        //        alert();
        //        <?php
        //        $s1 = mysqli_query($conn, "DELETE FROM sub_schedule where sub_id = '$_POST[mon_day1]' and day_id = 'M' and hour_id = '1'");
        //        echo "<script type='text/javascript'>alert(\"Class hour freed successfully!\");</script>";
        //        ?>
        //    }
        //}
    </script>

    <title>Faculty Time-Table</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        body {
            color: white;
            background-image: url(pics/black.jpg);
            background-size: 100%;
            background-attachment: fixed;
            background-repeat: no-repeat;
            overflow: hidden;
        }

        table {
            border-radius: 6%;
        }
    </style>

</head>

<body class="animsition">
<form action="remove_schedule.php" method="post">

    <div class="item-slick1 item1-slick1">
        <?php
        if ($_SESSION["level"] == 0) { ?>
        <div align=center style="top: 180px; position: relative">
            <?php
            }else
            if ($_SESSION["level"] == 2) { ?>
            <div align=center style="top: 110px; position: relative">
                <?php
                } ?>
                <b>
                    <h1 style="font-family:Matura MT Script Capitals, sans-serif; font-size:45px;">Time-Table </h1>
                </b><br/>
                <div style="font-family:acme,sans-serif; font-size:24px;">
                </div>
                <div class="container">
                    <div style=text-transform:capitalize;>
                        <!--                    <table class="table table-dark" style="font-family:candara">-->
                        <table class="table table-light table-hover" style="font-family:candara, sans-serif">
                            <thead>
                            <th></th>
                            <th>Faculty ID: <?php echo $fid ?></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th> Faculty
                                Name: <?php echo $ft2['f_name'] . " " . $ft2['m_name'] . " " . $ft2['l_name'] ?> </th>
                            <th></th>
                            </thead>
                            <thead align='center'>
                            <tr>
                                <th scope="col"> Date & Time</th>
                                <th> 09 : 00 AM- 10:00 AM</th>
                                <th> 10 : 00 AM- 11:00 AM</th>
                                <th> 11 : 00 AM- 12:00 PM</th>
                                <th> 12 : 00 PM- 01:00 PM</th>
                                <th> 02 : 00 PM- 03:00 PM</th>
                                <th> 03 : 00 PM- 04:00 PM</th>
                            </tr>
                            </thead>
                            <tbody align='center'>
                            <!--                        monday code-->
                            <tr>
                                <td>Monday</td>
                                <td>
                                    <input type="submit" name="mon_day1" class="btn btn-outline-dark" value="
                                <?php
                                    $mon1 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='1' and day_id='M'");
                                    while ($mon_q1 = mysqli_fetch_array($mon1)) {
                                        $mon_w1 = mysqli_query($conn, "select * from subjects where sub_id = '$mon_q1[sub_id]'");
                                        while ($mon_p1 = mysqli_fetch_array($mon_w1)) {
                                            if (($mon_q1['day_id'] == "M") && ($mon_q1['hour_id'] == 1)) {
                                                echo($mon_p1['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="mon_day2" class="btn btn-outline-dark" value="
                                <?php
                                    $mon2 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='2' and day_id='M'");
                                    while ($mon_q2 = mysqli_fetch_array($mon2)) {
                                        $mon_w2 = mysqli_query($conn, "select * from subjects where sub_id = '$mon_q2[sub_id]'");
                                        while ($mon_p2 = mysqli_fetch_array($mon_w2)) {
                                            if (($mon_q2['day_id'] == "M") && ($mon_q2['hour_id'] == 2)) {
                                                echo($mon_p2['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="mon_day3" class="btn btn-outline-dark" value="
                                <?php
                                    $mon3 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='3' and day_id ='M'");
                                    while ($mon_q3 = mysqli_fetch_assoc($mon3)) {
                                        $mon_w3 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$mon_q3[sub_id]'");
                                        while ($mon_p3 = mysqli_fetch_assoc($mon_w3)) {
                                            if (($mon_q3['day_id'] == "M") && ($mon_q3['hour_id'] == 3)) {
                                                echo($mon_p3['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="mon_day4" class="btn btn-outline-dark" value="
                            <?php
                                    $mon4 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='4' and day_id='M'");
                                    while ($mon_q4 = mysqli_fetch_array($mon4)) {
                                        $mon_w4 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$mon_q4[sub_id]'");
                                        while ($mon_p4 = mysqli_fetch_array($mon_w4)) {
                                            if (($mon_q4['day_id'] == "M") && ($mon_q4['hour_id'] == 4)) {
                                                echo($mon_p4['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="mon_day5" class="btn btn-outline-dark" value="
                                <?php
                                    $mon5 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='5' and day_id='M'");
                                    while ($mon_q5 = mysqli_fetch_array($mon5)) {
                                        $mon_w5 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$mon_q5[sub_id]'");
                                        while ($mon_p5 = mysqli_fetch_array($mon_w5)) {
                                            if (($mon_q5['day_id'] == "M") && ($mon_q5['hour_id'] == 5)) {
                                                echo($mon_p5['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="mon_day6" class="btn btn-outline-dark" value="
                                <?php
                                    $mon6 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='6' and day_id='M'");
                                    while ($mon_q6 = mysqli_fetch_array($mon6)) {
                                        $mon_w6 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$mon_q6[sub_id]'");
                                        while ($mon_p6 = mysqli_fetch_array($mon_w6)) {
                                            if (($mon_q6['day_id'] == "M") && ($mon_q6['hour_id'] == 6)) {
                                                echo($mon_p6['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                            </tr>
                            <!--                        TUESDAY CODE-->
                            <tr>
                                <td>Tuesday</td>
                                <td>
                                    <input type="submit" name="tue_day1" class="btn btn-outline-dark" value="
                                <?php
                                    $tue1 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='1' and day_id='T'");
                                    while ($tue_q1 = mysqli_fetch_array($tue1)) {
                                        $tue_w1 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$tue_q1[sub_id]'");
                                        while ($tue_p1 = mysqli_fetch_array($tue_w1)) {
                                            if (($tue_q1['day_id'] == "T") && ($tue_q1['hour_id'] == 1)) {
                                                echo($tue_p1['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="tue_day2" class="btn btn-outline-dark" value="
                                <?php
                                    $tue2 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='2' and day_id ='T'");
                                    while ($tue_q2 = mysqli_fetch_array($tue2)) {
                                        $tue_w2 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$tue_q2[sub_id]'");
                                        while ($tue_p2 = mysqli_fetch_array($tue_w2)) {
                                            if (($tue_q2['day_id'] == "T") && ($tue_q2['hour_id'] == 2)) {
                                                echo($tue_p2['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="tue_day3" class="btn btn-outline-dark" value="
                            <?php
                                    $tue3 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='3' and day_id='T'");
                                    while ($tue_q3 = mysqli_fetch_array($tue3)) {
                                        $tue_w3 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$tue_q3[sub_id]'");
                                        while ($tue_p3 = mysqli_fetch_array($tue_w3)) {
                                            if (($tue_q3['day_id'] == "T") && ($tue_q3['hour_id'] == 3)) {
                                                echo($tue_p3['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="tue_day4" class="btn btn-outline-dark" value="
                                <?php
                                    $tue4 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='4' and day_id='T'");
                                    while ($tue_q4 = mysqli_fetch_array($tue4)) {
                                        $tue_w4 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$tue_q4[sub_id]'");
                                        while ($tue_p4 = mysqli_fetch_array($tue_w4)) {
                                            if (($tue_q4['day_id'] == "T") && ($tue_q4['hour_id'] == 4)) {
                                                echo($tue_p4['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="tue_day5" class="btn btn-outline-dark" value="
                                <?php
                                    $tue5 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='5' and day_id='T'");
                                    while ($tue_q5 = mysqli_fetch_array($tue5)) {
                                        $tue_w5 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$tue_q5[sub_id]'");
                                        while ($tue_p5 = mysqli_fetch_array($tue_w5)) {
                                            if (($tue_q5['day_id'] == "T") && ($tue_q5['hour_id'] == 5)) {
                                                echo($tue_p5['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td><input type="submit" name="tue_day6" class="btn btn-outline-dark" value="
                            <?php
                                    $tue6 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='6' and day_id='T'");
                                    while ($tue_q6 = mysqli_fetch_array($tue6)) {
                                        $tue_w6 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$tue_q6[sub_id]'");
                                        while ($tue_p6 = mysqli_fetch_array($tue_w6)) {
                                            if (($tue_q6['day_id'] == "T") && ($tue_q6['hour_id'] == 6)) {
                                                echo($tue_p6['sub_name']);
                                            }
                                        }
                                    }
                                    ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Wednesday</td>
                                <td>
                                    <input type="submit" name="wed_day1" class="btn btn-outline-dark" value="
                                <?php
                                    $wed1 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='1' and day_id='W'");
                                    while ($wed_q1 = mysqli_fetch_array($wed1)) {
                                        $wed_w1 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$wed_q1[sub_id]'");
                                        while ($wed_p1 = mysqli_fetch_array($wed_w1)) {
                                            if (($wed_q1['day_id'] == "W") && ($wed_q1['hour_id'] == 1)) {
                                                echo($wed_p1['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="wed_day2" class="btn btn-outline-dark" value="
                                <?php
                                    $wed2 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='2' and day_id='W'");
                                    while ($wed_q2 = mysqli_fetch_array($wed2)) {
                                        $wed_w2 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$wed_q2[sub_id]'");
                                        while ($wed_p2 = mysqli_fetch_array($wed_w2)) {
                                            if (($wed_q2['day_id'] == "W") && ($wed_q2['hour_id'] == 2)) {
                                                echo($wed_p2['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="wed_day3" class="btn btn-outline-dark" value="
                                <?php
                                    $wed3 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='3' and day_id='W'");
                                    while ($wed_q3 = mysqli_fetch_array($wed3)) {
                                        $wed_w3 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$wed_q3[sub_id]'");
                                        while ($wed_p3 = mysqli_fetch_array($wed_w3)) {
                                            if (($wed_q3['day_id'] == "W") && ($wed_q3['hour_id'] == 3)) {
                                                echo($wed_p3['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="wed_day4" class="btn btn-outline-dark" value="
                                <?php
                                    $wed4 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='4' and day_id='W'");
                                    while ($wed_q4 = mysqli_fetch_array($wed4)) {
                                        $wed_w4 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$wed_q4[sub_id]'");
                                        while ($wed_p4 = mysqli_fetch_array($wed_w4)) {
                                            if (($wed_q4['day_id'] == "W") && ($wed_q4['hour_id'] == 4)) {
                                                echo($wed_p4['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="wed_day5" class="btn btn-outline-dark" value="
                                <?php
                                    $wed5 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='5' and day_id='W'");
                                    while ($wed_q5 = mysqli_fetch_array($wed5)) {
                                        $wed_w5 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$wed_q5[sub_id]'");
                                        while ($wed_p5 = mysqli_fetch_array($wed_w5)) {
                                            if (($wed_q5['day_id'] == "W") && ($wed_q5['hour_id'] == 5)) {
                                                echo($wed_p5['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="wed_day6" class="btn btn-outline-dark" value="
                                <?php
                                    $wed6 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='6' and day_id='W'");
                                    while ($wed_q6 = mysqli_fetch_array($wed6)) {
                                        $wed_w6 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$wed_q6[sub_id]'");
                                        while ($wed_p6 = mysqli_fetch_array($wed_w6)) {
                                            if (($wed_q6['day_id'] == "W") && ($wed_q6['hour_id'] == 6)) {
                                                echo($wed_p6['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                            </tr>

                            <tr>
                                <td>Thursday</td>
                                <td>
                                    <input type="submit" name="thur_day1" class="btn btn-outline-dark" value="
                                <?php
                                    $thur1 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='1' and day_id='M'");
                                    while ($thur_q1 = mysqli_fetch_array($thur1)) {
                                        $thur_w1 = mysqli_query($conn, "select * from subjects where sub_id = '$thur_q1[sub_id]'");
                                        while ($thur_p1 = mysqli_fetch_array($thur_w1)) {
                                            if (($thur_q1['day_id'] == "Th") && ($thur_q1['hour_id'] == 1)) {
                                                echo($thur_p1['sub_name']);
                                            }
                                        }
                                    }
                                    ?>">
                                </td>
                                <td>
                                    <input type="submit" name="thur_day2" class="btn btn-outline-dark" value="
                                <?php
                                    $thur2 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='1' and day_id='M'");
                                    while ($thur_q2 = mysqli_fetch_array($thur2)) {
                                        $thur_w2 = mysqli_query($conn, "select * from subjects where sub_id = '$thur_q1[sub_id]'");
                                        while ($thur_p2 = mysqli_fetch_array($thur_w2)) {
                                            if (($thur_q2['day_id'] == "Th") && ($thur_q2['hour_id'] == 2)) {
                                                echo($thur_p2['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="thur_day3" class="btn btn-outline-dark" value="
                                <?php
                                    $thur3 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='3' and day_id='Th'");
                                    while ($thur_q3 = mysqli_fetch_assoc($thur3)) {
                                        $thur_w3 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$thur_q3[sub_id]'");
                                        while ($thur_p3 = mysqli_fetch_assoc($thur_w3)) {
                                            if (($thur_q3['day_id'] == "Th") && ($thur_q3['hour_id'] == 3)) {
                                                echo($thur_p3['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="thur_day4" class="btn btn-outline-dark" value="
                                <?php
                                    $thur4 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='4' and day_id='Th'");
                                    while ($thur_q4 = mysqli_fetch_assoc($thur4)) {
                                        $thur_w4 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$thur_q4[sub_id]'");
                                        while ($thur_p4 = mysqli_fetch_assoc($thur_w4)) {
                                            if (($thur_q4['day_id'] == "Th") && ($thur_q4['hour_id'] == 4)) {
                                                echo($thur_p4['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="thur_day5" class="btn btn-outline-dark" value="
                                <?php
                                    $thur5 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='5' and day_id='Th'");
                                    while ($thur_q5 = mysqli_fetch_assoc($thur5)) {
                                        $thur_w6 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$thur_q6[sub_id]'");
                                        while ($thur_p5 = mysqli_fetch_assoc($thur_w5)) {
                                            if (($thur_q5['day_id'] == "Th") && ($thur_q5['hour_id'] == 5)) {
                                                echo($thur_p5['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="thur_day6" class="btn btn-outline-dark" value="
                                <?php
                                    $thur6 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='6' and day_id='Th'");
                                    while ($thur_q6 = mysqli_fetch_assoc($thur6)) {
                                        $thur_w5 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$thur_q5[sub_id]'");
                                        while ($thur_p6 = mysqli_fetch_assoc($thur_w6)) {
                                            if (($thur_q6['day_id'] == "Th") && ($thur_q6['hour_id'] == 6)) {
                                                echo($thur_p6['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                            </tr>
                            <tr>
                                <td>Friday</td>
                                <td>
                                    <input type="submit" name="fri_day1" class="btn btn-outline-dark" value="
                                <?php
                                    $fri1 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='1' and day_id='F'");
                                    while ($fri_q1 = mysqli_fetch_assoc($fri1)) {
                                        $fri_w1 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$fri_q1[sub_id]'");
                                        while ($fri_p1 = mysqli_fetch_assoc($fri_w1)) {
                                            if (($fri_q1['day_id'] == "F") && ($fri_q1['hour_id'] == 1)) {
                                                echo($fri_p1['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>

                                <td>
                                    <input type="submit" name="fri_day2" class="btn btn-outline-dark" value="
                                <?php
                                    $fri2 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='2' and day_id='F'");
                                    while ($fri_q2 = mysqli_fetch_assoc($fri2)) {
                                        $fri_w2 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$fri_q2[sub_id]'");
                                        while ($fri_p2 = mysqli_fetch_assoc($fri_w2)) {
                                            if (($fri_q2['day_id'] == "F") && ($fri_q2['hour_id'] == 2)) {
                                                echo($fri_p2['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="fri_day3" class="btn btn-outline-dark" value="
                                <?php
                                    $fri3 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='3' and day_id='F'");
                                    while ($fri_q3 = mysqli_fetch_assoc($fri3)) {
                                        $fri_w3 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$fri_q3[sub_id]'");
                                        while ($fri_p3 = mysqli_fetch_assoc($fri_w3)) {
                                            if (($fri_q3['day_id'] == "F") && ($fri_q3['hour_id'] == 3)) {
                                                echo($fri_p3['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="fri_day4" class="btn btn-outline-dark" value="
                                <?php
                                    $fri4 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='4' and day_id='F'");
                                    while ($fri_q4 = mysqli_fetch_assoc($fri4)) {
                                        $fri_w4 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$fri_q4[sub_id]'");
                                        while ($fri_p4 = mysqli_fetch_assoc($fri_w4)) {
                                            if (($fri_q4['day_id'] == "F") && ($fri_q4['hour_id'] == 4)) {
                                                echo($fri_p4['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="thur_day5" class="btn btn-outline-dark" value="
                                <?php
                                    $fri5 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='5' and day_id='F'");
                                    while ($fri_q5 = mysqli_fetch_assoc($fri5)) {
                                        $fri_w5 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$fri_q5[sub_id]'");
                                        while ($fri_p5 = mysqli_fetch_assoc($fri_w5)) {
                                            if (($fri_q5['day_id'] == "F") && ($fri_q5['hour_id'] == 5)) {
                                                echo($fri_p5['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="fri_day6" class="btn btn-outline-dark" value="
                                <?php
                                    $fri6 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='6' and day_id='F'");
                                    while ($fri_q6 = mysqli_fetch_assoc($fri6)) {
                                        $fri_w6 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$fri_q6[sub_id]'");
                                        while ($fri_p6 = mysqli_fetch_assoc($fri_w6)) {
                                            if (($fri_q6['day_id'] == "F") && ($fri_q6['hour_id'] == 6)) {
                                                echo($fri_p6['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                            </tr>
                            <tr>
                                <td>Saturday</td>
                                <td>
                                    <input type="submit" name="sat_day1" class="btn btn-outline-dark" placeholder="
                            <?php
                                    $sat1 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='1' and day_id='S'");
                                    while ($sat_q1 = mysqli_fetch_assoc($sat1)) {
                                        $sat_w1 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$sat_q1[sub_id]'");
                                        while ($sat_p1 = mysqli_fetch_assoc($sat_w1)) {
                                            if (($sat_q1['day_id'] == "S") && ($sat_q1['hour_id'] == 1)) {
                                                echo($sat_p1['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                " value="<?php echo $sat_q1['sub_id']; ?>">
                                </td>
                                <td>
                                    <input type="submit" name="sat_day2" class="btn btn-outline-dark" value="
                                <?php
                                    $sat2 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='2' and day_id='S'");
                                    while ($sat_q2 = mysqli_fetch_assoc($sat2)) {
                                        $sat_w2 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$sat_q2[sub_id]'");
                                        while ($sat_p2 = mysqli_fetch_assoc($sat_w2)) {
                                            if (($sat_q2['day_id'] == "S") && ($sat_q2['hour_id'] == 2)) {
                                                echo($sat_p2['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="sat_day3" class="btn btn-outline-dark" value="
                                <?php
                                    $sat3 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='3' and day_id='S'");
                                    while ($sat_q3 = mysqli_fetch_assoc($sat3)) {
                                        $sat_w3 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$sat_q3[sub_id]'");
                                        while ($sat_p3 = mysqli_fetch_assoc($sat_w3)) {
                                            if (($sat_q3['day_id'] == "S") && ($sat_q3['hour_id'] == 3)) {
                                                echo($sat_p3['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="sat_day4" class="btn btn-outline-dark" value="
                                <?php
                                    $sat4 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='4' and day_id='S'");
                                    while ($sat_q4 = mysqli_fetch_assoc($sat4)) {
                                        $sat_w4 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$sat_q4[sub_id]'");
                                        while ($sat_p4 = mysqli_fetch_assoc($sat_w4)) {
                                            if (($sat_q4['day_id'] == "S") && ($sat_q4['hour_id'] == 4)) {
                                                echo($sat_p4['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="sat_day5" class="btn btn-outline-dark" value="
                                <?php
                                    $sat5 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='5' and day_id='S'");
                                    while ($sat_q5 = mysqli_fetch_assoc($sat5)) {
                                        $sat_w5 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$sat_q5[sub_id]'");
                                        while ($sat_p5 = mysqli_fetch_assoc($sat_w5)) {
                                            if (($sat_q5['day_id'] == "S") && ($sat_q5['hour_id'] == 5)) {
                                                echo($sat_p5['sub_name']);
                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                                <td>
                                    <input type="submit" name="sat_day6" class="btn btn-outline-dark" value="
                            <?php
                                    $sat6 = mysqli_query($conn, "select DISTINCT sub_id,day_id,hour_id,fact_id from sub_schedule where fact_id = '$fid' and hour_id='6' and day_id='S'");
                                    while ($sat_q6 = mysqli_fetch_assoc($sat6)) {
                                        $sat_w6 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$sat_q6[sub_id]'");
                                        while ($sat_p6 = mysqli_fetch_assoc($sat_w6)) {
                                            if (($sat_q6['day_id'] == "S") && ($sat_q6['hour_id'] == 6)) {
                                                echo($sat_p6['sub_name']);

                                            }
                                        }
                                    }
                                    ?>
                                ">
                                </td>
                            </tr>
                        </table>
                        <!--                    --><?php
                        //                    if ($_SESSION['level'] == 0) { ?>
                        <!---->
                        <!--                        <a href=" view_fact_tt.php"><input
                                            style=font-size:16px;font-family:verdana,serif; class='btn btn-info'
                                            type="submit" value="Back">-->
                        <!--                        --><?php
                        //                        }
                        //                        if ($_SESSION['level'] == 2) { ?>
                        <!---->
                        <!--                            <a href="./fact_top.php"><input style=font-size:16px;font-family:verdana,serif; class='btn btn-info' type="submit" value="Back">-->
                        <!--                            --><?php
                        //                            }
                        //                            ?>
                        <!--                    <a href="#"><input style=font-size:20px;font-family:verdana,serif;color:white;-->
                        <!--                                       class='btn btn-outline-info'-->
                        <!--                                       type="submit" value="Print" onclick="window.print()">-->

                    </div>
                </div>
                <div style="font-size: 18px">
                    <?php
                    if (isset($_POST['mon_day1'])) {
                        echo $_POST['mon_day1'] . "<br>";
                        echo "Do you really want to remove" . $_POST["mon_day1"] . "?";
                        $_SESSION["W_DAY"] = $_POST["mon_day1"]."  ";
                        ?>
                        <br/>
                        <input type="submit" style="font-size: 18px" value="Yes" class="btn btn-outline-success"
                               name="m1yes">
                        <input type="submit" style="font-size: 18px" value="No" class="btn btn-outline-danger">
                        <?php
                        echo "s1" . $_SESSION["W_DAY"] . "s1";
                    }
                    ?>
                    <?php
                    if (isset($_POST["m1yes"])) {
                        $var = $_SESSION["W_DAY"];
                        echo "var: " . $var . "var";
                        $s1 = mysqli_query($conn, "SELECT * FROM subjects where sub_name = '$var'");
                        if (mysqli_num_rows($s1) > 0) {
                            echo "true";
                        }
                        $s2 = mysqli_fetch_array($s1);
                        $s3 = mysqli_query($conn, "DELETE FROM sub_schedule where sub_id = '$s2[sub_id]' and day_id = 'M' and hour_id = '1'");
                        if ($s3) {
                            echo "<script type='text/javascript'>alert(\"Class hour freed successfully!\");</script>";
//                            header("refresh:0;");
                            echo $_SESSION["W_DAY"];
                            echo "id: " . $s2['sub_id'];
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
</form>

<div class="end-footer bg2" style="top:-70px; position: relative">
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
<!-- <link rel="icon" type="image/png" href="images/icons/favicon.png" /> -->

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