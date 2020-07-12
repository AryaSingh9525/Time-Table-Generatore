<?php
if (!isset($_SESSION)) {
    session_start();
}
include 'boot.php';
include 'conn.php';

if ($_SESSION['level'] == 0) {
    include 'admin_top.php';
} else {
    include 'stud_top.php';
}

if ($_SESSION["STUDENT"] == 1) {
//    echo $_SESSION["STUDENT"] . " ID: " . $_SESSION["user_id"];
    $reg_no = $_SESSION["user_id"];
    $_SESSION['CLASS_TT'] = $_SESSION["user_id"];;
}

if ($_SESSION['level'] == 0) {
    $reg_no = $_SESSION["CLASS_TT"];
}

//$reg_no = $_SESSION["user_id"];

//GET STUDENT INFO
$sd1 = mysqli_query($conn, "SELECT * from student_details where reg_no = '$reg_no'");
$sd2 = mysqli_fetch_array($sd1);

//GET COURSE INFO
$cd1 = mysqli_query($conn, "SELECT * from subjects where cour_id = '$sd2[cour_id]' and sem_id = '$sd2[sem_id]'");
$cd2 = mysqli_fetch_assoc($cd1);
?>
<html lang="en">
<head>
    <title>Student Time-Table</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            color: white;
            /*background-image: url(pics/black.jpg);*/
            background-size: 100%;
            background-attachment: fixed;
            background-repeat: no-repeat;
            overflow: hidden;
            background-color: #2b4162;
            background-image: linear-gradient(315deg, #2b4162 0%, #12100e 74%);

        }

        table {
            border-radius: 8%;
        }

    </style>
