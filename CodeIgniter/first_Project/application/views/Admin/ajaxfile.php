<?php

foreach ($data as $row) { ?>


    <table class="table table-borderless table-data3">
        <thead style="background-color: black !important;color:white !important;">
            <tr>
               
                <th>id</th>
                <th>Name</th>
                <th>Password</th>
            </tr>
        </thead>
        <tr>
        <tr class="tr-shadow">
            <td> <?php echo $row->id; ?></td>
            <td> <?php echo $row->Student_Name; ?></td>
            <td><?php echo $row->Passwords; ?></td>
        </tr>
        </tr>
    </table>

<?php } ?>