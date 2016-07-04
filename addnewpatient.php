<?php
 session_start();
 ?>
 
 <?php 
    $dbhost='localhost';
    $dbuser='root';
    $dbpass='';
    $dbname='hms'; 
    $conn=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 
    if(! $conn ) {
        die( 'Could not connect: ' . mysqli_error());
      }
        
    if (count($_POST)>1){
    mysqli_select_db($conn, 'dbname'); 
    $patient_id = $_POST['patient_id']; 
    $nof = $_POST['nof']; 
    $sname = $_POST['sname']; 
    $oname = $_POST['oname']; 
    $dob = $_POST['dob']; 
    $age = $_POST['age']; 
    $gender = $_POST['gender']; 
    $mstat = $_POST['mstat'];
    $reli = $_POST['reli']; 
    $occupation = $_POST['occupation']; 
    $mobile = $_POST['mobile']; 
    $insurance = $_POST['insurance']; 
    $noh = $_POST['noh']; 
    $address = $_POST['address'];
    $nonr = $_POST['nonr']; 
    $conr = $_POST['conr']; 
    $datetime = $_POST['datetime'];
    $result = mysqli_query($conn, "SELECT * FROM patients WHERE patient_id = '$patient_id'");
    
if(!mysqli_fetch_array($result)){
mysqli_query($conn, "INSERT INTO patients VALUES('$patient_id','$nof','$sname','$oname','$dob','$age','$gender','$mstat','$reli','$occupation','$mobile','$insurance','$noh','$address','$nonr','$conr','$datetime')");
    $message = "<p style=color:green>Patient Added Successfully!!</p>";
 }
else $message = "<p style=color:red;text-decoration:blink>Patient ID or Insurance No. already exist!!!</p>"; 
 } 
 
mysqli_close($conn);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Add Patient</title>
        <style fprolloverstyle>
            A {
                color:#00F;
                text-decoration:none
            }
            A:hover {
                color:#F00;
            }
        </style>

    </head>

<body style="background-color:lightblue">

        <div align="right">
            <p>[ <a href="home.php" style="text-decoration:none"><b>HOME</b></a> ]</p>
        </div>

        <div class="message">
            <table border="0" align="center" width="400px" height="70px">
                <th>
                    <?php if(isset($message)) { echo $message; }; ?>
                </th>
            </table>
        </div>

        <center>
            <form method="POST" action="">
                <label style="text-decoration:underline"><big><big>PATIENT INFORMATION</big></big>
                </label>
                <br />
                <br />
                <br />

                <table>
                    <tbody>
                        <tr>
                            <td>
                                <label>Patient ID :</label>
                            </td>
                            <td>
                                <input name="patient_id" type="number" autofocus="autofocus" required="required" />
                            </td>
                            <td>&nbsp;&nbsp;
                                <label>Name of Facility :</label>
                            </td>
                            <td>
                                <input name="nof" type="text" value="ONHC" readonly="readonly" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Surname :</label>
                            </td>
                            <td>
                                <input name="sname" type="text" required="required" />
                            </td>
                            <td>&nbsp;&nbsp;
                                <label>Other Names :</label>
                            </td>
                            <td>
                                <input name="oname" type="text" required="required" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Date of Birth :</label>
                            </td>
                            <td>
                                <input name="dob" type="text" pattern=".{10,20}" placeholder="'Day Month Year'" />
                            </td>
                            <td>&nbsp;&nbsp;
                                <label>Age :</label>
                            </td>
                            <td>
                                <input name="age" type="number" required="required" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Gender :</label>
                            </td>
                            <td>
                                <select name="gender" required="required">
                                    <option value="">--- Select One ---</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </td>
                            <td>&nbsp;&nbsp;
                                <label>Occupation :</label>
                            </td>
                            <td>
                                <input name="occupation" type="text" required="required" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Marital Status :</label>
                            </td>
                            <td>
                                <select name="mstat" required="required">
                                    <option value="">--- Select One ---</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorce">Divorce</option>
                                    <option value="Widow">Widow</option>
                                    <option value="Widower">Widower</option>
                                </select>
                            </td>
                            <td>&nbsp;&nbsp;
                                <label>Religion :</label>
                            </td>
                            <td>
                                <select name="reli" required="required">
                                    <option value="">--- Select One ---</option>
                                    <option value="Christian">Christian</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Traditional">Traditional</option>
                                    <option value="Others">Others</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Contact Number :</label>
                            </td>
                            <td>
                                <input name="mobile" type="text" pattern="[0-9]{10,10}" maxlength="10" />
                            </td>
                            <td>&nbsp;&nbsp;
                                <label>Address :</label>
                            </td>
                            <td>
                                <input type="text" name="address" required="required" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Name of Nearest Relative :</label>
                            </td>
                            <td>
                                <input type="text" name="nonr" />
                            </td>
                            <td>&nbsp;&nbsp;
                                <label>Contact of Nearest Relative :</label>
                            </td>
                            <td>
                                <input type="text" onkeypress="return isNumberKey(event)" maxlength="10" name="conr" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Insurance Number :</label>
                            </td>
                            <td>
                                <input name="insurance" type="text" pattern="[0-9]{8,8}" maxlength="8" />
                            </td>
                            <td>&nbsp;&nbsp;
                                <label>Name of Health Insurance Scheme :</label>
                            </td>
                            <td>
                                <input name="noh" type="text" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Date of First Visit :</label>
                            </td>
                            <td>
                                <input name="datetime" size="21" readonly="readonly" type="text" value="<?php date_default_timezone_set(" gmt "); echo date("d F Y h:i A ") ?>" required="required">
                            </td>
                        </tr>
                    </tbody>
                </table>

                <br />
                <br />

                <input name="submit" value="ADD" type="submit">&nbsp; &nbsp;
                <input name="reset" value="RESET" type="reset">
            </form>

        </center>


    </body>
</html>
