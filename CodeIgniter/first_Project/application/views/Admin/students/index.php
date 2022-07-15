<!DOCTYPE html>
<html>

<head>
    <title>CodeIgniter Pagination</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    #pagination {
        margin: 40 40 0;
    }


    ul.tsc_pagination li a {
        border: solid 1px;
        border-radius: 3px;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        padding: 6px 9px 6px 9px;
    }

    ul.tsc_pagination li {
        padding-bottom: 1px;
    }

    ul.tsc_pagination li a:hover,
    ul.tsc_pagination li a.current {
        color: #FFFFFF;
        box-shadow: 0px 1px #EDEDED;
        -moz-box-shadow: 0px 1px #EDEDED;
        -webkit-box-shadow: 0px 1px #EDEDED;
    }

    ul.tsc_pagination {
        margin: 4px 0;
        padding: 0px;
        height: 100%;
        overflow: hidden;
        font: 12px 'Tahoma';
        list-style-type: none;
    }

    ul.tsc_pagination li {
        float: left;
        margin: 0px;
        padding: 0px;
        margin-left: 5px;
        display: flex;
    }

    ul.tsc_pagination li a {
        color: black;
        display: block;
        text-decoration: none;
        padding: 7px 10px 7px 10px;
    }

    ul.tsc_pagination li a {
        color: #0A7EC5;
        border-color: #8DC5E6;
        background: #F8FCFF;
    }

    ul.tsc_pagination li a:hover,
    ul.tsc_pagination li a.current {
        text-shadow: 0px 1px #388DBE;
        border-color: #3390CA;
        background: #58B0E7;
        background: -moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
        background: -webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
    }
</style>

<body>
    <div class="container">
        <h3>CodeIgniter Database Pagination</h3>
        <form method="post" action="showPagination">
            <div><input type="text" name="Student_Name" value=""></div>

        </form>
        <div class="column">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student_Name</th>
                        <th>Student_Email Name</th>
                        <th>Phone_Number</th>
                        <th>Depart_Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $student) : ?>
                        <tr>
                            <td><?= $student->id; ?></td>
                            <td><?= $student->Student_Name; ?></td>
                            <td><?= $student->Student_Email; ?></td>
                            <td><?= $student->Phone_Number; ?></td>
                            <td><?= $student->Depart_Name; ?></td>
                        </tr>

                    <?php if (count($data) == 0) {
                            echo "<tr>";
                            echo "<td colspan='3'>No record found.</td>";
                            echo "</tr>";
                        }
                    endforeach; ?>
                </tbody>
            </table>
            
            <div id="pagination">
                <ul class="tsc_pagination">
                    <li><?php echo $this->pagination->create_links(); ?> </li>
            </div>

        


        </div>
    </div>
</body>

</html>