</head>
<body class="animsition">
<div class="item-slick1 item1-slick1">
    <div align=center style="top: 120px; position: relative">
        <b>
            <h1 style="font-family:Matura MT Script Capitals, sans-serif; font-size:45px;">Class Time-Table </h1>
        </b><br/>

        <div class="container">
            <div style=text-transform:capitalize;>
                <table class="table table-light table-hover" style="font-family:Candara, sans-serif">
                    <thead>
                    <th></th>
                    <th>Student ID: <?php echo $reg_no ?></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <!--                    <th> Student Name: --><!-- </th>-->
                    <th></th>
                    </thead>
                    <thead align='center'>
                    <tr>
                        <th scope="col"> Date & Time</th>
                        <th> 09 : 00 - 10:00</th>
                        <th> 10 : 00 - 11:00</th>
                        <th> 11 : 00 - 12:00</th>
                        <th> 12 : 00 - 1:00</th>
                        <th> 02 : 00 - 3:00</th>
                        <th> 03 : 00 - 4:00</th>
                    </tr>
                    </thead>
                    <tbody align='center'>
                    <!--                    MONDAY CODE-->
                    <tr>
                        <td>Monday</td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_assoc($sc1)) {
                                $mon1 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='M' and hour_id = '1'");
                                while ($mon_q1 = mysqli_fetch_assoc($mon1)) {
                                    $mon_w1 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$mon_q1[sub_id]'");
                                    while ($mon_p1 = mysqli_fetch_assoc($mon_w1)) {
                                        if (($mon_q1['day_id'] == "M") && ($mon_q1['hour_id'] == 1)) {
                                            echo($mon_p1['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $mon2 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='M' and hour_id = '2'");
                                while ($mon_q2 = mysqli_fetch_array($mon2)) {
                                    $mon_w2 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$mon_q2[sub_id]'");
                                    while ($mon_p2 = mysqli_fetch_array($mon_w2)) {
                                        if (($mon_q2['day_id'] == "M") && ($mon_q2['hour_id'] == 2)) {
                                            echo($mon_p2['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $mon3 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='M' and hour_id = '3'");
                                while ($mon_q3 = mysqli_fetch_array($mon3)) {
                                    $mon_w3 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$mon_q3[sub_id]'");
                                    while ($mon_p3 = mysqli_fetch_array($mon_w3)) {
                                        if (($mon_q3['day_id'] == "M") && ($mon_q3['hour_id'] == 3)) {
                                            echo($mon_p3['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $mon4 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='M' and hour_id = '4'");
                                while ($mon_q4 = mysqli_fetch_array($mon4)) {
                                    $mon_w4 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$mon_q4[sub_id]'");
                                    while ($mon_p4 = mysqli_fetch_array($mon_w4)) {
                                        if (($mon_q4['day_id'] == "M") && ($mon_q4['hour_id'] == 4)) {
                                            echo($mon_p4['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $mon5 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='M' and hour_id = '5'");
                                while ($mon_q5 = mysqli_fetch_array($mon5)) {
                                    $mon_w5 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$mon_q5[sub_id]'");
                                    while ($mon_p5 = mysqli_fetch_array($mon_w5)) {
                                        if (($mon_q5['day_id'] == "M") && ($mon_q5['hour_id'] == 5)) {
                                            echo($mon_p5['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $mon6 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='M' and hour_id = '6'");
                                while ($mon_q6 = mysqli_fetch_array($mon6)) {
                                    $mon_w6 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$mon_q6[sub_id]'");
                                    while ($mon_p6 = mysqli_fetch_array($mon_w6)) {
                                        if (($mon_q6['day_id'] == "M") && ($mon_q6['hour_id'] == 6)) {
                                            echo($mon_p6['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>

                    <!--TUESDAY CODE-->
                    <tr>
                        <td>Tuesday</td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $tue1 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='T' and hour_id = '1'");
                                while ($tue_q1 = mysqli_fetch_array($tue1)) {
                                    $tue_w1 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$tue_q1[sub_id]'");
                                    while ($tue_p1 = mysqli_fetch_array($tue_w1)) {
                                        if (($tue_q1['day_id'] == "T") && ($tue_q1['hour_id'] == 1)) {
                                            echo($tue_p1['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $tue2 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='T' and hour_id = '2'");
                                while ($tue_q2 = mysqli_fetch_array($tue2)) {
                                    $tue_w2 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$tue_q2[sub_id]'");
                                    while ($tue_p2 = mysqli_fetch_array($tue_w2)) {
                                        if (($tue_q2['day_id'] == "T") && ($tue_q2['hour_id'] == 2)) {
                                            echo($tue_p2['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $tue3 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='T' and hour_id = '3'");
                                while ($tue_q3 = mysqli_fetch_array($tue3)) {
                                    $tue_w3 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$tue_q3[sub_id]'");
                                    while ($tue_p3 = mysqli_fetch_array($tue_w3)) {
                                        if (($tue_q3['day_id'] == "T") && ($tue_q3['hour_id'] == 3)) {
                                            echo($tue_p3['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $tue4 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='T' and hour_id = '4'");
                                while ($tue_q4 = mysqli_fetch_array($tue4)) {
                                    $tue_w4 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$tue_q4[sub_id]'");
                                    while ($tue_p4 = mysqli_fetch_array($tue_w4)) {
                                        if (($tue_q4['day_id'] == "T") && ($tue_q4['hour_id'] == 4)) {
                                            echo($tue_p4['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $tue5 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='T' and hour_id = '5'");
                                while ($tue_q5 = mysqli_fetch_array($tue5)) {
                                    $tue_w5 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$tue_q5[sub_id]'");
                                    while ($tue_p5 = mysqli_fetch_array($tue_w5)) {
                                        if (($tue_q5['day_id'] == "T") && ($tue_q5['hour_id'] == 5)) {
                                            echo($tue_p5['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $tue6 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='T' and hour_id = '6'");
                                while ($tue_q6 = mysqli_fetch_array($tue6)) {
                                    $tue_w6 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$tue_q6[sub_id]'");
                                    while ($tue_p6 = mysqli_fetch_array($tue_w6)) {
                                        if (($tue_q6['day_id'] == "T") && ($tue_q6['hour_id'] == 6)) {
                                            echo($tue_p6['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>

                    <!--WEDNESDAY CODE-->
                    <tr>
                        <td>Wednesday</td>
                        <td> <?php
                            //
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $wed1 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='W' and hour_id = '1'");
                                while ($wed_q1 = mysqli_fetch_array($wed1)) {
                                    $wed_w1 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$wed_q1[sub_id]'");
                                    while ($wed_p1 = mysqli_fetch_array($wed_w1)) {
                                        if (($wed_q1['day_id'] == "W") && ($wed_q1['hour_id'] == 1)) {
                                            echo($wed_p1['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $wed2 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='W' and hour_id = '2'");
                                while ($wed_q2 = mysqli_fetch_array($wed2)) {
                                    $wed_w2 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$wed_q2[sub_id]'");
                                    while ($wed_p2 = mysqli_fetch_array($wed_w2)) {
                                        if (($wed_q2['day_id'] == "W") && ($wed_q2['hour_id'] == 2)) {
                                            echo($wed_p2['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $wed3 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='W' and hour_id = '3'");
                                while ($wed_q3 = mysqli_fetch_array($wed3)) {
                                    $wed_w3 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$wed_q3[sub_id]'");
                                    while ($wed_p3 = mysqli_fetch_array($wed_w3)) {
                                        if (($wed_q3['day_id'] == "W") && ($wed_q3['hour_id'] == 3)) {
                                            echo($wed_p3['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $wed4 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='W' and hour_id = '4'");
                                while ($wed_q4 = mysqli_fetch_array($wed4)) {
                                    $wed_w4 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$wed_q4[sub_id]'");
                                    while ($wed_p4 = mysqli_fetch_array($wed_w4)) {
                                        if (($wed_q4['day_id'] == "W") && ($wed_q4['hour_id'] == 4)) {
                                            echo($wed_p4['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $wed5 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='W' and hour_id = '5'");
                                while ($wed_q5 = mysqli_fetch_array($wed5)) {
                                    $wed_w5 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$wed_q5[sub_id]'");
                                    while ($wed_p5 = mysqli_fetch_array($wed_w5)) {
                                        if (($wed_q5['day_id'] == "W") && ($wed_q5['hour_id'] == 5)) {
                                            echo($wed_p5['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $wed6 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='W' and hour_id = '6'");
                                while ($wed_q6 = mysqli_fetch_array($wed6)) {
                                    $wed_w6 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$wed_q6[sub_id]'");
                                    while ($wed_p6 = mysqli_fetch_array($wed_w6)) {
                                        if (($wed_q6['day_id'] == "W") && ($wed_q6['hour_id'] == 6)) {
                                            echo($wed_p6['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <!--THURSDAY CODE-->
                    <tr>
                        <td>Thursday</td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_assoc($sc1)) {
                                $thur1 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='Th' and hour_id = '1'");
                                while ($thur_q1 = mysqli_fetch_assoc($thur1)) {
                                    $thur_w1 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$thur_q1[sub_id]'");
                                    while ($thur_p1 = mysqli_fetch_assoc($thur_w1)) {
                                        if (($thur_q1['day_id'] == "Th") && ($thur_q1['hour_id'] == 1)) {
                                            echo($thur_p1['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $thur2 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='Th' and hour_id = '2'");
                                while ($thur_q2 = mysqli_fetch_array($thur2)) {
                                    $thur_w2 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$thur_q2[sub_id]'");
                                    while ($thur_p2 = mysqli_fetch_array($thur_w2)) {
                                        if (($thur_q2['day_id'] == "Th") && ($thur_q2['hour_id'] == 2)) {
                                            echo($thur_p2['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $thur3 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='Th' and hour_id = '3'");
                                while ($thur_q3 = mysqli_fetch_array($thur3)) {
                                    $thur_w3 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$thur_q3[sub_id]'");
                                    while ($thur_p3 = mysqli_fetch_array($thur_w3)) {
                                        if (($thur_q3['day_id'] == "Th") && ($thur_q3['hour_id'] == 3)) {
                                            echo($thur_p3['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $thur4 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='Th' and hour_id = '4'");
                                while ($thur_q4 = mysqli_fetch_array($thur4)) {
                                    $thur_w4 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$thur_q4[sub_id]'");
                                    while ($thur_p4 = mysqli_fetch_array($thur_w4)) {
                                        if (($thur_q4['day_id'] == "Th") && ($thur_q4['hour_id'] == 4)) {
                                            echo($thur_p4['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $thur5 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='Th' and hour_id = '5'");
                                while ($thur_q5 = mysqli_fetch_array($thur5)) {
                                    $thur_w5 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$thur_q5[sub_id]'");
                                    while ($thur_p5 = mysqli_fetch_array($thur_w5)) {
                                        if (($thur_q5['day_id'] == "Th") && ($thur_q5['hour_id'] == 5)) {
                                            echo($thur_p5['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $thur6 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='Th' and hour_id = '6'");
                                while ($thur_q6 = mysqli_fetch_array($thur6)) {
                                    $thur_w6 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$thur_q6[sub_id]'");
                                    while ($thur_p6 = mysqli_fetch_array($thur_w6)) {
                                        if (($thur_q6['day_id'] == "Th") && ($thur_q6['hour_id'] == 6)) {
                                            echo($thur_p6['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>

                    <!--FRIDAY CODE-->
                    <tr>
                        <td>Friday</td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $fri1 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='F' and hour_id = '1'");
                                while ($fri_q1 = mysqli_fetch_array($fri1)) {
                                    $fri_w1 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$fri_q1[sub_id]'");
                                    while ($fri_p1 = mysqli_fetch_array($fri_w1)) {
                                        if (($fri_q1['day_id'] == "F") && ($fri_q1['hour_id'] == 1)) {
                                            echo($fri_p1['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $fri2 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='F' and hour_id = '2'");
                                while ($fri_q2 = mysqli_fetch_array($fri2)) {
                                    $fri_w2 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$fri_q2[sub_id]'");
                                    while ($fri_p2 = mysqli_fetch_array($fri_w2)) {
                                        if (($fri_q2['day_id'] == "F") && ($fri_q2['hour_id'] == 2)) {
                                            echo($fri_p2['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $fri3 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='F' and hour_id = '3'");
                                while ($fri_q3 = mysqli_fetch_array($fri3)) {
                                    $fri_w3 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$fri_q3[sub_id]'");
                                    while ($fri_p3 = mysqli_fetch_array($fri_w3)) {
                                        if (($fri_q3['day_id'] == "F") && ($fri_q3['hour_id'] == 3)) {
                                            echo($fri_p3['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $fri4 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='F' and hour_id = '4'");
                                while ($fri_q4 = mysqli_fetch_array($fri4)) {
                                    $fri_w4 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$fri_q4[sub_id]'");
                                    while ($fri_p4 = mysqli_fetch_array($fri_w4)) {
                                        if (($fri_q4['day_id'] == "F") && ($fri_q4['hour_id'] == 4)) {
                                            echo($fri_p4['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $fri5 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='F' and hour_id = '5'");
                                while ($fri_q5 = mysqli_fetch_array($fri5)) {
                                    $fri_w5 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$fri_q5[sub_id]'");
                                    while ($fri_p5 = mysqli_fetch_array($fri_w5)) {
                                        if (($fri_q5['day_id'] == "F") && ($fri_q5['hour_id'] == 5)) {
                                            echo($fri_p5['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $fri6 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='F' and hour_id = '6'");
                                while ($fri_q6 = mysqli_fetch_array($fri6)) {
                                    $fri_w6 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$fri_q6[sub_id]'");
                                    while ($fri_p6 = mysqli_fetch_array($fri_w6)) {
                                        if (($fri_q6['day_id'] == "F") && ($fri_q6['hour_id'] == 6)) {
                                            echo($fri_p6['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>

                    <!--SATURDAY CODE-->
                    <tr>
                        <td>Saturday</td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $sat1 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='S' and hour_id = '1'");
                                while ($sat_q1 = mysqli_fetch_array($sat1)) {
                                    $sat_w1 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$sat_q1[sub_id]'");
                                    while ($sat_p1 = mysqli_fetch_array($sat_w1)) {
                                        if (($sat_q1['day_id'] == "S") && ($sat_q1['hour_id'] == 1)) {
                                            echo($sat_p1['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $sat2 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='S' and hour_id = '2'");
                                while ($sat_q2 = mysqli_fetch_array($sat2)) {
                                    $sat_w2 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$sat_q2[sub_id]'");
                                    while ($sat_p2 = mysqli_fetch_array($sat_w2)) {
                                        if (($sat_q2['day_id'] == "S") && ($sat_q2['hour_id'] == 2)) {
                                            echo($sat_p2['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $sat3 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='S' and hour_id = '3'");
                                while ($sat_q3 = mysqli_fetch_array($sat3)) {
                                    $sat_w3 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$sat_q3[sub_id]'");
                                    while ($sat_p3 = mysqli_fetch_array($sat_w3)) {
                                        if (($sat_q3['day_id'] == "S") && ($sat_q3['hour_id'] == 3)) {
                                            echo($sat_p3['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $sat4 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='S' and hour_id = '4'");
                                while ($sat_q4 = mysqli_fetch_array($sat4)) {
                                    $sat_w4 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$sat_q4[sub_id]'");
                                    while ($sat_p4 = mysqli_fetch_array($sat_w4)) {
                                        if (($sat_q4['day_id'] == "S") && ($sat_q4['hour_id'] == 4)) {
                                            echo($sat_p4['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $sat5 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='S' and hour_id = '5'");
                                while ($sat_q5 = mysqli_fetch_array($sat5)) {
                                    $sat_w5 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$sat_q5[sub_id]'");
                                    while ($sat_p5 = mysqli_fetch_array($sat_w5)) {
                                        if (($sat_q5['day_id'] == "S") && ($sat_q5['hour_id'] == 5)) {
                                            echo($sat_p5['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td> <?php
                            $sc1 = mysqli_query($conn, "Select distinct sub_id, hour_id and sem_id from sub_schedule where sem_id = '$cd2[sem_id]'");
                            while ($sc2 = mysqli_fetch_array($sc1)) {
                                $sat6 = mysqli_query($conn, "Select * from sub_schedule where sub_id = '$sc2[sub_id]' and day_id='S' and hour_id = '6'");
                                while ($sat_q6 = mysqli_fetch_array($sat6)) {
                                    $sat_w6 = mysqli_query($conn, "select sub_name from subjects where sub_id = '$sat_q6[sub_id]'");
                                    while ($sat_p6 = mysqli_fetch_array($sat_w6)) {
                                        if (($sat_q6['day_id'] == "S") && ($sat_q6['hour_id'] == 6)) {
                                            echo($sat_p6['sub_name']);
                                        }
                                    }
                                }
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <a href="#"><input
                            class='btn btn-outline-info' style="color: white; font-size: 18px"
                            type="submit" value="Print" onclick="window.print()">
            </div>
        </div>
    </div>
</div>


<!--    </div>-->
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
