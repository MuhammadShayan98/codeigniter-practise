<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Fontfaces CSS-->
    <link href="<?Php echo base_url() ?>assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?Php echo base_url() ?>assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?Php echo base_url() ?>assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?Php echo base_url() ?>assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?Php echo base_url() ?>assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?Php echo base_url() ?>assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?Php echo base_url() ?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?Php echo base_url() ?>assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?Php echo base_url() ?>assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?Php echo base_url() ?>assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?Php echo base_url() ?>assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?Php echo base_url() ?>assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?Php echo base_url() ?>assets/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="<?Php echo base_url() ?>assets/images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>

                        <div class="login-form">

                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="Student_Name" placeholder="Username">
                                    <span class="text-danger"> <?php echo form_error('Student_Name'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="Passwords" placeholder="password">
                                    <span class="text-danger"> <?php echo form_error('Passwords'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input class="au-input au-input--full" type="text" name="Phone_Number" placeholder="Phone Number">
                                    <span class="text-danger"> <?php echo form_error('Phone_Number'); ?></span>

                                </div>
                                <div class="form-group">
                                    <label>Department</label>
                                    <input class="au-input au-input--full" type="text" name="Depart_Name" placeholder="Department">
                                    <span class="text-danger"> <?php echo form_error('Depart_Name'); ?></span>


                                </div>
                                <div class="form-group">
                                    <p>
                                        <select name='Country' id="parts">
                                            <option value="Select">Select Country</option>
                                            <?php foreach ($data as $row) { ?>
                                                <option value="<?php echo $row->Country_Name; ?>"><?php echo $row->Country_Name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="userfile" size="20" />
                                    <?php if (isset($error)) {
                                        echo $error;
                                    } ?>

                                </div>
                                <br>
                                <input class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="submit" value="register"></input>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="<?Php echo base_url() ?>assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?Php echo base_url() ?>assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?Php echo base_url() ?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?Php echo base_url() ?>assets/vendor/slick/slick.min.js">
    </script>
    <script src="<?Php echo base_url() ?>assets/vendor/wow/wow.min.js"></script>
    <script src="<?Php echo base_url() ?>assets/vendor/animsition/animsition.min.js"></script>
    <script src="<?Php echo base_url() ?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?Php echo base_url() ?>assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?Php echo base_url() ?>assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?Php echo base_url() ?>assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?Php echo base_url() ?>assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?Php echo base_url() ?>assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?Php echo base_url() ?>assets/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?Php echo base_url() ?>assets/js/main.js"></script>

</body>

</html>
<!-- end document-->