<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    a{
        text-decoration: none;
        background-color: black;
        color: white;
        padding: 5px;
        border-radius: 8px;
    }
    a:hover{
        background-color: white;
        color: black;
    }
</style>
<body>
    <!-- <form method="post" action="http://localhost/CodeIgniter/first_Project/index.php/Student/filterStudentRecords"> -->
        <form method="post" action="<?php echo base_url(); ?>Student/filterStudentRecords">

        <table width="600" align="center" border="1" cellspacing="5" cellpadding="5">
            <tr>
                <th align="center" colspan="3">
                    <h3>Filter Data</h3>
                </th>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="Student_Name" /></td>
                <td align="center">
                    <input style="background-color: black;color:white;padding:9px;border-radius:6px" type="submit" name="login" value="Search" />
                </td>
            </tr>

        </table>
    </form>
    <!-- <?php echo form_close(); ?> -->

    <div align='center'>
        <h1>RECORDS</h1>
        <table width="600" border="1" cellspacing="5" cellpadding="5">
            <tr style="background:black;color:white">
                <th>ID</th>
                <th>Name</th>
                <th>Password</th>
                <th>Phone Number</th>
                <th>Department</th>
                <th colspan="2">Action</th>


            </tr>
            <?php
            $i = 1;
            foreach ($data as $row) {
                echo "<tr>";
                echo "<td>" . $row->id . "</td>";
                echo "<td>" . $row->Student_Name . "</td>";
                echo "<td>" . $row->Passwords . "</td>";
                echo "<td>" . $row->Phone_Number . "</td>";
                echo "<td>" . $row->Depart_Name . "</td>";
                echo "<td>" . " <a target='_blank' href='Student/edit_studentData/?id=" . $row->id . "'>Edit</a>" . "</td>";
                echo "<td>" . " <a href='Student/deleteStudent/?id=" . $row->id . "'>Delete</a>" . "</td>";

                echo "</tr>";
                $i++;
            }
            ?>
        </table>
    </div>

</body>

</html>