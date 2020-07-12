<?php
include 'boot.php';
include 'conn.php';

if (isset($_POST['submit'])) {
  $name = $_POST['fact_name'];
  $fid = $_POST['fact_id'];
  $did = $_POST['dept_id'];

  //--------------------------VALIDATIONS------------------------------

  if ($did == "-1") {
    echo "<script type='text/javascript'>alert(\"Department ID is not selected!\");</script>";
    header("refresh:0;url=index.php");
    exit();
  }

    $r1 = mysqli_query($conn, "SELECT fact_id FROM faculty_details where fact_id='$fid' ");
    $r2 = mysqli_fetch_array($r1);

    if ($fid == $r2['fact_id']) {
      echo "<script type='text/javascript'>alert(\"Faculty ID already in use. Please enter another ID!\");</script>";
      header("refresh:0;url=index.php");
      exit();
    }
  }
?>

<html>

<head>
  <script type="text/javascript">
    function validateAlpha() {
      var textInput = document.getElementById("fact_name").value;
      textInput = textInput.replace(/[^A-Za-z]/g, "");
      document.getElementById("fact_name").value = textInput;
    }

    function isNumberKey() {
      var textInput = document.getElementById("cmun").value;
      textInput = textInput.replace(/[^0-9]/g, "");
      document.getElementById("cmun").value = textInput;
    }
  </script>
</head>

<body>
  <form name=id=action="index.php" method="post">
    Enter faculty details<br />
    <table border="3">
      <tr>
        <td>Faculty ID:</td>
        <td><input type="text" MAXLENGTH="10" placeholder="Enter the faulty ID" name="fact_id" required class="btn btn-default"></td>
      </tr>
      <tr>
        <td>Name:</td>
        <td>
          <input type="text" id="fact_name" placeholder="Enter the faculty name" maxlength="20" name="fact_name" class="btn btn-default" oninput="validateAlpha();">
        </td>
      </tr>
      <tr>
        <td>Department:</td>
        <td colspan="2">
          <select name="dept_id" class="btn btn-default">
            <option value="-1">-------select-------</option>
            <?php
            $l1 = mysqli_query($conn, "SELECT distinct dept_id FROM department");
            $l2 = mysqli_num_rows($l1);
            while ($l3 = mysqli_fetch_array($l1)) {
              echo "<option value='" . $l3['dept_id'] . "'>" . $l3['dept_id'] . "</option>";
            }
            $conn->close();
            ?>
          </select>
    </table>
    <br>
    <button type="submit" name="submit" class="btn btn-success">Submit</button>
    <button type="reset" class="btn btn-danger">Reset</button>

  </form>
</body>

</html>