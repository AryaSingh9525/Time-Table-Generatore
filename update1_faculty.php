<?php
ob_start();
include 'boot.php';
include 'conn.php';
include 'admin_top.php';

if (isset($_POST['submit'])) {
    $f_id = $_POST['fact_id'];
    $f_name = $_POST['f_name'];
    $m_name = $_POST['m_name'];
    $l_name = $_POST['l_name'];
    $pno = $_POST['pno'];
    $email = $_POST['email'];
    $experience = $_POST['experience'];
    $uname = $_POST['uname'];
    $pass = md5($_POST['pass']);
    $conf_pass = md5($_POST['conf_pass']);
    $dept = $_POST['dept'];

    if($pass != $conf_pass)
    {
        echo "not same";
        exit();
    }

    $dept2 = mysqli_query($conn,"SELECT dept_id from department where '$dept' = 'computer science'");
    if(!$dept2)
    {
        echo "no";
        exit();
    }
    $deptid = mysqli_fetch_assoc($dept2);

    if ($f_id == "-1") {
        echo "<script type='text/javascript'>alert(\"Faculty ID is not selected!\");</script>";
        header("refresh:0;url=update1_faculty.php");
        die();
    }

    
    // $r1 = mysqli_query($conn, "SELECT fact_id FROM faculty_details where fact_id='$f_name' ");
    // $r2 = mysqli_fetch_array($r1);

    // if ($f_name == $r2['fact_id']) {
    //     echo "<script type='text/javascript'>alert(\"Faculty ID already in use. Please enter another ID!\");</script>";
    //     header("refresh:0;url=index.php");
    //     exit();

    $lr1 = mysqli_query($conn,"SELECT * FROM faculty_deatils ORDER BY fact_id DESC LIMIT 1");
    $lr2=mysqli_fetch_assoc($lr1);
    $flag=0;

    $sql = mysqli_query($conn,"UPDATE faculty_details ". "SET f_name = $f_name, m_name = $m_name, l_name = $l_name, pno = $pno, email = $email, experience = $experience,". 
    "WHERE f_name = $f_name, m_name = $m_name, l_name = $l_name, pno = $pno, email =$email, experience = $experience, " );
    if ($sql)
    {
    //FOR FACULTY DEPARTMENT
        $sql2 = mysqli_query($conn,"UPDATE faculty "."SET fact_id = $fact_id, dept_id = $dept_id,".
    "WHERE fact_id = $fact_id, dept_id = $dept_id");

        if($sql2)
        {
            //FOR INSERT INTO LOGIN TABLE
            $sql3 = mysqli_query($conn,"INSERT INTO login (username, password, level) VALUES ('$uname','$pass','2')");
            if($sql3)
            {   echo "work";
                $flag = 1;
            }
        }
    }
}
?>
<html lang="en">

<head>
    <link rel="icon" type="image/png" href="images/icons/favicon.png" />
    <title>
        Faculty Update
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
            font-family: Schoolbell;
        }

        select {
            /*border-color: none;*/
        }

        .txt9999 {
            color: white;
            font-size: 18px;
        }

        .bo-rad-10 {
            border-radius: 10px;
        }

        .txt10 {
             font-family: Schoolbell;
            font-weight: 400;
            font-size: 14px;
            color: #666666;
        }

        .sizefull {
            width: 100%;
            height: 90%;
        }
    </style>

    <script>
        function isNumberKey() {
            var textInput = document.getElementById("pno").value;
            textInput = textInput.replace(/[^0-9]/g, "");
            document.getElementById("pno").value = textInput;

            var exp = document.getElementById("experience").value;
            if(exp > 50)
            {
                alert("Experience cannot exceed 50!")
                document.getElementById("experience").value = "";
            }
        }
     </script>   

</head>

