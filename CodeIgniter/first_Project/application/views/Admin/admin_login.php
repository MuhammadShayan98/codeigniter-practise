<?php echo  $this->session->flashdata('alert');  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    // if (!defined('BASEPATH')) exit('No direct script access allowed');
    include_once('inc_head/css_link.php');
    ?>

</head>


<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <h1>LOGIN PAGE</h1>
                        </div>
                        <div>


                        </div>

                        <div class="login-form">

                            <form action="" method="post">
                                <p style="color :red"> <?php echo validation_errors(); ?> </p>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="text" name="Admin_Name" placeholder="User Name">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="text" name="passwords" placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="#">Forgotten Password?</a>
                                    </label>
                                </div>
                                <input class="au-btn au-btn--block au-btn--green m-b-20" type="submit" value="Login"></input>

                            </form>
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="#">Sign Up Here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include('inc_head/js_link.php'); ?>

</body>

</html>
<!-- end document-->