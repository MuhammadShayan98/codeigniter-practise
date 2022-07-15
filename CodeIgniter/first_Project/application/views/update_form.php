<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    
</style>

<body>
    <?php
    foreach ($data as $row)
    // while ($row = mysqli_asoc_array($data))
    
    { ?>
        <form method="post" action="">

            <table width="600" align="center" border="1" cellspacing="5" cellpadding="5">
                <tr>
                    <th align="center" colspan="3">
                        <h3>Update Data</h3>
                    </th>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="Student_Name" value="<?php echo $row->Student_Name ?>" /></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" name="Passwords" value="<?php echo $row->Passwords ?>" /></td>
                </tr>
                <tr>
                    <td>Phone_Number</td>
                    <td><input type="text" name="Phone_Number" value="<?php echo $row->Phone_Number ?>" /></td>
                </tr>
                <tr>
                    <td>Department</td>
                    <td><input type="text" name="Depart_Name" value="<?php echo $row->Depart_Name ?>" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input style="background-color: black;color:white;padding:9px;border-radius:6px" type="submit" name="update" value="Update" />
                    </td>
                </tr>
            </table>
        </form>
    <?php } ?>
</body>

</html>