<body class="animsition">
    <!-- </div> --> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />

    <div align=center>
        <b>
            <h1 style="font-family:Matura MT Script Capitals,serif; font-size:45px;">
                Update Faculty!
            </h1>
        </b><br /> <br />

        <form id name="alloc" method=post action="update1_faculty.php" class="wrap-form-reservation size22 m-l-r-auto">
            <table border=0>
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

                    <tr>
                    <td> 
                        <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                        <select class="bo-rad-10 sizefull txt10 p-l-20" type="text" id="fact_id" name="fact_id" required/><option value="">Select</option> 
                                <!--<option value=""> ------ select ------</option> -->
                                <!--<input type="submit" value="Show" name="show" formnovalidate/> -->
                                <?php
                                //$conn=makeconnection();
                                $s="select * from faculty_details";
                                $result=mysqli_query($conn,$s);
                                $r=mysqli_num_rows($result);
                                //echo $r;
                                
                                while($data=mysqli_fetch_array($result))
                                {
                                    if(isset($_POST["show"])&& $data[0]==$_POST["fact_id"])
                                    {
                                        echo"<option value=$data[0] selected>$data[1]</option>";
                                    }
                                    else
                                    {
                                        echo "<option value=$data[0]>$data[1]</option>";
                                    }
                                }
                                //mysqli_close($conn);
                                //$l1 = mysqli_query($conn, "SELECT * FROM faculty_details");
                                //$l2 = mysqli_num_rows($l1);
                                //while ($l3 = mysqli_fetch_array($l1)){
                                    //echo "<option value='" . $l3[1] . "'>" . $l3[1] . "</option>";
                               // }     
                               ?>
                            </select>
                            <input type="submit" value="Show" name="show" formnovalidate/>
                              <?php
                             if(isset($_POST["show"]))
                             {
                                //$conn=makeconnection();
                                $s="select * from faculty_details where fact_id='" .$_POST["fact_id"] ."'";
                                $result=mysqli_query($conn,$s);
                                $r=mysqli_num_rows($result);
                                //echo $r;

                                $data=mysqli_fetch_array($result);
                               // $fact_id=$data[0];
                                $f_name=$data[1];
                                $m_name=$data[2];
                                $l_name=$data[3];
                                $pno=$data[4];
                                $email=$data[5];
                                $experience=$data[6];
                                $rank=$data[7];

                                //mysqli_close($conn);
                                
                            }
                            ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="txt9999">
                                    First Name:
                                </span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <<div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                            <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" id="f_name" name="f_name" required><option value="">Select</option>
                            <?php
                             
                             $s="select * from faculty_details";
                             $result=mysqli_query($conn,$s);
                             $r=mysqli_num_rows($result);
                            //echo $r;

                            while($data=mysqli_fetch_array($result))
                            {
	                         if(isset($_POST["show"])&& $f_name==$data[2])
	                          {
		
		                        echo "<option value=$data[0] selected='selected' >$data[1]</option>";
	                          }
	                         else
	                          {
	                         	echo "<option value=$data[0]>$data[1]</option>";
	
                              }
                            }
                             
                            ?>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="txt9999">
                                    Middle Name:
                                </span>
                            </div>
                        </div>
                    </td>
                    <td>
                    <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" id="m_name" name="m_name"  required/><option value="">Select</option>
                    <?php
                             
                             $s="select * from faculty_details";
                             $result=mysqli_query($conn,$s);
                             $r=mysqli_num_rows($result);
                            //echo $r;

                            while($data=mysqli_fetch_array($result))
                            {
	                         if(isset($_POST["show"])&& $m_name==$data[0])
	                          {
		
		                        echo "<option value=$data[0] selected='selected' >$data[1]</option>";
	                          }
	                         else
	                          {
	                         	echo "<option value=$data[0]>$data[1]</option>";
	
                              }
                            }

                            
                            ?>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="txt9999">
                                    Last Name:
                                </span>
                            </div>
                        </div>
                    </td>
                    <td>
                    <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                            <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" id="l_name" name="l_name" required><option value="">Select</option><?php
                             
                             $s="select * from faculty_details";
                             $result=mysqli_query($conn,$s);
                             $r=mysqli_num_rows($result);
                            //echo $r;

                            while($data=mysqli_fetch_array($result))
                            {
	                         if(isset($_POST["show"])&& $l_name==$data[0])
	                          {
		
		                        echo "<option value=$data[0] selected='selected' >$data[1]</option>";
	                          }
	                         else
	                          {
	                         	echo "<option value=$data[0]>$data[1]</option>";
	
                              }
                            }
                             
                            ?>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="txt9999">
                                    Phone No:
                                </span>
                            </div>
                        </div>
                    </td>
                    <td>
                    <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                            <input class="bo-rad-10 sizefull txt10 p-l-20" maxlength="10" type="text" name="pno" oninput="isNumberKey()" id="pno" required><option value="">Select</option><?php
                             
                             $s="select * from faculty_details";
                             $result=mysqli_query($conn,$s);
                             $r=mysqli_num_rows($result);
                            //echo $r;

                            while($data=mysqli_fetch_array($result))
                            {
	                         if(isset($_POST["show"])&& $pno==$data[0])
	                          {
		
		                        echo "<option value=$data[0] selected='selected' >$data[1]</option>";
	                          }
	                         else
	                          {
	                         	echo "<option value=$data[0]>$data[1]</option>";
	
                              }
                            }
                             
                            ?>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="txt9999">
                                    Email:
                                </span>
                            </div>
                        </div>
                    </td>
                    <td>
                    <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                            <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email" id="email" required><option value="">Select</option>
                            <?php
                             
                             $s="select * from faculty_details";
                             $result=mysqli_query($conn,$s);
                             $r=mysqli_num_rows($result);
                            //echo $r;

                            while($data=mysqli_fetch_array($result))
                            {
	                         if(isset($_POST["show"])&& $email==$data[0])
	                          {
		
		                        echo "<option value=$data[0] selected='selected' >$data[1]</option>";
	                          }
	                         else
	                          {
	                         	echo "<option value=$data[0]>$data[1]</option>";
	
                              }
                            }
                             
                            ?>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="txt9999">
                                    Experience:
                                </span>
                            </div>
                        </div>
                    </td>
                    <td>
                    <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                            <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="experience" id="experience" oninput="isNumberKey()" maxlength="2" required/><option value="">Select</option>
                            <?php
                             
                             $s="select * from faculty_details";
                             $result=mysqli_query($conn,$s);
                             $r=mysqli_num_rows($result);
                            //echo $r;

                            while($data=mysqli_fetch_array($result))
                            {
	                         if(isset($_POST["show"])&& $experience==$data[0])
	                          {
		
		                        echo "<option value=$data[0] selected='selected' >$data[1]</option>";
	                          }
	                         else
	                          {
	                         	echo "<option value=$data[0]>$data[1]</option>";
	
                              }
                            }
                             
                            ?>
                        </div>
                    </td>
                </tr>


                
            </table><br />
            <input type="submit" value="Update Records" name="update" class="btn btn-success">

        </form>
    </div>

    <br /><br /><br /><br /><br /><br /><br /><br />

<div class="end-footer bg2">
    <div class="container">
        <div class="flex-sb-m flex-w p-t-22 p-b-22">
            <div class="p-t-5 p-b-5">
                <a href="#" class="fs-15 c-white"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
                <a href="#" class="fs-15 c-white"><i class="fa fa-facebook m-l-18" aria-hidden="true"></i></a>
                <a href="#" class="fs-15 c-white"><i class="fa fa-twitter m-l-18" aria-hidden="true"></i></a>
            </div>

            <div class="txt17 p-r-20 p-t-5 p-b-5">
                Copyright &copy; 2018 All rights reserved
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